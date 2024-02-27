<?php

namespace backend\controllers;

use common\models\LoginForm;
use common\models\Order;
use common\models\OrderItem;
use common\models\User;
use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['login', 'forgot-password', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => \yii\web\ErrorAction::class,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {

        $totalEarnings = Order::find()->paid()->sum('total_price');
        $totalOrders = Order::find()->paid()->count();
        $totalProducts = OrderItem::find()
            ->alias('oi')
            ->innerJoin(Order::tableName() . ' o', 'o.id = oi.order_id')
            ->andWhere(['o.status' => Order::STATUS_COMPLETED])
            ->sum('quantity');
        // $totalProducts = (new \yii\db\Query())
        //     ->from(['oi' => OrderItem::tableName()])
        //     ->innerJoin(['o' => Order::tableName()], 'o.id = oi.order_id')
        //     ->where(['o.status' => Order::STATUS_COMPLETED])
        //     ->sum('oi.quantity');
        $totalUsers = User::find()->andWhere(['status' => User::STATUS_ACTIVE])->count();

        $orders = Order::find()->paid()->all();
        $data = [];

        /*
         * Mon - 1
         * Tue - 0
         * Wed - 0
         * Thi - 0
         * Fri - 0
        */
        foreach ($orders as $order) {
        }

        return $this->render('index', [
            'totalEarnings' => $totalEarnings,
            'totalOrders' => $totalOrders,
            'totalProducts' => $totalProducts,
            'totalUsers' => $totalUsers,
        ]);
    }

    /**
     * Login action.
     *
     * @return string|Response
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = 'blank';

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $user = Yii::$app->user->identity;

            if ($user && ($user->status === User::STATUS_ADMIN || $user->status === User::STATUS_ADMIN_ALL)) {
                return $this->goBack(); // Redirect ke backend untuk pengguna dengan status 11
            } else {
                Yii::$app->user->logout();
                Yii::$app->session->setFlash('error', 'Anda tidak memiliki status yang dibutuhkan untuk login.');
                return $this->refresh(); // Redirect kembali ke halaman login untuk pengguna lainnya
            }
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }



    public function actionForgotPassword()
    {
        return "Forgot password";
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
