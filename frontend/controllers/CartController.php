<?php

namespace frontend\controllers;

use common\models\CartItem;
use common\models\Order;
use common\models\OrderAddress;
use common\models\OrderItem;
use common\models\Product;
use frontend\base\Controller as BaseController;
use Yii;
use yii\db\Transaction;
use yii\filters\ContentNegotiator;
use yii\filters\VerbFilter;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * 
 * Class Controller
 * 
 * @author Cholid AW
 * @package frontend\controllers
 */
class CartController extends BaseController
{
    public function behaviors()
    {
        return [
            [
                'class' => ContentNegotiator::class,
                'only' => ['add', 'create-order'],
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                    'application/xml' => Response::FORMAT_XML,
                ],
            ],
            [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST', 'DELETE'],
                    'create-order' => ['POST'],
                ]
            ]
        ];
        // ];
    }
    public function actionIndex()
    {
        $currUserId = Yii::$app->user->isGuest ? null : Yii::$app->user->id;
        $cartItems = []; // Inisialisasi variabel $cartItems dengan array kosong

        if ($currUserId !== null) {
            // Pastikan $currUserId adalah integer sebelum memanggil metode getItemsForUser
            if (is_int($currUserId)) {
                $cartItems = CartItem::getItemsForUser($currUserId);
            } else {
                // Tangani kasus jika $currUserId bukan integer
                // Misalnya, tampilkan pesan kesalahan atau lakukan sesuatu yang sesuai dengan kebutuhan Anda.
            }
        } else {
            // Jika pengguna adalah tamu (guest), ambil item dari session
            $cartItemsFromSession = Yii::$app->session->get(CartItem::SESSION_KEY, []);

            // Jika ada item dalam session, tambahkan ke $cartItems
            if (!empty($cartItemsFromSession)) {
                $cartItems = $cartItemsFromSession;
            }
        }

        return $this->render('index', [
            'items' => $cartItems
        ]);
    }



    public function actionAdd()
    {
        $id = \Yii::$app->request->post('id');
        $product = Product::find()->id($id)->published()->one();
        if (!$product) {
            throw new NotFoundHttpException("Product does not exist");
        }

        // Kurangi stok produk
        $product->stock -= 1;
        $product->save();

        if (\Yii::$app->user->isGuest) {
            $cartItems = \Yii::$app->session->get(CartItem::SESSION_KEY, []);
            $found = false;
            foreach ($cartItems as &$item) {
                if ($item['id'] == $id) {
                    $item['quantity']++;
                    $found = true;
                    break;
                }
            }
            if (!$found) {
                $cartItem = [
                    'id' => $id,
                    'name' => $product->name,
                    'image' => $product->image,
                    'price' => $product->price,
                    'quantity' => 1,
                    'total_price' => $product->price
                ];
                $cartItems[] = $cartItem;
            }

            \Yii::$app->session->set(CartItem::SESSION_KEY, $cartItems);
        } else {
            $userId = \Yii::$app->user->id;
            $cartItem = CartItem::find()->userId($userId)->productId($id)->one();
            if ($cartItem) {
                $cartItem->quantity++;
            } else {
                $cartItem = new CartItem();
                $cartItem->product_id = $id;
                $cartItem->created_by = $userId;
                $cartItem->quantity = 1;
            }
            if ($cartItem->save()) {
                return [
                    'success' => true
                ];
            } else {
                return [
                    'success' => false,
                    'errors' => $cartItem->errors
                ];
            }
        }
    }

    public function actionDelete($id)
    {
        // Ambil informasi produk yang akan dihapus dari keranjang
        $product = Product::findOne($id);

        // Pastikan produk ada sebelum melanjutkan
        if (!$product) {
            throw new NotFoundHttpException('The requested product does not exist.');
        }

        if (isGuest()) {
            $cartItems = \Yii::$app->session->get(CartItem::SESSION_KEY, []);
            foreach ($cartItems as $i => $cartItem) {
                if ($cartItem['id'] == $id) {
                    // Kembalikan jumlah stok produk
                    $product->stock += $cartItem['quantity'];
                    // Hapus item dari keranjang
                    array_splice($cartItems, $i, 1);
                    break;
                }
            }
            \Yii::$app->session->set(CartItem::SESSION_KEY, $cartItems);
        } else {
            // Ambil informasi item keranjang
            $cartItem = CartItem::find()->where(['product_id' => $id, 'created_by' => currUserId()])->one();

            // Pastikan item keranjang ada sebelum melanjutkan
            if ($cartItem) {
                // Kembalikan jumlah stok produk
                $product->stock += $cartItem->quantity;
                // Hapus item dari keranjang
                $cartItem->delete();
            }
        }

        // Simpan perubahan jumlah stok produk
        $product->save();

        // Redirect kembali ke halaman keranjang
        return $this->redirect(['index']);
    }


    public function actionChangeQuantity()
    {
        $id = \Yii::$app->request->post('id');
        $product = Product::find()->id($id)->published()->one();
        if (!$product) {
            throw new NotFoundHttpException("Product does not exist");
        }
        $quantity = \Yii::$app->request->post('quantity');
        if (isGuest()) {
            $cartItems = \Yii::$app->session->get(CartItem::SESSION_KEY, []);
            foreach ($cartItems as &$cartItem) {
                if ($cartItem['id'] === $id) {
                    // Kurangi stok dari session jika kuantitas berubah
                    $cartItem['quantity'] = $quantity;
                    $product->stock -= ($quantity - $cartItem['quantity']); // Kurangi stok produk
                    break;
                }
            }
            \Yii::$app->session->set(CartItem::SESSION_KEY, $cartItems);
        } else {
            $cartItem = CartItem::find()->userId(currUserId())->productId($id)->one();
            if ($cartItem) {
                // Kurangi stok dari database jika kuantitas berubah
                $product->stock -= ($quantity - $cartItem->quantity); // Kurangi stok produk
                $cartItem->quantity = $quantity;
                $cartItem->save();
            }
        }
        // Simpan perubahan stok produk
        $product->save();
        // Mengembalikan total kuantitas untuk pengguna
        return CartItem::getTotalQuantityForUser(currUserId());
    }


    public function actionCheckout()
    {
        $transaction = Yii::$app->db->beginTransaction(Transaction::SERIALIZABLE);

        try {
            $order = new Order();
            $orderAddress = new OrderAddress();

            // Isi pesanan dan alamat pesanan dari data pengguna jika pengguna login
            if (!Yii::$app->user->isGuest) {
                $user = Yii::$app->user->identity;
                $userAddress = $user->getAddress();
                $order->firstname = $user->firstname;
                $order->lastname = $user->lastname;
                $order->email = $user->email;
                $order->status = Order::STATUS_DRAFT;

                $orderAddress->address = $userAddress->address;
                $orderAddress->city = $userAddress->city;
                $orderAddress->state = $userAddress->state;
                $orderAddress->country = $userAddress->country;
                $orderAddress->zipcode = $userAddress->zipcode;
            }

            // Simpan pesanan ke database
            if (!$order->save()) {
                throw new \Exception('Failed to save order.');
            }

            // Simpan detail pesanan (item keranjang) ke database
            $cartItems = CartItem::getItemsForUser(Yii::$app->user->id);
            foreach ($cartItems as $cartItem) {
                $orderItem = new OrderItem();
                $orderItem->order_id = $order->id;
                $orderItem->product_id = $cartItem->product_id;
                $orderItem->quantity = $cartItem->quantity;
                $orderItem->price = $cartItem->price;

                if (!$orderItem->save()) {
                    throw new \Exception('Failed to save order item.');
                }
            }

            // Hapus item keranjang belanja pengguna
            CartItem::clearCart(Yii::$app->user->id);

            $transaction->commit();

            // Tampilkan pesan sukses atau redirect ke halaman histori pembelian
            Yii::$app->session->setFlash('success', 'Pesanan berhasil ditempatkan.');
            return $this->redirect(['/purchase-history']); // Ganti dengan URL histori pembelian yang sesuai
        } catch (\Exception $e) {
            $transaction->rollBack();

            // Tampilkan pesan kesalahan atau redirect ke halaman lain jika diperlukan
            Yii::$app->session->setFlash('error', 'Terjadi kesalahan saat memproses pesanan.');
            return $this->goBack(); // Ganti dengan URL yang sesuai
        }
    }

    public function actionapaaja()
    {
        $transactionId = Yii::$app->request->post('transactionId');
        $status = Yii::$app->request->post('status');

        $order = new Order();
        $order->transaction_id = $transactionId;
        $order->status = $status;
        $orderAddress = new OrderAddress();
        if ($order->load(Yii::$app->request->post()) && $order->save()) {
            $orderAddress->order_id = $order->id;
            if ($orderAddress->load(Yii::$app->request->post()) && $orderAddress->save()) {
                return [
                    'success' => true
                ];
            } else {
                return [
                    'success' => false,
                    'errors' => $orderAddress->errors
                ];
            }
        } else {
            return [
                'success' => false,
                'errors' => $order->errors
            ];
        }
    }


    public function actionCreateOrder()
    {
        if (Yii::$app->request->isAjax) {
            $postData = Yii::$app->request->post();

            $productId = isset($postData['product_id']) ? $postData['product_id'] : null;

            $firstname = isset($postData['firstname']) ? $postData['firstname'] : '';
            $lastname = isset($postData['lastname']) ? $postData['lastname'] : '';
            $email = isset($postData['email']) ? $postData['email'] : '';

            // Deklarasi variabel untuk data keranjang belanja
            $cartItems = CartItem::getItemsForUser(Yii::$app->user->id);
            $productQuantity = CartItem::getTotalQuantityForUser(Yii::$app->user->id);
            $totalPrice = CartItem::getTotalPriceForUser(Yii::$app->user->id);

            $order = new Order();
            $order->firstname = $firstname;
            $order->lastname = $lastname;
            $order->email = $email;
            $order->total_price = isset($postData['total_price']) ? $postData['total_price'] : 0;
            $order->status = Order::STATUS_COMPLETED;
            $order->transaction_id = sprintf('%04d', rand(0, 9999));

            $order->created_at = time();

            $order->created_by = Yii::$app->user->id;

            $orderAddress = new OrderAddress();
            $orderAddress->address = isset($postData['address']) ? $postData['address'] : '';
            $orderAddress->city = isset($postData['city']) ? $postData['city'] : '';
            $orderAddress->state = isset($postData['state']) ? $postData['state'] : '';
            $orderAddress->country = isset($postData['country']) ? $postData['country'] : '';
            $orderAddress->zipcode = isset($postData['zipcode']) ? $postData['zipcode'] : '';

            if ($order->validate() && $orderAddress->validate()) {
                $transaction = Yii::$app->db->beginTransaction();
                try {
                    if ($order->save()) {
                        $orderAddress->order_id = $order->id;
                        if ($orderAddress->save()) {
                            // Hapus item keranjang belanja setelah membuat pesanan baru
                            CartItem::clearCart(currUserId());

                            $transaction->commit();
                            return $this->asJson(['success' => true, 'message' => 'Pesanan berhasil ditempatkan.', 'orderId' => $order->id]);
                        } else {
                            $transaction->rollBack();
                            return $this->asJson(['success' => false, 'message' => 'Gagal menyimpan alamat pesanan.', 'errors' => $orderAddress->errors]);
                        }
                    } else {
                        $transaction->rollBack();
                        return $this->asJson(['success' => false, 'message' => 'Gagal menyimpan pesanan.', 'errors' => $order->errors]);
                    }
                } catch (\Exception $e) {
                    $transaction->rollBack();
                    return $this->asJson(['success' => false, 'message' => 'Gagal menyimpan pesanan: ' . $e->getMessage()]);
                }
            } else {
                return $this->asJson(['success' => false, 'message' => 'Gagal validasi pesanan.', 'errors' => array_merge($order->errors, $orderAddress->errors)]);
            }
        }
    }



    public function actionCheckoutPage()
    {
        $order = new Order();
        $orderAddress = new OrderAddress();
        $cartItems = [];

        if (!Yii::$app->user->isGuest) {
            $currUserId = Yii::$app->user->id;
            $cartItems = CartItem::getItemsForUser($currUserId);
        }

        // Calculate total price based on cart items
        $totalPrice = 0.0;
        foreach ($cartItems as $cartItem) {
            if (isset($cartItem['price'], $cartItem['quantity'])) {
                $totalPrice += $cartItem['price'] * $cartItem['quantity'];
            } else {
                // Handle cases where $cartItem doesn't have the expected structure
                // Log an error, throw an exception, or take appropriate action
            }
        }

        // Calculate product quantity based on the number of cart items
        $productQuantity = count($cartItems);


        return $this->render('checkout', [
            'order' => $order,
            'orderAddress' => $orderAddress,
            'cartItems' => $cartItems,
            'productQuantity' => $productQuantity,
            'totalPrice' => $totalPrice,
        ]);
    }



    public function actionSubmitOrder()
    {
        if (Yii::$app->request->isAjax) {
            $postData = Yii::$app->request->post();

            $order = new Order();
            $order->load($postData);

            $orderAddress = new OrderAddress();
            $orderAddress->load($postData);

            $totalPrice = isset($postData['total_price']) ? $postData['total_price'] : 0;

            $order->total_price = $totalPrice;

            // Validasi 
            $firstname = isset($postData['Order']['firstname']) ? $postData['Order']['firstname'] : '';
            $lastname = isset($postData['Order']['lastname']) ? $postData['Order']['lastname'] : '';
            $email = isset($postData['Order']['email']) ? $postData['Order']['email'] : '';

            // if (empty($firstname) || empty($lastname) || empty($email)) {
            //     return $this->asJson(['success' => false, 'message' => 'Harap isi semua field yang diperlukan.']);
            // }

            $order->firstname = $firstname;
            $order->lastname = $lastname;
            $order->email = $email;

            if ($order->validate() && $orderAddress->validate()) {
                $transaction = Yii::$app->db->beginTransaction();
                try {
                    if ($order->save() && $orderAddress->save()) {
                        $transaction->commit();
                        return $this->asJson(['success' => true, 'message' => 'Pesanan berhasil ditempatkan.', 'orderId' => $order->id]);
                    } else {
                        $transaction->rollBack();
                        return $this->asJson(['success' => false, 'message' => 'Gagal menyimpan pesanan.']);
                    }
                } catch (\Exception $e) {
                    $transaction->rollBack();
                    return $this->asJson(['success' => false, 'message' => 'Gagal menyimpan pesanan: ' . $e->getMessage()]);
                }
            } else {
                return $this->asJson(['success' => false, 'message' => 'Gagal validasi pesanan.', 'errors' => [$order->errors, $orderAddress->errors]]);
            }
        }
    }
}
