<?php
/*Install Midtrans PHP Library (https://github.com/Midtrans/midtrans-php)
composer require midtrans/midtrans-php
                              
Alternatively, if you are not using **Composer**, you can download midtrans-php library 
(https://github.com/Midtrans/midtrans-php/archive/master.zip), and then require 
the file manually.   

require_once dirname(__FILE__) . '/pathofproject/Midtrans.php'; */

// Import Midtrans namespace

use common\models\CartItem;
use Midtrans\Snap;

//SAMPLE REQUEST START HERE

// Set your Merchant Server Key
\Midtrans\Config::$serverKey = 'SB-Mid-server-2qghlkw8gh35wmWdaFIVDfGQ';
// Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
\Midtrans\Config::$isProduction = false;
// Set sanitization on (default)
\Midtrans\Config::$isSanitized = true;
// Set 3DS transaction for credit card to true
\Midtrans\Config::$is3ds = true;

// Get cart items
$cartItems = CartItem::getItemsForUser(Yii::$app->user->id);

// Calculate total price of cart items
$totalPrice = 0;
foreach ($cartItems as $item) {
    $totalPrice += $item['total_price'];
}

$params = array(
    'transaction_details' => array(
        'order_id' => rand(),
        'gross_amount' => $totalPrice,
    ),
    'customer_details' => array(
        'first_name' => $_POST['firstname'],
        'last_name' => $_POST['lastname'],
        'email' => $_POST['email'],
        'phone' => '08111222333',
    ),
    'item_details' => $cartItems, // Add cart items to the transaction details
);

$snapToken = Snap::getSnapToken($params);
