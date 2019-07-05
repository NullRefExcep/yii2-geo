<?php

namespace nullref\geo\controllers\api;
use nullref\geo\models\Region;
use yii\rest\ActiveController;

/**
 * @author    Dmytro Karpovych
 * @copyright 2015 NRE
 */
class RegionController extends ActiveController
{
    public $modelClass = Region::class;
}