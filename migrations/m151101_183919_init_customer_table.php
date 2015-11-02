<?php

use yii\db\Schema;
use yii\db\Migration;

class m151101_183919_init_customer_table extends Migration
{
    public function up()
    {
		$this->createTable(
			'customer', [
				'id' => 'pk',
				'name' => 'string',
				'birth_date' => 'date',
				'notes' => 'text',
			], 
			'ENGINE=InnoDB'
		);
		
		$this->createTable(
			'phone', [
				'id' => 'pk',
				'customer_id' => 'int unique',
				'number' => 'string',
			], 
			'ENGINE=InnoDB'
		);
		
		$this->addForeignKey('customer_phone_numbers', 'phone', 'customer_id', 'customer', 'id');
    }

    public function down()
    {
        //echo "m151101_183919_init_customer_table cannot be reverted.\n";
    	$this->dropForeignKey('customer_phone_numbers', 'phone');
    	$this->dropTable('phone');
        $this->dropTable('customer');

        //return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
