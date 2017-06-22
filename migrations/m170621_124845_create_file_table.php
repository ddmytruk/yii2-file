<?php

use yii\db\Migration;

/**
 * Handles the creation of table `file`.
 */
class m170621_124845_create_file_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%file}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(11)->defaultValue(null),
            'name' => $this->char(255)->notNull(),
            'label' => $this->text(),
            'expansion' => $this->char(255)->notNull(),
            'size' => $this->integer(20)->defaultValue(null),
            'csrf' => $this->char(56)->defaultValue(null),
            'created_at'=> $this->dateTime()->notNull(),
            'updated_at'=> $this->dateTime()->notNull(),
        ]);

        $this->createIndex('idx_file__user_id', '{{%file}}', 'user_id');
        $this->addForeignKey('fk_file__user_id', '{{%file}}', 'user_id', '{{%user}}', 'id');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('fk_file__user_id', '{{%file}}');
        $this->dropIndex('idx_file__user_id', '{{%file}}');
        $this->dropTable('file');
    }
}
