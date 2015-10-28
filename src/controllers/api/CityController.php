<?php

namespace nullref\geo\controllers\api;
use yii\rest\ActiveController;

/**
 * @author    Dmytro Karpovych
 * @copyright 2015 NRE
 */
class CityController extends ActiveController
{
    public $modelClass = 'nullref\geo\models\City';
}