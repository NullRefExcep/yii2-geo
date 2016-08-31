<?php

namespace nullref\geo;

use nullref\cms\components\PageUrlRule;
use yii\base\BootstrapInterface;
use yii\base\Event;
use yii\gii\Module as Gii;
use yii\i18n\PhpMessageSource;
use yii\web\Application as WebApplication;
use Yii;

class Bootstrap implements BootstrapInterface
{
    protected $classMap = [
        'City' => 'nullref\geo\models\City',
        'Region' => 'nullref\geo\models\Region',
        'Country' => 'nullref\geo\models\Country',
    ];

    public function bootstrap($app)
    {
        /** @var Module $module */
        if ($app->hasModule('geo') && ($module = $app->getModule('geo')) instanceof Module) {
            $classMap = array_merge($this->classMap, $module->classMap);
            foreach (array_keys($this->classMap) as $item) {
                $className = '\nullref\geo\models\\' . $item;
                $geoClass = $className::className();
                $definition = $classMap[$item];
                Yii::$container->set($geoClass, $definition);
            }
        }
        if ($app instanceof WebApplication) {
            $app->i18n->translations['geo*'] = [
                'class' => PhpMessageSource::className(),
                'basePath' => '@nullref/geo/messages',
            ];
        }
    }
}
