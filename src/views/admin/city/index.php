<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('geo', 'Cities');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="city-index">

    <div class="row">
        <div class="col-lg-12">
            <h1><?= Html::encode($this->title) ?></h1>
        </div>         <!-- /.col-lg-12 -->
    </div>

    <p>
        <?= Html::a(Yii::t('geo', 'Create City'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'name',
            // 'data:ntext',
            [
                'attribute' => 'region',
                'value' => 'region.name',
                'label' => Yii::t('geo', 'Region'),
            ],
            [
                'attribute' => 'country',
                'value' => 'country.name',
                'label' => Yii::t('geo', 'Country'),
            ],
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
