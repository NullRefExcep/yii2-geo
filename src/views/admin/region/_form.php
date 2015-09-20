<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use nullref\geo\models\Country;

/* @var $this yii\web\View */
/* @var $model nullref\geo\models\Region */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="region-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'country_id')
        ->dropDownList(Country::getDropDownArray(),
            ['prompt' => Yii::t('geo', 'Choose country')])
        ->label(Yii::t('geo', 'Countries'));
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('geo', 'Create') : Yii::t('geo', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
