<?php


namespace App;
use Illuminate\Auth\GenericUser;


class LDAPUser extends GenericUser
{
    /* Constructs a LDAPUser from given attributes */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    /* @return Returns the name of the unique key that identifies this user */
    public static function keyName() : string
    {
        return 'username';
    }

    /* @return mixed Returns the name of the auth identifier for this user */
    public function getAuthIdentifierName()
    {
        return self::keyName();
    }

    /* @return mixed Returns the remember token */
    public function getRememberToken()
    {
        return null;
    }

     /* @return mixed Returns the name of the remember token */
    public function getRememberTokenName()
    {
        return null;
    }

    /* @return mixed Returns debug info to use when printing */
    public function __debugInfo() {
        return $this->attributes;
    }
}
