<?php
namespace grozzzny\editable\models;

class Editable extends Base
{
    const CACHE_KEY = 'gr_editable';

    const TITLE = 'Вставка кода';
    const ALIAS = 'editable';

    const SUBMENU_PHOTOS = false;
    const SUBMENU_FILES = false;
    const SHOW_ORDER_NUM = true;
    const PRIMARY_MODEL = true;

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
            'name' => 'Имя',
            'code' => 'Код',
            'order_num' => 'Индекс сортировки',
            'status' => 'Состояние',
        ];
    }

    public static function queryFilter(&$query, $get)
    {
        if(!empty($get['text'])){
            $query->andFilterWhere(['LIKE', 'name', $get['text']]);
        }
    }

    public static function querySort(&$provider)
    {
        $sort = [];

        $attributes = [
            'id',
            'name',
            'status',
            'order_num'
        ];

        if(self::SHOW_ORDER_NUM){
            $sort = $sort + ['defaultOrder' => ['order_num' => SORT_DESC]];
            $attributes = $attributes + ['order_num'];
        }

        $sort = $sort + ['attributes' => $attributes];

        $provider->setSort($sort);
    }

}
