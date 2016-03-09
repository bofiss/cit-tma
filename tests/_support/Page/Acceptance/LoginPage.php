<?php
namespace Page\Acceptance;

class LoginPage
{

    public static $URL = '/';
    public static $formId = '#user-login-form';
    public static $usernameField = '#edit-name';
    public static $passwordField = '#edit-pass';
    public static $Login= 'body.logged-in';
    protected $acceptanceTester;



    public static function route($params)
    {
        return static::$URL.$params;
    }



    public function __construct(\AcceptanceTester $I)
    {
        $this->acceptanceTester = $I;
    }

}
