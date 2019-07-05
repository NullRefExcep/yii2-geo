<?php

namespace nullref\geo\models;

use nullref\core\models\Model as BaseModel;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "city".
 *
 * @property integer $id
 * @property string $name
 * @property string $data
 * @property integer $region_id
 * @property integer $country_id
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property $region Region
 * @property $country Country
 */
class City extends BaseModel
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'city';
    }

    public function behaviors()
    {
        return array_merge(parent::behaviors(), [
            'timestamp' => [
                'class' => TimestampBehavior::class,
            ],
        ]);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'region_id', 'country_id'], 'required'],
            [['data'], 'safe'],
            [['region_id', 'country_id', 'created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('geo', 'ID'),
            'name' => Yii::t('geo', 'Name'),
            'data' => Yii::t('geo', 'Data'),
            'region_id' => Yii::t('geo', 'Region'),
            'country_id' => Yii::t('geo', 'Country'),
            'created_at' => Yii::t('geo', 'Created At'),
            'updated_at' => Yii::t('geo', 'Updated At'),
        ];
    }

    public function getCountry()
    {
        return $this->hasOne(Country::class, ['id' => 'country_id']);
    }

    public function getDepRegion($country_id)
    {
        $result = [];
        $depRegions = $this->getRegion()->where(['country_id' => $country_id])->all();
        foreach ($depRegions as $key => $region) {
            $result = [
                ['id' => "<region-id-$key>", 'name' => "<region-name$key>"]
            ];

        }
        return $result;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(Region::class, ['id' => 'region_id']);
    }

}
