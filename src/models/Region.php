<?php

namespace nullref\geo\models;

use nullref\core\models\Model as BaseModel;
use nullref\useful\DropDownTrait;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "region".
 *
 * @property integer $id
 * @property string $name
 * @property string $data
 * @property integer $country_id
 * @property integer $createdAt
 * @property integer $updatedAt
 *
 * @property City[] $cities
 *
 * @property $country Country
 */
class Region extends BaseModel
{

    use DropDownTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'region';
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
            [['name', 'country_id'], 'required'],
            [['data'], 'safe'],
            [['country_id', 'createdAt', 'updatedAt'], 'integer'],
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
            'country_id' => Yii::t('geo', 'Country'),
            'createdAt' => Yii::t('geo', 'Created At'),
            'updatedAt' => Yii::t('geo', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasMany(City::className(), ['country_id' => 'id'])->orderBy(['name' => SORT_ASC]);
    }

    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['id' => 'country_id']);
    }

}
