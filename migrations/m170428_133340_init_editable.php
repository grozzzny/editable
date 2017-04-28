<?php

class m170428_133340_init_editable extends \grozzzny\editable\migrations\Migration
{
    public function safeUp()
    {
        $this->createTable('gr_editable', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'code' => $this->text(),
            'status' => $this->boolean()->defaultValue(1),
            'order_num' => $this->integer()->notNull(),
        ], $this->tableOptions);


        $this->insert('easyii_modules', [
            'name' => 'editable',
            'class' => 'grozzzny\editable\Module',
            'title' => 'Editable',
            'icon' => 'font',
            'status' => 1,
            'settings' => '[]',
            'notice' => 0,
            'order_num' => 120
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('gr_editable');
        $this->delete('easyii_modules',['name' => 'editable']);

        echo "m170428_133340_init_editable cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170415_185424_create_table_call_back cannot be reverted.\n";

        return false;
    }
    */
}
