<?php

namespace nullref\geo\controllers\api;
use yii\rest\ActiveController;

/**
 * @author    Dmytro Karpovych
 * @copyright 2015 NRE
 */
class CountryController extends ActiveController
{
    public $modelClass = 'nullref\geo\models\Country';
}