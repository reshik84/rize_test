<?php

use yii\db\Migration;

/**
 * Class m211218_121446_init
 */
class m211218_121446_init extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%author}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()
        ]);

        $this->createTable('{{%book}}', [
            'id' => $this->primaryKey(),
            'author_id' => $this->integer(),
            'title' => $this->string()
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%author}}');
        $this->dropTable('{{%book}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211218_121446_init cannot be reverted.\n";

        return false;
    }
    */
}
