<?php
namespace app\models\customer;
use yii\db\ActiveRecord;

class PhoneRecord extends ActiveRecord{
	public static function tableName(){
		return 'phone';
	}
	
	public function rules(){
		return [
			['id', 'number'],
			['number', 'string'],
			[['customer_id', 'number'], 'required'],
		];
	}
}