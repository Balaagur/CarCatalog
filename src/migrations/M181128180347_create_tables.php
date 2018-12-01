<?php

namespace app\migrations;

use nullref\core\traits\MigrationTrait;
use yii\db\Migration;

/**
 * Class m181128_180347_create_tables
 */
class M181128180347_create_tables extends Migration
{
    use MigrationTrait;

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%car}}', [
            'id'          => $this->primaryKey(),
            'model'       => $this->string(),
            'photo'       => $this->string(),
            'photos'      => $this->text(),
            'description' => $this->text(),
            'vendor_id'   => $this->integer(),
            'category_id' => $this->integer(),
            'created_at'  => $this->integer(),
            'updated_at'  => $this->integer(),
        ]);

        $this->createTable('{{%vendor}}', [
            'id'         => $this->primaryKey(),
            'title'      => $this->string(),
            'country'    => $this->string(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        $this->createTable('{{%category}}', [
            'id'         => $this->primaryKey(),
            'title'   => $this->string(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        $this->addForeignKey(
            'car-vendor-fk',
            '{{%car}}',
            'vendor_id',
            '{{%vendor}}',
            'id'
        );

        $this->addForeignKey(
            'car-category-fk',
            '{{%car}}',
            'category_id',
            '{{%category}}',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'car-vendor-fk',
            '{{%car}}'
        );
        $this->dropForeignKey(
            'car-category-fk',
            '{{%car}}'
        );

        $this->dropTable('{{%category}}');
        $this->dropTable('{{%vendor}}');
        $this->dropTable('{{%car}}');

        return true;
    }
}
