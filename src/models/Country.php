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
 * @property integer $created_at
 * @property integer $updated_at
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
            [['code', 'name'], 'required'],
            [['data'], 'safe'],
            [['created_at', 'updated_at'], 'integer'],
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
            'created_at' => Yii::t('geo', 'Created At'),
            'updated_at' => Yii::t('geo', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegions()
    {
        return $this->hasMany(Region::class, ['country_id' => 'id'])->orderBy(['name' => SORT_ASC]);
    }

    public function getCities()
    {
        return $this->hasMany(City::class, ['country_id' => 'id'])->orderBy(['name' => SORT_ASC]);
    }

}
