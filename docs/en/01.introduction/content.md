## Introduction[](#introduction)

The Users module provides easy to use and powerful user management , authentication, and authorization.


### Features[](#introduction/features)

The users module comes with everything you need for simple and advanced authentication and authorization needs.

*   Registration
*   Authentication
*   Authorization
*   Password Reset
*   Login Throttling
*   Users & Roles Management
*   Addon based permission system.
*   Multiple activation scenarios.
*   Extension-based Authentication
*   Extension-based Security
*   Configurable Login Fields
*   Integrated with Laravel's `Auth` service.
*   Interface Design (implementations your own as needed).


### Installation[](#introduction/installation)

You can install the Users module with the `addon:install` command:

    php artisan addon:install anomaly.module.users

<div class="alert alert-warning">**Notice:** The Users module comes installed with PyroCMS out of the box.</div>


### Configuration[](#introduction/configuration)

You can override Users module configuration by publishing the addon and modifying the resulting configuration file:

    php artisan addon:publish anomaly.module.users

The addon will be published to `/resources/{application}/addons/anomaly/users-module`.


#### Login Field[](#introduction/configuration/login-field)

The `anomaly.module.users::config.login` value determines which field is used for logging in along with the password. Valid options are `email` (default) or `username`.

    'login' => env('LOGIN', 'email'),

You can also use the `.env` file to set this value with `LOGIN`.


#### Activation Mode[](#introduction/configuration/activation-mode)

The `anomaly.module.users::config.activation_mode` value determines how users are activated when they register. A user must be activated in order to login.

    'activation_mode' => env('ACTIVATION_MODE', 'email'),

Valid options are:

*   `email` - Send an activation email to the user. This is the default mode.
*   `manual` - Require an admin to manually activate the user.
*   `automatic` - Automatically activate the user when they register.
