<?php
return [
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'support@example.com',
    'senderEmail' => 'noreply@example.com',
    'senderName' => 'Example.com mailer',
    'user.passwordResetTokenExpire' => 3600,
    'user.passwordMinLength' => 8,
    'midtrans' => [
        'class' => 'yii\midtrans\Midtrans',
        'clientKey' => 'SB-Mid-client-PSsxw4BVmroUcVAP',
        'serverKey' => 'SB-Mid-server-2qghlkw8gh35wmWdaFIVDfGQ',
        'isProduction' => false, // Set to true for production environment
        'midtransIsSanitized' => false, // Set true for Sanitization, false otherwise
        'midtransIs3ds' => true, // Set true for 3DS transaction for credit card, false otherwise
    ],
];
