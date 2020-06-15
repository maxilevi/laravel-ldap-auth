# laravel-ldap-auth

Example project on how to authenticate an user in laravel using LDAP and without touching the database

Similar to [jotaelesalinas/laravel-adminless-ldap-auth](https://github.com/jotaelesalinas/laravel-adminless-ldap-auth) but much simpler and without other dependencies

### Setup

Define the following settings in your .env

```
LDAP_HOST=ldap.forumsys.com
LDAP_PORT=389
LDAP_DOMAIN_DN=dc=example,dc=com
```

Now run the project and go to `/login` to see the demo!
