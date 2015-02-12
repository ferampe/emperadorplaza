<?php
// Should really capture login logic and reproduce it in different acceptance test suites

$I = new AcceptanceTester($scenario);
$U = new UserController($I);
$U->login('framos', '123456');

//$I->chooseSite;

$I->wantTo('See all packages on the index page');
$I->lookForwardTo('Create, edit and delete packages');
$I->amOnPage('admin/package');
$I->see('Package');
$I->click('Add Package');
$I->amOnPage('admin/package/create');
$I->see('Package Name');

//$I->fillField('name', 'Special #1 Heart of the Inca');
//$I->fillField('short_name', 'Heart of the Inca');
//$I->fillField('tag_destinations', 'Cusco, Sacred Valley, Macchu Picchu');
//$I->fillField('abstract', 'abstract text');
//$I->fillField('overview', 'Overview text');
//$I->fillField('table_price', 'price text');
//$I->fillField('included', 'included text');
//$I->click('save');

$U->logout();
