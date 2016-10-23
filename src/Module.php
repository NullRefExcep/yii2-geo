<?php

namespace nullref\geo;

use nullref\admin\interfaces\IMenuBuilder;
use nullref\core\components\Module as BaseModule;
use nullref\core\interfaces\IAdminModule;
use rmrevin\yii\fontawesome\FA;
use Yii;
use yii\base\Application;
use yii\base\BootstrapInterface;
use yii\i18n\PhpMessageSource;
use yii\web\Application as WebApplication;
use yii\base\InvalidConfigException;

/**
 *
 */
class Module extends BaseModule implements IAdminModule, BootstrapInterface
{
    /**
     * Allow to override module classes
     * @var array
     */
    public $classMap = [];

    protected $_classMap = [
        'City' => 'nullref\geo\models\City',
        'Region' => 'nullref\geo\models\Region',
        'Country' => 'nullref\geo\models\Country',
    ];

    public function bootstrap($app)
    {
        $classMap = array_merge($this->_classMap, $this->classMap);
        foreach (array_keys($this->classMap) as $item) {
            $className = '\nullref\geo\models\\' . $item;
            $geoClass = $className::className();
            $definition = $classMap[$item];
            Yii::$container->set($geoClass, $definition);
        }
        if ($app instanceof WebApplication) {
            $app->i18n->translations['geo*'] = [
                'class' => PhpMessageSource::className(),
                'basePath' => '@nullref/geo/messages',
            ];
        }
    }

    public static function getAdminMenu()
    {
        return [
            'label' => Yii::t('geo', 'Geo'),
            'icon' => FA::_GLOBE,
            'order' => 2,
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
