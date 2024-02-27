<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => \yii\caching\FileCache::class,
        ],
        'formatter' => [
            'class' => \common\i18n\Formatter::class,
            'datetimeFormat' => 'php:d/m/Y H:i'
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'sandbox.smtp.mailtrap.io',
                'username' => '604f57df1c0daf',
                'password' => 'a29901fd920748',
                'port' => '2525',
                'encryption' => 'tls',
            ],
        ],
    ],
];
