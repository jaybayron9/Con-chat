<?php 

use SQL\ConnectDB;
use SQL\SchemaBuilder;

class CreateMessageTable extends ConnectDB {
    public function up() {
        $schemaBuilder = new SchemaBuilder(ConnectDB::$conn); 
        $schemaBuilder->table('messages')->primaryKey()->autoIncrement()->notNullable()
            ->integer('from_user_id')->notNullable()
            ->integer('to_user_id')->notNullable()
            ->longtext('message')->notNullable()
            ->build();
    }

    public function down() {
        ConnectDB::$conn->exec("DROP TABLE IF EXISTS messages");
    }
}