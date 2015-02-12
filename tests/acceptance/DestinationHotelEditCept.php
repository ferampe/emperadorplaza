<?php

$I = new AcceptanceTester($scenario);
// User Signs in
$I->wantTo('Edit Hotel Destination');
$I->amOnPage('users/login');
$I->fillField('email', 'framos');
$I->fillField('password', '123456');
$I->click('Login');
$I->amOnPage('admin/');

$I->see('Welcome');
$I->click('Peru');
$I->see('Package');

// User wants to add a new destination
$I->click('Destinations for Hotels');
$I->see('Destinations');
$I->amOnPage('/admin/destination_for_hotel');
$I->see('Destinations for Hotels');

$I->amOnPage('/admin/destination_for_hotel/edit/1');

$I->fillField('name', 'Destination Name');
$I->click('Save');
$I->click('Destinations for Hotels');
$I->see('Destination Name');


