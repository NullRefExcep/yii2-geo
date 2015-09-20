<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model nullref\geo\models\Country */

$this->title = Yii::t('geo', 'Create Country');
$this->params['breadcrumbs'][] = ['label' => Yii::t('geo', 'Countries'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
