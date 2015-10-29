<?php
//Added namespaces with Aliasing to fix "Class not found" error with CodeCeption
use Step\Acceptance\CRMOperatorSteps as CRMOperator;
use Step\Acceptance\CRMUserSteps as CRMUser;

$I = new CRMOperator($scenario);
$I->wantTo('add two different customers to database');

$I->amInAddCustomerUi();
$first_customer = $I->imagineCustomer();
$I->fillCustomerDataForm($first_customer);
$I->submitCustomerDataForm();

$I->seeIAmInListCustomersUi();

$I->amInAddCustomerUi();
$second_customer = $I->imagineCustomer();
$I->fillCustomerDataForm($second_customer);
$I->submitCustomerDataForm();

$I->seeIAmInListCustomersUi();
$I->logout();

$I = new CRMUser($scenario);
$I->wantTo('query the customer info using his phone number');

$I->amInQueryCustomerUi();
$I->fillInPhoneFieldWithDataFrom($first_customer);
$I->clickSearchButton();

$I->seeIAmInListCustomersUi();
$I->seeCustomerInList($first_customer);
$I->dontSeeCustomerInList($second_customer);
