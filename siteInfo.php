<?php

abstract class SiteInfo {
  // Site structure: login and registration.
  public $loginPage = 'users/login';
  public $usernameField = 'email';
  public $passwordField = 'password';
  public $loginSubmitField = 'Login';

  // Site data: user accounts.
  public $adminUsername;
  public $adminPassword;
  }
