<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'lab', 'url' => ['/zapros/zapros-one']],
            ['label' => 'Лабораторные',
                'items' => [

                        ['label' => 'Запросы',
                            'items' => [
                                ['label' => 'Запрос 1', 'url' => ['/zapros/zapros-one']],
                                ['label' => 'Запрос 2', 'url' => ['/zapros/zapros-two']],
                                ['label' => 'Запрос 3', 'url' => ['/zapros/zapros-three']],
                                ['label' => 'Запрос 4', 'url' => ['/zapros/zapros-four']],
                                ['label' => 'Запрос 5', 'url' => ['/zapros/zapros-five']],
                                ['label' => 'Запрос 6', 'url' => ['/zapros/zapros-six']],
                                ['label' => 'Запрос 7', 'url' => ['/zapros/zapros-seven']],
                                ['label' => 'Запрос 8', 'url' => ['/zapros/zapros-eight']],
                                ['label' => 'Запрос 9', 'url' => ['/zapros/zapros-nine']],
                                ['label' => 'Запрос 10', 'url' => ['/zapros/zapros-ten']],
                                ['label' => 'Запрос 11', 'url' => ['/zapros/zapros-eleven']],
                                ['label' => 'Запрос 12', 'url' => ['/zapros/zapros-twelve']],
                                ['label' => 'Запрос 13', 'url' => ['/zapros/zapros-thirteen']],
                                ['label' => 'Запрос 14', 'url' => ['/zapros/zapros-fourteen']],                                

                    
                                ],
                        ],
                    ],
            ],
            ['label' => 'Contact', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
