# Users Module

*anomaly.module.users*

#### Manage users, roles, and permissions.

The Users Module provides comprehensive user management with role-based access control and flexible permission system.

## Features

- User management interface
- Role-based access control (RBAC)
- Fine-grained permissions
- User authentication
- Password management
- User profiles with custom fields
- Control panel integration
- User activation/suspension

## Usage

### Accessing User Data

```php
use Anomaly\UsersModule\User\Contract\UserRepositoryInterface;

$users = app(UserRepositoryInterface::class);

// Get user by ID
$user = $users->find(1);

// Get user by email
$user = $users->findByEmail('user@example.com');

// Get all users
$allUsers = $users->all();
```

### Checking Permissions

```php
// Check if user has permission
if (auth()->user()->hasPermission('posts.write')) {
    // User can write posts
}

// Check if user has role
if (auth()->user()->hasRole('admin')) {
    // User is admin
}
```

### In Twig

```twig
{# Check authentication #}
{% if auth_check() %}
    <p>Welcome, {{ auth_user().display_name }}!</p>
{% endif %}

{# Check permissions #}
{% if auth_user().hasPermission('posts.write') %}
    <a href="/posts/create">Create Post</a>
{% endif %}

{# Check roles #}
{% if auth_user().hasRole('admin') %}
    <a href="/admin">Admin Panel</a>
{% endif %}
```

### Creating Users

```php
$users->create([
    'email' => 'user@example.com',
    'username' => 'johndoe',
    'password' => 'secure_password',
    'display_name' => 'John Doe'
]);
```

## Requirements

- Streams Platform ^1.10
- PyroCMS 3.10+

## License

The Users Module is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
