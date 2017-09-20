## Usage[](#usage)

This section will show you how to use the addon via API and in the view layer.


### Users[](#usage/users)

Users are extensible stream entries that can be associated with multiples `roles`. Users have their own `permissions` that merge with those inherited from the `roles` they belong to.


#### User Fields[](#usage/users/user-fields)

Below is a list of `fields` in the `users` stream. Fields are accessed as attributes:

    $user->email;

Same goes for decorated instances in Twig:

    {{ user.email }}

###### Fields

<table class="table table-bordered table-striped">

<thead>

<tr>

<th>Key</th>

<th>Type</th>

<th>Description</th>

</tr>

</thead>

<tbody>

<tr>

<td>

email

</td>

<td>

email

</td>

<td>

The login email address.

</td>

</tr>

<tr>

<td>

username

</td>

<td>

text

</td>

<td>

The login username.

</td>

</tr>

<tr>

<td>

password

</td>

<td>

text

</td>

<td>

The hashed login password.

</td>

</tr>

<tr>

<td>

roles

</td>

<td>

multiple relationship

</td>

<td>

The roles the user has.

</td>

</tr>

<tr>

<td>

display_name

</td>

<td>

text

</td>

<td>

The publicly displayable name.

</td>

</tr>

<tr>

<td>

first_name

</td>

<td>

text

</td>

<td>

The real first name.

</td>

</tr>

<tr>

<td>

last_name

</td>

<td>

text

</td>

<td>

The real last name.

</td>

</tr>

<tr>

<td>

permissions

</td>

<td>

textarea

</td>

<td>

The serialized user permission array.

</td>

</tr>

<tr>

<td>

last_login_at

</td>

<td>

datetime

</td>

<td>

The last login datetime.

</td>

</tr>

<tr>

<td>

last_activity_at

</td>

<td>

text

</td>

<td>

The datetime for the last action made by the user.

</td>

</tr>

<tr>

<td>

ip_address

</td>

<td>

text

</td>

<td>

The last IP address that accessed the user account.

</td>

</tr>

</tbody>

</table>


##### Custom User Fields[](#usage/users/user-fields/custom-user-fields)

Custom user fields assigned through the control panel are assigned directly to the `users` stream and can be accessed directly from the user object.

    $user->favorite_color;

And in Twig:

    {{ user.favorite_color }}


#### User Interface[](#usage/users/user-interface)

This section will go over the features of the `\Anomaly\UsersModule\User\Contract\UserInterface` class.


##### UserInterface::hasRole()[](#usage/users/user-interface/userinterface-hasrole)

The `hasRole` method ensures that the user has the given `role`.

###### Returns: `boolean`

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

$role

</td>

<td>

true

</td>

<td>

string

</td>

<td>

none

</td>

<td>

The role ID, slug, or interface.

</td>

</tr>

</tbody>

</table>

###### Example

    if (auth()->user()->hasRole('admin') {
        echo "User is an admin!";
    }

###### Twig

    {% if auth_user().hasRole('admin') %}
        User is an admin!
    {% endif %}


##### UserInterface::hasAnyRole()[](#usage/users/user-interface/userinterface-hasanyrole)

The `hasAnyRole` method ensures that the user has at least one of the provided roles.

###### Returns: `boolean`

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

$roles

</td>

<td>

true

</td>

<td>

mixed

</td>

<td>

none

</td>

<td>

An array of role IDs or slugs. A collection of roles can also be passed.

</td>

</tr>

</tbody>

</table>

###### Example

    if (auth()->user()->hasAnyRole(['admin', 'manager'])) {
        echo 'Hello ' . $user->display_name;
    }

###### Twig

    {% if auth().user().hasAnyRole(['admin', 'manager'])) %}
        Hello {{ auth_user().display_name }}
    {% endif %}


##### UserInterface::isAdmin()[](#usage/users/user-interface/userinterface-isadmin)

The `isAdmin` method returns if the user has the `admin` role or not.

###### Returns: `boolean`

###### Example

    if ($user->isAdmin()) {
        echo "Hi Admin.";
    }

###### Twig

    Hello {{ auth_user().isAdmin() ? 'admin' : 'user' }}


##### UserInterface::hasPermission()[](#usage/users/user-interface/userinterface-haspermission)

The `hasPermission` method verifies that the user has the `permission`.

###### Returns: `boolean`

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

$permission

</td>

<td>

true

</td>

<td>

string

</td>

<td>

none

</td>

<td>

The permission string.

</td>

</tr>

<tr>

<td>

$checkRoles

</td>

<td>

false

</td>

<td>

boolean

</td>

<td>

true

</td>

<td>

Check the users roles for the permission too.

</td>

</tr>

</tbody>

</table>

###### Example

    if (auth()->user()->hasPermission('vendor.module.example::example.test')) {
        // So something
    }

