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
$I->click('Destinations');
$I->see('Destinations');
$I->amOnPage('/admin/destination/edit/1');
$I->see('Destination Name');

//$I->fillField('name', '');
$I->fillField('name', 'Destination Name');
$I->fillField('content', 'valid content');
$I->fillField('publish', '1');
$I->click('SEO');
$I->see('Url');
$I->fillField('url', '');
//$I->fillField('url', 'destinations-peru-machu-picchu');
$I->fillField('title_seo', '');
$I->fillField('description_seo', '');
$I->fillField('keywords_seo', '');
$I->click('Open Graph SEO');
$I->fillField('open_graft_title', '');
$I->fillField('open_graft_image', '');
$I->fillField('open_graft_url', '');
$I->fillField('open_graft_description', '');
$I->click('Twitter SEO');
$I->fillField('twitter_card', '');
$I->fillField('twitter_creator', '');
$I->fillField('twitter_title', '');
$I->fillField('twitter_image', '');
$I->fillField('twitter_description', '');
$I->click('Save');
$I->click('Destinations');
$I->amOnPage('admin/destination');
$I->see('Destination Name');


