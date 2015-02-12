<?php

$I = new AcceptanceTester($scenario);
$I->wantTo('Edit Category Package');
$I->login('framos', '123456');

$I->click('Peru');
$I->see('Package');

// User wants to add a new destination
$I->click('Category Package');
$I->amOnPage('/admin/categoryPackage');

$I->amOnPage('admin/categoryPackage/edit/1');

// Fill out form fields
$I->fillField('name', 'Test Category Package');
$I->fillField('url', '');
$I->fillField('title_seo', '');
$I->fillField('description_seo', '');
$I->fillField('keywords_seo', '');
$I->selectOption('publish', '1');

$I->click('Save');
$I->click('Category Package');
$I->see('Test Category Package');


