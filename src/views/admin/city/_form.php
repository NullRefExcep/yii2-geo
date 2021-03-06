<?php

use kartik\depdrop\DepDrop;
use nullref\geo\models\Country;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model nullref\geo\models\City */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="city-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'country_id')
        ->dropDownList(Country::getDropDownArray(),
            ['prompt' => Yii::t('geo', 'Choose country')])
        ->label(Yii::t('geo', 'Country'));
    ?>

    <?= $form->field($model, 'region_id')->widget(DepDrop::class, [
        'options' => ['id' => 'region_id'],
        'pluginOptions'=>[
            'depends' => [Html::getInputId($model,'country_id')],
            'placeholder' => Yii::t('geo', 'Choose region'),
            'url' => Url::to(['/geo/admin/city/region'])
        ]
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('geo', 'Create') : Yii::t('geo', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
