<?php
namespace app\controllers;
use yii\web\Controller;

class CustomersController extends Controller{
	public function actionIndex(){
		$records = $this->getRecordsAccordingToQuery();
		$this->render('index', compact('records'));
	}
	
	private function store(Customer $customer){
		$customer_record = new CustomerRecord();
		$customer_record->name = $customer->name;
		$customer_record->birth_date = $customer->birth_date->format('Y-m-d');
		$customer_record->notes = $customer->notes;
		$customer_record->save();
		
		foreach($customer->phones as $phone){
			$phone_record = new PhoneRecord();
			$phone_record->number = $phone->number;
			$phone_record->customer_id = $customer_record->id;
			$phone_record->save();
		}
	}
	
	private function makeCustomer(CustomerRecord $customer_record, PhoneRecord $phone_record){
		$name = $customer_record->name;
		$birth_date = $customer_record->birth_date;
		$customer = new Customer($name, $birth_date);
		$customer->phones[] = new Phone($phone_record->number);
		
		return $customer;
	}
}