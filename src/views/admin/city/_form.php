<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use nullref\geo\models\Country;
use nullref\geo\models\Region;

/* @var $this yii\web\View */
/* @var $model nullref\geo\models\City */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="city-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'region_id')
        ->dropDownList(Region::getDropDownArray(),
            ['prompt' => Yii::t('geo', 'Choose region')])
        ->label(Yii::t('geo', 'Region'));
    ?>

    <?= $form->field($model, 'country_id')
        ->dropDownList(Country::getDropDownArray(),
            ['prompt' => Yii::t('geo', 'Choose country')])
        ->label(Yii::t('geo', 'Country'));
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('geo', 'Create') : Yii::t('geo', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
