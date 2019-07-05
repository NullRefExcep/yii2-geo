<?php

namespace nullref\cms\geo;

use nullref\core\traits\MigrationTrait;
use yii\db\Migration;

class m150920_102406_create_geo_tables extends Migration
{
    use MigrationTrait;

    protected $geo = [
        'country' => '{{%country}}',
        'region' => '{{%region}}',
        'city' => '{{%city}}',
    ];

    public function up()
    {
        foreach ($this->geo as $table) {
            if ($this->tableExist($table)) {
                $this->stdout("Table '{$table}' already exists\n");
                if ($this->confirm('Drop and create new?')) {
                    $this->dropTable($table);
                } else {
                    return true;
                }
            }
        }

        /**
         * Create country table
         */
        $this->createTable($this->geo['country'], [
            'id' => $this->primaryKey(),
            'code' => $this->string()->notNull(),
            'name' => $this->string()->notNull(),
            'data' => $this->text(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $this->getTableOptions());

        /**
         * Create region table
         */
        $this->createTable($this->geo['region'], [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'data' => $this->text(),
            'country_id' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $this->getTableOptions());

        /**
         * Create region table
         */
        $this->createTable($this->geo['city'], [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'data' => $this->text(),
            'region_id' => $this->integer()->notNull(),
            'country_id' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $this->getTableOptions());

    }

    public function down()
    {
        $this->dropTable($this->geo['city']);
        $this->dropTable($this->geo['region']);
        $this->dropTable($this->geo['country']);
        return true;
    }

}
