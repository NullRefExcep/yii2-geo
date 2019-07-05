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
 * @property integer $created_at
 * @property integer $updated_at
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
            [['name', 'country_id'], 'required'],
            [['data'], 'safe'],
            [['country_id', 'created_at', 'updated_at'], 'integer'],
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
            'country_id' => Yii::t('geo', 'Country ID'),
            'created_at' => Yii::t('geo', 'Created At'),
            'updated_at' => Yii::t('geo', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCities()
    {
        return $this->hasMany(City::class, ['country_id' => 'id'])->orderBy(['name' => SORT_ASC]);
    }

    public function getCountry()
    {
        return $this->hasOne(Country::class, ['id' => 'country_id']);
    }

}
