<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model nullref\geo\models\Region */

$this->title = Yii::t('geo', 'Update {modelClass}: ', [
    'modelClass' => 'Region',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('geo', 'Regions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('geo', 'Update');
?>
<div class="region-update">

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
