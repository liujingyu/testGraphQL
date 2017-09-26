<?php

Relay::group(['namespace' => 'App\\Http\\GraphQL', 'middleware' => 'auth'], function () {
    Relay::group(['namespace' => 'Mutations'], function () {
        Relay::mutation('createUser', 'CreateUserMutation');
    });

    Relay::group(['namespace' => 'Queries'], function () {
        Relay::query('userQuery', 'UserQuery');
    });

    Relay::group(['namespace' => 'Types'], function () {
        Relay::type('user', 'UserType');
    });
});
