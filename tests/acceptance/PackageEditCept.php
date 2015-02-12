<?php
// Ideally we'd capture login logic and reproduce it in different acceptance test suites but that wasn't working out for me initially so let's just stick to this for now.

$I = new AcceptanceTester($scenario);
$I->wantTo('Edit Package');
//Cache::flush();

// User Signs in
//$I->clearCache($I);
$I->login("framos", "123456", $I);

$I->click('Peru');
$I->see('Package');
$I->click('Package');

// User wants to add a new package
$I->amOnPage('admin/package');
$I->click('Add Package');

$I->amOnPage('admin/package/create');
$I->see('Package Name');

// Fill only required fields
$I->fillField('name', 'Test Package Name');
$I->fillField('short_name', 'Test Package Short Name');
$I->fillField("tag_destinations", "Cusco, Machu Picchu");
$I->fillField('abstract', 'Follow the path of the Incas and hike the challenging Inca Trail trek up to the magnificent citadel of Machu Picchu. This experience is one of the most rewarding.');
// Overview: Test manually
// Price: Test manually
// Included: Test manually
$I->fillField('url', 'test-package-url');
$I->fillField('title_seo', 'Peru Packages: Heart of the Inca | Peru Travel by Peru For Less');
$I->fillField('description_seo', 'Immerse yourself in the magical culture of the Incas with a trip to Cusco and visit World Wonder Machu Picchu, with our experts at Peru For Less');
$I->fillField('keywords_seo', 'Cusco tours, cusco travel, machu picchu tours, machu picchu travel, peru travel');
$I->selectOption('publish', '1');
$I->selectOption('destinations[]', '1');
// todo Figure out how to deal with this Category Package field, which is behaving strangely
//$I->click('Category Package');
//$I->selectOption('Category Package', '2');
// todo also the tour highlights field--maybe we need a WebDriver instead of PhpBrowser: http://codeception.com/docs/04-AcceptanceTests#Selenium-WebDriver
//$I->fillField('tour highlights', 'Machu Picchu, awesome stuff');
//$I->fillField("trip_style[]");
//$I->fillField("physical_difficulty");
//$I->filField("additional[]");
$I->click('Save');
$I->see('Package Stored');

$I->click('Package');
$I->amOnPage('admin/package');
$I->see("Test Package Name");

$I->amGoingTo('Delete the package I just created');
$I->click('Delete');

