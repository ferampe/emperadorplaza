<?php

$I = new AcceptanceTester($scenario);
$I->wantTo('Create Additional');
$I->login('framos', '123456', $I);

$I->click('Peru');
$I->see('Package');

// User wants to add a new destination
$I->click('Additional');
$I->amOnPage('/admin/additional');
$I->see('Additional');

$I->click('Add Additional');

 //Fill out form fields
$I->fillField('name', 'Additional Name');
$I->fillField('anchor', 'Additional Services in Cusco');
$I->selectOption('publish', '1');

$I->click('Save');
$I->click('Additional');
$I->see('Additional Name');


