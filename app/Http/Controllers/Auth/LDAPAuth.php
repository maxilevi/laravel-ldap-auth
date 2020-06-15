<?php


namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\User;

class LDAPAuth
{

    /* Attempt to authenticate using LDAP and return the result */
    public static function attempt($username, $password)
    {
        try {
            $dn = "uid={$username}," . env('LDAP_DOMAIN_DN');
            $connection = self::connect();
            /* Create a connection and bind it */
            $result = self::bind($connection, $dn, $password);
            /* Close connection & return the result */
            self::close($connection);
            return $result;
        } catch(\Exception $e)
        {
            /* If we are here it means the validation failed and the user does not exist or the password was incorrect */
            return false;
        }
    }

    /* Connect to LDAP using the information from env */
    private static function connect()
    {
        return ldap_connect(env('LDAP_HOST'));
    }

    /* Close the LDAP Connection */
    private static function close($connection)
    {
        ldap_close($connection);
    }

    /* Bind the LDAP connection */
    private static function bind($ldapConnection, $dn, $password)
    {
        ldap_set_option($ldapConnection, LDAP_OPT_PROTOCOL_VERSION, 3);
        return ldap_bind($ldapConnection, $dn, $password);
    }
}
