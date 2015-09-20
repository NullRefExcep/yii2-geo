<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model nullref\geo\models\Country */

$this->title = Yii::t('geo', 'Update {modelClass}: ', [
    'modelClass' => 'Country',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('geo', 'Countries'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('geo', 'Update');
?>
<div class="country-update">

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
