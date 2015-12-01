<?php

namespace nullref\geo;

use nullref\admin\interfaces\IMenuBuilder;
use nullref\core\components\Module as BaseModule;
use nullref\core\interfaces\IAdminModule;
use rmrevin\yii\fontawesome\FA;
use Yii;
use yii\base\InvalidConfigException;

/**
 *
 */
class Module extends BaseModule implements IAdminModule
{
    public static function getAdminMenu()
    {
        return [
            'label' => Yii::t('geo', 'Geo'),
            'icon' => FA::_GLOBE,
            'items' => [
                'countries' => [
                    'label' => \Yii::t('geo', 'Countries'),
                    'url' => ['/geo/admin/country'],
                    'icon' => FA::_FLAG_O,
                ],
                'regions' => [
                    'label' => \Yii::t('geo', 'Regions'),
                    'url' => ['/geo/admin/region'],
                    'icon' => FA::_MAP_O,
                ],
                'cities' => [
                    'label' => \Yii::t('geo', 'Cities'),
                    'url' => ['/geo/admin/city'],
                    'icon' => FA::_MAP_MARKER,
                ]

            ]
        ];
    }

}