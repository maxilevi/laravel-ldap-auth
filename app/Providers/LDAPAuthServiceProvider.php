<?php


namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Auth;


class LDAPAuthServiceProvider extends ServiceProvider
{
    public function boot()
    {
    	/* Register the LDAPUserProvider class as a Laravel auth provider to use */
        Auth::provider('ldap_auth', function () {
            return new LDAPUserProvider();
        });
    }
}
