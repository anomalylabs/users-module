## Services[](#services)

This section will introduce you to the various services available in the Users module and how to use them.


### Authentication[](#services/authentication)

This section will introduce you to the authentication service and how to user it.


#### User Authenticator[](#services/authentication/user-authenticator)

This class will go over the `\Anomaly\UsersModule\User\UserAuthenticator` class and how to use it.


##### UserAuthenticator::attempt()[](#services/authentication/user-authenticator/userauthenticator-attempt)

The `attempt` method attempts to authorize a user. The `login` method is ran if the authentication succeeds.

###### Returns: `\Anomaly\UsersModule\User\Contract\UserInterface` or `false`

###### Arguments

<table class="table table-bordered table-striped">

<thead>

<tr>

<th>Key</th>

<th>Required</th>

<th>Type</th>

<th>Default</th>

<th>Description</th>

</tr>

</thead>

<tbody>

<tr>

<td>

$credentials

</td>

<td>

true

</td>

<td>

array

</td>

<td>

none

</td>

<td>

The credentials array of email/username and password.

</td>

</tr>

<tr>

<td>

$remember

</td>

<td>

false

</td>

<td>

boolean

</td>

<td>

false

</td>

<td>

The "remember me" flag.

</td>

</tr>

</tbody>

</table>

###### Example

    $authenticator->attempt(['email' => 'example@domain.com', 'password' => 'secret']);


##### UserAuthenticator::authenticate()[](#services/authentication/user-authenticator/userauthenticator-authenticate)

The `authenticate` method authenticates credentials without logging the user in.

###### Returns: `\Anomaly\UsersModule\User\Contract\UserInterface` or `false`

###### Arguments

<table class="table table-bordered table-striped">

<thead>

<tr>

<th>Key</th>

<th>Required</th>

<th>Type</th>

<th>Default</th>

<th>Description</th>

</tr>

</thead>

<tbody>

<tr>

<td>

$credentials

</td>

<td>

true

</td>

<td>

array

</td>

<td>

none

</td>

<td>

The credentials array of email/username and password.

</td>

</tr>

</tbody>

</table>

###### Example

    $authenticator->authenticate(['email' => 'example@domain.com', 'password' => 'secret password']);


##### UserAuthenticator::login()[](#services/authentication/user-authenticator/userauthenticator-login)

The `login` method logs in the user.

###### Returns: `void`

###### Arguments

<table class="table table-bordered table-striped">

<thead>

<tr>

<th>Key</th>

<th>Required</th>

<th>Type</th>

<th>Default</th>

<th>Description</th>

</tr>

</thead>

<tbody>

<tr>

<td>

$user

</td>

<td>

true

</td>

<td>

object

</td>

<td>

none

</td>

<td>

The user instance.

</td>

</tr>

</tbody>

</table>

###### Example

    $authenticator->login($user);


##### UserAuthenticator::logout()[](#services/authentication/user-authenticator/userauthenticator-logout)

The `logout` method logs out the user.

###### Returns: `void`

###### Arguments

<table class="table table-bordered table-striped">

<thead>

<tr>

<th>Key</th>

<th>Required</th>

<th>Type</th>

<th>Default</th>

<th>Description</th>

</tr>

</thead>

<tbody>

<tr>

<td>

$user

</td>

<td>

true

</td>

<td>

object

</td>

<td>

none

</td>

<td>

The user to logout.

</td>

</tr>

</tbody>

</table>

###### Example

    $authenticator->logout($user);


##### UserAuthenticator::kickOut()[](#services/authentication/user-authenticator/userauthenticator-kickout)

The `kickOut` method kicks a user. The `kickOut` method is similar to `logout` but a different event is fired for you to hook into as needed.

###### Returns: `void`

###### Arguments

<table class="table table-bordered table-striped">

<thead>

<tr>

<th>Key</th>

<th>Required</th>

<th>Type</th>

<th>Default</th>

<th>Description</th>

</tr>

</thead>

<tbody>

<tr>

<td>

$user

</td>

<td>

true

</td>

<td>

object

</td>

<td>

none

</td>

<td>

The user to kick out.

</td>

</tr>

</tbody>

</table>

###### Example

    $authenticator->kickOut($user);


### Security[](#services/security)

This section will introduce you to the security checker and how to use it.


#### User Security[](#services/security/user-security)

This section will introduce the `\Anomaly\UsersModule\User\UserSecurity` class and how to use it.


##### UserSecurity::attempt()[](#services/security/user-security/usersecurity-attempt)

The `attempt` method runs the security checks when an authentication `attempt` is performed.

###### Returns: `\Illuminate\Http\RedirectResponse` or `true`

###### Example

    $result = $security->attemp();


##### UserSecurity::check()[](#services/security/user-security/usersecurity-check)

The `check` method verifies that a user passes all the security checks.

###### Returns: `\Illuminate\Http\RedirectResponse` or `true`

###### Arguments

<table class="table table-bordered table-striped">

<thead>

<tr>

<th>Key</th>

<th>Required</th>

<th>Type</th>

<th>Default</th>

<th>Description</th>

</tr>

</thead>

<tbody>

<tr>

<td>

$user

</td>

<td>

false

</td>

<td>

object

</td>

<td>

none

</td>

<td>

The user instance to check.

</td>

</tr>

</tbody>

</table>

###### Example

    $result = $security->check($user);


### Middleware[](#services/middleware)

This section will introduce you to the middleware services and how to use them.


#### Authorizing Routes[](#services/middleware/authorizing-routes)

The Users module load's middleware into the stack that allows you to set custom parameters that ensure the request is made by an authorized user.


##### Authorize By Role[](#services/middleware/authorizing-routes/authorize-by-role)

You can authorize a route with `\Anomaly\UsersModule\Http\Middleware\AuthorizeRouteRole` by defining the `anomaly.module.users::role` route parameter;

    'example/test' => [
        'anomaly.module.users::role' => 'my_role',
        'uses' => 'Example/Controller@test'
    ]

You can also define an array of roles where the user must have at least one:

    'example/test' => [
        'anomaly.module.users::role' => ['my_role', 'another_role'],
        'uses' => 'Example/Controller@test'
    ]

Additionally you may include an optional redirect path and message in case the user does not pass authorization:

    'example/test' => [
        'anomaly.module.users::role' => 'my_role',
        'anomaly.module.users::redirect' => '/',
        'anomaly.module.users::message' => 'Sorry, you do not have access.',
        'uses' => 'Example/Controller@test'
    ]


##### Authorize By Permission[](#services/middleware/authorizing-routes/authorize-by-permission)

You can authorize a route with `\Anomaly\UsersModule\Http\Middleware\AuthorizeRoutePermission` by defining the `anomaly.module.users::permission` route parameter;

    'example/test' => [
        'anomaly.module.users::permission' => 'vendor.module.example::widgets.test',
        'uses' => 'Example/Controller@test'
    ]

You can also define an array of permissions where the user must have at least one:

    'example/test' => [
        'anomaly.module.users::role' => ['vendor.module.example::widgets.test', 'vendor.module.example::widgets.example'],
        'uses' => 'Example/Controller@test'
    ]

Additionally you may include an optional redirect path and message in case the user does not pass authorization:

    'example/test' => [
        'anomaly.module.users::permission' => 'vendor.module.example::widgets.test',
        'anomaly.module.users::redirect' => '/',
        'anomaly.module.users::message' => 'Sorry, you do not have access.',
        'uses' => 'Example/Controller@test'
    ]
