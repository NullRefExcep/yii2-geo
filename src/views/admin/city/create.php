<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model nullref\geo\models\City */

$this->title = Yii::t('geo', 'Create City');
$this->params['breadcrumbs'][] = ['label' => Yii::t('geo', 'Cities'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="city-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
