<?php

namespace nullref\geo\models;

use nullref\core\models\Model as BaseModel;
use nullref\useful\DropDownTrait;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "country".
 *
 * @property integer $id
 * @property string $code
 * @property string $name
 * @property string $data
 * @property integer $createdAt
 * @property integer $updatedAt
 *
 * @property Region[] $regions
 * @property City[] $cities
 */
class Country extends BaseModel
{
    use DropDownTrait;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'country';
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
            [['code', 'name'], 'required'],
            [['data'], 'safe'],
            [['createdAt', 'updatedAt'], 'integer'],
            [['code'], 'string', 'max' => 10],
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
            'code' => Yii::t('geo', 'Code'),
            'name' => Yii::t('geo', 'Name'),
            'data' => Yii::t('geo', 'Data'),
            'createdAt' => Yii::t('geo', 'Created At'),
            'updatedAt' => Yii::t('geo', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegions()
    {
        return $this->hasMany(Region::className(), ['country_id' => 'id'])->orderBy(['name' => SORT_ASC]);
    }

    public function getCity()
    {
        return $this->hasMany(City::className(), ['country_id' => 'id'])->orderBy(['name' => SORT_ASC]);
    }

}
