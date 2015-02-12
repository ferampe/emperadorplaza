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
$I->click('Delete');
