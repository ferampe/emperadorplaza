<?php

$I = new AcceptanceTester($scenario);
// User Signs in
$I->wantTo('Create Hotel');

$I->login("framos", "123456", $I);

$I->click('Peru');
$I->see('Package');

// User wants to add a new Hotel
$I->click('Hotels');
$I->see('Hotels');
$I->amOnPage('/admin/hotel');
$I->see('Add Hotel');

$I->amOnPage('/admin/hotel/edit/1');

$I->fillField('name', '');
$I->fillField('address', '');
$I->fillField('abstract', '');
$I->fillField('icon', '');
$I->fillField('icon_alt', '');
$I->fillField('icon_title', '');
$I->fillField('url', '');
$I->fillField('title_seo', '');
$I->fillField('description_seo', '');
$I->fillField('keywords_seo', '');
$I->selectOption('publish', '1');
$I->selectOption("star", '2');
$I->selectOption("services_facilities[]", "1");
$I->selectOption("top_pick", "1");
$I->click('Save');




