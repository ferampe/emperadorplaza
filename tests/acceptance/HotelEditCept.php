<?php

$I = new AcceptanceTester($scenario);
// User Signs in
$I->wantTo('Edit Hotel');
$I->amOnPage('users/login');
$I->fillField('email', 'framos');
$I->fillField('password', '123456');
$I->click('Login');
$I->amOnPage('admin/');

$I->see('Welcome');
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
$I->fillField('keywords_seo', '');
$I->selectOption('publish', '1');
$I->click('Save');

$I->see('Validation Errors');
$I->see('The name field is required', '.error');
$I->see('Hotel Name Required');
$I->see('The abstract field is required', '.error');
$I->see('The url field is required.', '.error');
$I->see('Grade Required');

// Fill in Hotel Name, which is a required field

$I->fillField('name', 'Test Hotel');
$I->click('Save');
$I->dontsee('The name field is required', '.error');

$I->fillField('abstract', 'Text exceeding the length of 50 characters. Is that long enough? Now it is.');
$I->click('Save');

$I->dontsee('Abstract Required');

$I->click('Hotels');
$I->see('Delfin I Test');

//$I->fillField('abstract', 'The first luxury vessel of its kind to cruise the untamed but breathtaking Amazon River');
//$I->fillField('icon', 'img/path');
//$I->fillField('icon_alt', 'alternative text');
//$I->fillField('icon_title', 'title for image');
//$I->fillField('url', 'valid-url-with-dashes');
//$I->fillField('title_seo', 'This is the title of the page');
//$I->fillField('description_seo', 'This is a description which is not too long');
//$I->fillField('keywords_seo', 'keywords, separated, by, commas');
//$I->fillField('keywords_seo', 'keywords, separated, by, commas');
//$I->selectOption('publish', '1');

//{{ FieldHtml::selectPublish($hotel->publish, array('class' =>'form-control')) }}
//{{ FieldHtml::selectStar($hotel->star, array('class' => 'form-control')) }}
//{{ FieldHtml::selectServicesFacilities('services_facilities[]', $servicesFacilities, array('class' => 'form-control selectpicker', 'multiple', 'data-live-search' => 'true')) }}
//{{ FieldHtml::selectTopPick($hotel->top_pick, array('class' =>'form-control')) }}

