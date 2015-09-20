<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model nullref\geo\models\Region */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('geo', 'Regions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="region-view">

    <div class="row">
        <div class="col-lg-12">
            <h1><?= Html::encode($this->title) ?></h1>
        </div>         <!-- /.col-lg-12 -->
    </div>

    <p>
        <?= Html::a(Yii::t('geo', 'Back'), Url::to('index'), ['class' =>'btn btn-success']) ?>
        <?= Html::a(Yii::t('geo', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('geo', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('geo', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'data:ntext',
            'country_id',
            'createdAt:datetime',
            'updatedAt:datetime',
        ],
    ]) ?>

</div>
