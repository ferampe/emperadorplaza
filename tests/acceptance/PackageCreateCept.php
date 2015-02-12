<?php
// Ideally we'd capture login logic and reproduce it in different acceptance test suites but that wasn't working out for me initially so let's just stick to this for now.

$I = new AcceptanceTester($scenario);
// User Signs in
//Cache::flush();
$I->wantTo('Create Package');
$I->amOnPage('users/login');
$I->fillField('email', 'framos');
$I->fillField('password', '123456');
$I->click('Login');
$I->amOnPage('admin/');

$I->see('Welcome');
$I->click('Peru');
$I->see('Package');

// User wants to add a new package
$I->click('Package');
$I->see('Package');
$I->amOnPage('admin/package');
$I->click('Add Package');

$I->amOnPage('admin/package/create');
$I->see('Package Name');

// Fill only required fields
$I->fillField('name', 'Test Package Name2');
$I->fillField('short_name', 'Test Package Short Name');
$I->fillField('abstract', 'Follow the path of the Incas and hike the challenging Inca Trail trek up to the magnificent citadel of Machu Picchu. This experience is one of the most rewarding.');
$I->fillField('url', 'test-package-url');
$I->selectOption('destinations[]', '1');

$I->click('Save');
$I->see('Package Stored');
$I->click('Package');
$I->amOnPage('admin/package');
$I->see("Test Package Name");
