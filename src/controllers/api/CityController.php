<?php

namespace nullref\geo\controllers\api;
use nullref\geo\models\City;
use yii\rest\ActiveController;

/**
 * @author    Dmytro Karpovych
 * @copyright 2015 NRE
 */
class CityController extends ActiveController
{
    public $modelClass = City::class;
}