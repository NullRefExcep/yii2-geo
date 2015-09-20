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
 * @property integer $createdAt
 * @property integer $updatedAt
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
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'createdAt',
                'updatedAtAttribute' => 'updatedAt',
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
            [['region_id', 'country_id', 'createdAt', 'updatedAt'], 'integer'],
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
            'region_id' => Yii::t('geo', 'Region ID'),
            'country_id' => Yii::t('geo', 'Country ID'),
            'createdAt' => Yii::t('geo', 'Created At'),
            'updatedAt' => Yii::t('geo', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(Region::className(), ['id' => 'region_id']);
    }

    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['id' => 'country_id']);
    }

}
