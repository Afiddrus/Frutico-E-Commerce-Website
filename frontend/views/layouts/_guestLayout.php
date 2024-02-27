<?php

use yii\bootstrap5\Html;
use frontend\assets\AppAsset;
use yii\bootstrap5\Breadcrumbs;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <title>BuahMarket</title>
    <!-- Add your necessary CSS links here -->
    <?php $this->head() ?>
</head>

<body>
    <?php $this->beginBody() ?>

    <main>
        <?= $content ?>
    </main>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage();
