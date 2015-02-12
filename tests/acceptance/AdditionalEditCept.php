<?php

$I = new AcceptanceTester($scenario);
$I->wantTo('Edit Additional');
$I->login('framos', '123456', $I);

$I->click('Peru');
$I->see('Package');

// User wants to add a new destination
$I->click('Additional');
$I->amOnPage('/admin/additional/edit/1');
$I->seeInCurrentUrl('/admin/additional/edit/1');
$I->see('Editing');

// Fill out form fields
$I->fillField('name', 'Additional Name Edited');
//$I->fillField('anchor', 'Additional Services in Edited City');
$I->selectOption('publish', '1');

$I->click('Save');
$I->click('Additional');
$I->see('Additional Name Edited');


