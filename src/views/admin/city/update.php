<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model nullref\geo\models\City */

$this->title = Yii::t('geo', 'Update {modelClass}: ', [
    'modelClass' => 'City',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('geo', 'Cities'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('geo', 'Update');
?>
<div class="city-update">

    <div class="row">
        <div class="col-lg-12">
            <h1><?= Html::encode($this->title) ?></h1>
        </div>         <!-- /.col-lg-12 -->
    </div>

    <p>
        <?= Html::a(Yii::t('geo', 'Back'), Url::to('index'), ['class' =>'btn btn-success']) ?>
    </p>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
