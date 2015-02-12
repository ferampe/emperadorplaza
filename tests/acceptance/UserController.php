<?php
class UserController
{
    protected $user;
 
    public function __construct(AcceptanceTester $I) {
      $this->user = $I;
    }
 
    public function login($username, $password) {
      $this->user->amOnPage(LoginPage::$URL);
      $this->user->fillField(LoginPage::$usernameField, $username);
      $this->user->fillField(LoginPage::$passwordField, $password);
      $this->user->click(LoginPage::$submitButton);
      //$this->user->see("Welcome");
    }

   public function logout() {
     $this->user->seeLink('Logout','users/logout');
    //$this->user->click('a[href="users/logout"]');
   }

   public function chooseSite($site) {
    $this->user->wantTo('Pick a site page to edit');
    $this->user->lookForwardTo('Access content on a particular site');
    $this->user->amOnPage('admin/'); //todo: This is hardcoded, should not be
    $this->user->click('Peru');
    $this->user->see('admin/package');
    $this->user->see('Peru', '.navbar-brand');
   }
}
