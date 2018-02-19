<?php
namespace grozzzny\editable\models;

use Yii;
use yii\data\BaseDataProvider;
use yii\easyii2\components\ActiveQuery;
use yii\easyii2\components\FastModel;
use yii\easyii2\components\FastModelInterface;

/**
 * Class Editable
 * @package grozzzny\editable\models
 *
 * @property int $id [int(11)]
 * @property string $name [varchar(255)]
 * @property string $code
 * @property bool $status [tinyint(1)]
 * @property int $order_num [int(11)]
 */
class Editable extends FastModel implements FastModelInterface
{
    const PRIMARY_MODEL = true;

    const CACHE_KEY = 'editable';
    const ORDER_NUM = false;

    public static function tableName()
    {
        return 'gr_editable';
    }

    public function rules()
    {
        return [
            ['id', 'number', 'integerOnly' => true],
            [['name'], 'string'],
            [['code'], 'safe'],

            ['status', 'default', 'value' => self::STATUS_ON],
            [['order_num'], 'integer'],

            ['name', 'required'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => Yii::t('app/editable', 'Name'),
            'code' => Yii::t('app/editable', 'Code'),
            'order_num' => Yii::t('app/editable', 'Index sort'),
            'status' => Yii::t('app/editable', 'Status'),
        ];
    }

    public static function getNameModel()
    {
        // TODO: Implement getNameModel() method.
        return Yii::t('app/editable', 'Editable');
    }

    public static function getSlugModel()
    {
        // TODO: Implement getNameModel() method.
        return 'editable';
    }


    public static function queryFilter(ActiveQuery &$query, $get)
    {
        if(!empty($get['text'])){
            $query->andFilterWhere(['LIKE', 'name', $get['text']]);
        }
    }

    public static function querySort(BaseDataProvider &$provider)
    {
        $provider->setSort([
            'defaultOrder' => [
                'id' => SORT_DESC
            ],
            'attributes' => [
                'id',
                'name',
                'status',
            ]
        ]);
    }

}
