<?php
require_once 'Configuration.php';
require_once 'Scraping.php';
require_once 'PasswordHashing.php';
require_once 'Login.php';

$scraping = new Scraping(Configuration::$inboxUrl);
list($salt, $token) = $scraping->scrapeSaltAndToken();

$username = 'aa';
$password = 'aa';

$login = new Login(Configuration::$loginUrl, Configuration::$userAgent);
$login->login($token, $salt, $username, $password);