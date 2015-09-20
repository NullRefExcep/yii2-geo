<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model nullref\geo\models\Region */

$this->title = Yii::t('geo', 'Create Region');
$this->params['breadcrumbs'][] = ['label' => Yii::t('geo', 'Regions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="region-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
