<?php


namespace App\Providers;
use App\Http\Controllers\Auth\LDAPAuth;
use App\LDAPUser;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Contracts\Auth\Authenticatable;

/* Class that handles validation user credentials using LDAP */
class LDAPUserProvider implements UserProvider
{

    public function retrieveById($identifier)
    {
        /* Retrieve user from the username */
        $this->retrieveByCredentials(['username' => $identifier]);
    }

    public function retrieveByToken($identifier, $token)
    {
        /* Throw an exception since LDAP does not support remember me tokens */
        throw new \Exception('LDAPUserProvider: Not possible to use "remember me" tokens.');
    }

    public function updateRememberToken(Authenticatable $user, $token)
    {
        /* Throw an exception since LDAP does not support remember me tokens */
        throw new \Exception('LDAPUserProvider: Not possible to use "remember me" tokens.');
    }

    public function retrieveByCredentials(array $credentials)
    {
        /* Create a new user */
        $username = $credentials['username'];
        if (!$username) {
            return null;
        }
        return new LDAPUser(['username' => $username]);
    }

    public function validateCredentials(Authenticatable $user, array $credentials)
    {
        /* Authenticate with the LDAPAuth class */
        return LDAPAuth::attempt($credentials['username'], $credentials['password']);
    }
}
