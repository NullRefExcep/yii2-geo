<?php

namespace nullref\geo\controllers\api;
use nullref\geo\models\Country;
use yii\rest\ActiveController;

/**
 * @author    Dmytro Karpovych
 * @copyright 2015 NRE
 */
class CountryController extends ActiveController
{
    public $modelClass = Country::class;
}