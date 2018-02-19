<?php

class m170428_133340_init_editable extends \yii\db\Migration
{
    public $engine = 'ENGINE=MyISAM DEFAULT CHARSET=utf8';

    public function up()
    {
        $this->createTable('gr_editable', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'code' => $this->text(),
            'status' => $this->boolean()->defaultValue(1),
            'order_num' => $this->integer()->notNull(),
        ], $this->engine);
    }

    public function down()
    {
        $this->dropTable('gr_editable');

        echo "m170428_133340_init_editable cannot be reverted.\n";

        return false;
    }

}