###### Twig

    {% if auth_user().hasPermission('vendor.module.example::example.test')) %}
        {# So something #}
    {% endif %}


##### UserInterface::hasAnyPermission()[](#usage/users/user-interface/userinterface-hasanypermission)

The `hasAnyPermission` method verifies that the user has at least one of the given permissions.

###### Returns: `boolean`

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

$permissions

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

The array of permissions.

</td>

</tr>

<tr>

<td>

$checkRoles

</td>

<td>

false

</td>

<td>

boolean

</td>

<td>

true

</td>

<td>

Check the users roles for the permission too.

</td>

</tr>

</tbody>

</table>

###### Example

    $hasPermission = auth()->user()->hasAnyPermission(
        ['vendor.module.example::example.test', 'vendor.module.example::widget.example']
    );

    if ($hasPermission) {
        // Do something
    }

###### Twig

    {% set hasPermission = auth_user().hasAnyPermission(
        ['vendor.module.example::example.test', 'vendor.module.example::widget.example']
    ) %}

    {% if hasPermission %}
        {# Do something #}
    {% endif %}


#### User Presenter[](#usage/users/user-presenter)

This section will go over the `\Anomaly\UsersModule\User\UserPresenter` class that's returned in the view layer.


##### UserPresenter::name()[](#usage/users/user-presenter/userpresenter-name)

The `name` method returns the concatenated first and last name.

###### Returns: `string`

###### Example

    $decorated->name();

###### Twig

    Hi {{ user().name() }}


##### UserPresenter::gravatar()[](#usage/users/user-presenter/userpresenter-gravatar)

The `gravatar` method returns a Gravatar image URL for the user.

###### Returns: `string`

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

$parameters

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

Gravatar URL parameters.

</td>

</tr>

</tbody>

</table>

###### Example

    $decorated->avatar(['d' => 'mm']);

###### Twig

    {{ img(user().gravatar({'d': 'mm'})).class('img-rounded')|raw }}


#### User Repository[](#usage/users/user-repository)

The `\Anomaly\UsersModule\User\Contract\UserRepositoryInterface` class helps you retrieve users from the database.


##### UserRepositoryInterface::findByEmail()[](#usage/users/user-repository/userrepositoryinterface-findbyemail)

The `findByEmail` method finds a user by their email.

###### Returns: `\Anomaly\UsersModule\User\Contract\UserInterface` or `null`

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

$email

</td>

<td>

true

</td>

<td>

string

</td>

<td>

none

</td>

<td>

The users email.

</td>

</tr>

</tbody>

</table>

###### Example

    $user = $repository->findByEmail('example@domain.com');


##### UserRepositoryInterface::findByUsername()[](#usage/users/user-repository/userrepositoryinterface-findbyusername)

The `findByUsername` method finds a user by their username.

###### Returns: `\Anomaly\UsersModule\User\Contract\UserInterface` or `null`

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

$username

</td>

<td>

true

</td>

<td>

string

</td>

<td>

none

</td>

<td>

The username of the user.

</td>

</tr>

</tbody>

</table>

###### Example

    $user = $repository->findByUsername('ryanthepyro');


##### UserRepositoryInterface::findByCredentials()[](#usage/users/user-repository/userrepositoryinterface-findbycredentials)

The `findByCredentials` method finds a user by their login field and password.

###### Returns: `\Anomaly\UsersModule\User\Contract\UserInterface` or `null`

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

The credentials array containing email/username and password.

</td>

</tr>

</tbody>

</table>

###### Example

    $user = $repository->findByCredentials(['email' => 'example@domain.com', 'password' => 'secret password']);


### Roles[](#usage/roles)

Roles are groups of users that define what the users has access to via role `permissions`. Roles can also be used as an inclusive test like i.e. "Does this user have the `foo` role?".


#### Role Fields[](#usage/roles/role-fields)

Below is a list of `fields` in the `roles` stream. Fields are accessed as attributes:

    $role->slug;

Same goes for decorated instances in Twig:

    {{ role.slug }}

###### Fields

<table class="table table-bordered table-striped">

<thead>

<tr>

<th>Key</th>

<th>Type</th>

<th>Description</th>

</tr>

</thead>

<tbody>

<tr>

<td>

name

</td>

<td>

text

</td>

<td>

The name of the role.

</td>

</tr>

<tr>

<td>

slug

</td>

<td>

slug

</td>

<td>

The slug used for API access.

</td>

</tr>

<tr>

<td>

description

</td>

<td>

textarea

</td>

<td>

A description for the role.

</td>

</tr>

<tr>

<td>

permissions

</td>

<td>

textarea

</td>

<td>

A serialized array of role permissions.

</td>

</tr>

</tbody>

</table>


#### Role Interface[](#usage/roles/role-interface)

This section will go over the features of the `\Anomaly\UsersModule\Role\Contract\RoleInterface` class.


##### RoleInterface::hasPermission()[](#usage/roles/role-interface/roleinterface-haspermission)

The `hasPermission` method verifies that the role has the `permission`.

###### Returns: `boolean`

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

$permission

</td>

<td>

true

</td>

<td>

string

</td>

<td>

none

</td>

<td>

The permission string.

</td>

</tr>

</tbody>

</table>

###### Example

    if ($role->hasPermission('vendor.module.example::example.test')) {
        // Do something
    }

###### Twig

    {% if role.hasPermission('vendor.module.example::example.test') %}
        {# Do something #}
    {% endif %}


##### RoleInterface::hasAnyPermission()[](#usage/roles/role-interface/roleinterface-hasanypermission)

The `hasAnyPermission` method verifies that the role has at least one of the given permissions.

###### Returns: `boolean`

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

$permissions

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

The array of permissions.

</td>

</tr>

</tbody>

</table>

###### Example

    $hasPermission = $role->hasAnyPermission(
        ['vendor.module.example::example.test', 'vendor.module.example::widget.example']
    );

    if ($hasPermission) {
        // Do something
    }

###### Twig

    {% set hasPermission = role.hasAnyPermission(
        ['vendor.module.example::example.test', 'vendor.module.example::widget.example']
    ) %}

    {% if hasPermission %}
        {# Do something #}
    {% endif %}


#### Role Repository[](#usage/roles/role-repository)

The `\Anomaly\UsersModule\Role\Contract\RoleRepositoryInterface` class helps you retrieve roles from the database.


##### RoleRepositoryInterface::allButAdmin()[](#usage/roles/role-repository/rolerepositoryinterface-allbutadmin)

The `allButAdmin` method returns all roles but the `admin` one.

###### Returns: `\Anomaly\UsersModule\Role\RoleCollection`

###### Example

    $roles = $repository->allButAdmin();


##### RoleRepositoryInterface::findBySlug()[](#usage/roles/role-repository/rolerepositoryinterface-findbyslug)

The `findBySlug` method returns a role by it's slug.

###### Returns: `\Anomaly\UsersModule\Role\Contract\RoleInterface` or `null`

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

$slug

</td>

<td>

true

</td>

<td>

string

</td>

<td>

none

</td>

<td>

The slug of the role.

</td>

</tr>

</tbody>

</table>

###### Example

    $guest = $repository->findBySlug('guest');


##### RoleRepositoryInterface::findByPermission()[](#usage/roles/role-repository/rolerepositoryinterface-findbypermission)

The `findByPermission` method returns all roles with the `permission`.

###### Returns: `\Anomaly\UsersModule\Role\RoleCollection`

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

$permission

</td>

<td>

true

</td>

<td>

string

</td>

<td>

none

</td>

<td>

The permission string.

</td>

</tr>

</tbody>

</table>

###### Example

    $roles = $repository->findByPermission('example.module.test::example.test');

    // Search for partial-match permissions.
    $roles = $repository->findByPermission('example.module.test::*');


##### RoleRepositoryInterface::updatePermissions()[](#usage/roles/role-repository/rolerepositoryinterface-updatepermissions)

The `updatePermissions` method updates the permissions for a role.

###### Returns: `\Anomaly\UsersModule\Role\Contract\RoleInterface`

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

$role

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

The role instance.

</td>

</tr>

<tr>

<td>

$permissions

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

The array of role permissions.

</td>

</tr>

</tbody>

</table>

###### Example

    $repository->updatePermissions(
        $role,
        [
            'example.module.test::example.test',
            'example.module.test::example.foo'
        ]
    );


### Plugin[](#usage/plugin)

This section will go over how to use the plugin that comes with the Users module.


#### user[](#usage/plugin/user)

The `user` function returns a decorated user instance from the identifier provided.

###### Returns: `\Anomaly\UsersModule\User\UserPresenter` or `null`

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

$identifier

</td>

<td>

false

</td>

<td>

mixed

</td>

<td>

Will return the active user.

</td>

<td>

The id, email, or username of the user to return.

</td>

</tr>

</tbody>

</table>

###### Twig

    Hello {{ user().display_name }}

    Sup {{ user('ryanthepyro').first_name }}


#### role[](#usage/plugin/role)

The `role` method returns a decorated role instance from the identifier provided.

###### Returns: `\Anomaly\UsersModule\Role\RolePresenter` or `null`

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

$identifier

</td>

<td>

true

</td>

<td>

mixed

</td>

<td>

none

</td>

<td>

The ID or slug of the role to return.

</td>

</tr>

</tbody>

</table>

###### Example

    {% if role('user').hasPermission('example.module.test::example.test') %}
        {# Do something #}
    {% endif %}
