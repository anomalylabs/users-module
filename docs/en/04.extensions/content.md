## Extensions[](#extensions)

This section will go over the addon extensions and how they work.


### Authenticators[](#extensions/authenticators)

Authenticators are responsible for authenticating credentials and login attempts.


#### Authenticator Extension[](#extensions/authenticators/authenticator-extension)

This section will go over the `\Anomaly\UsersModule\User\Authenticator\AuthenticatorExtension` class.


##### AuthenticatorExtension::authenticate()[](#extensions/authenticators/authenticator-extension/authenticatorextension-authenticate)

The `authenticate` method is responsible for authenticating the `credentials` and returning `null`, a `user`, or a `redirect`.

###### Returns: `\Anomaly\UsersModule\User\Contract\UserInterface` or `\Illuminate\Http\RedirectResponse` or `null`

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

The login information.

</td>

</tr>

</tbody>

</table>


#### Writing Authenticators[](#extensions/authenticators/writing-authenticators)

This section will show you how to write your own custom authenticator extension.


##### Creating the extension[](#extensions/authenticators/writing-authenticators/creating-the-extension)

The first thing we need to do is to use the `make:addon` command to create our extension:

    php artisan make:addon anomaly.extension.default_authenticator


##### Extending the authenticator extension[](#extensions/authenticators/writing-authenticators/extending-the-authenticator-extension)

The extension you create must extend the `\Anomaly\UsersModule\User\Authenticator\AuthenticatorExtension` class:

    <?php namespace Anomaly\DefaultAuthenticatorExtension;

    use Anomaly\DefaultAuthenticatorExtension\Command\AuthenticateCredentials;
    use Anomaly\UsersModule\User\Authenticator\AuthenticatorExtension;
    use Anomaly\UsersModule\User\Contract\UserInterface;

    class DefaultAuthenticatorExtension extends AuthenticatorExtension
    {

        /**
         * This extensions provides a basic
         * authenticator for the users module.
         *
         * @var string
         */
        protected $provides = 'anomaly.module.users::authenticator.default';

        /**
         * Authenticate a set of credentials.
         *
         * @param array $credentials
         * @return null|UserInterface
         */
        public function authenticate(array $credentials)
        {
            return $this->dispatch(new AuthenticateCredentials($credentials));
        }
    }

You must define the `provides` property as `anomaly.module.users::authenticator.your_widget_slug` so that it's picked up as a supported extension.


##### Authenticating credentials[](#extensions/authenticators/writing-authenticators/authenticating-credentials)

The primary task of any authenticators is to authenticate a login request. In this example we will use a command thats dispatched within the `authenticate` method to check the credentials:

    public function authenticate(array $credentials)
    {
        return $this->dispatch(new AuthenticateCredentials($credentials));
    }

Our `AuthenticateCredentials` command is responsible for the actual work:

    <?php namespace Anomaly\DefaultAuthenticatorExtension\Command;

    use Anomaly\UsersModule\User\Contract\UserRepositoryInterface;

    class AuthenticateCredentials
    {

        /**
         * The credentials to authenticate.
         *
         * @var array
         */
        protected $credentials;

        /**
         * Create a new AuthenticateCredentials instance.
         *
         * @param array $credentials
         */
        public function __construct(array $credentials)
        {
            $this->credentials = $credentials;
        }

        /**
         * Handle the command.
         *
         * @param  UserRepositoryInterface                               $users
         * @return \Anomaly\UsersModule\User\Contract\UserInterface|null
         */
        public function handle(UserRepositoryInterface $users)
        {
            if (!isset($this->credentials['password']) && !isset($this->credentials['email'])) {
                return null;
            }

            return $users->findByCredentials($this->credentials);
        }
    }


##### Redirecting authentication requests[](#extensions/authenticators/writing-authenticators/redirecting-authentication-requests)

The `authenticate` method can return an instance of the user, null, or a redirect instance. In the case a redirect is returns the request will be redirected immediately. After the redirect is made the authentication will be in your hands!


### Security Checks[](#extensions/security-checks)

Security checks are responsible for filtering login attempts and users. For example a security check could enforce that a certain criteria is met by the user. Or check that the login form is not being flooded.


#### Security Check Extension[](#extensions/security-checks/security-check-extension)

This section will go over the `\Anomaly\UsersModule\User\Security\Contract\SecurityCheckInterface` class.


##### SecurityCheckExtension::attempt()[](#extensions/security-checks/security-check-extension/securitycheckextension-attempt)

The `attempt` method is used to check security during a login attempt.

###### Returns: `\Illuminate\Http\RedirectResponse` or `true`


##### SecurityCheckExtension::check()[](#extensions/security-checks/security-check-extension/securitycheckextension-check)

The `check` method is run during each request against a user.

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

`UserInterface`

</td>

<td>

null

</td>

<td>

The user to check security for.

</td>

</tr>

</tbody>

</table>


#### Writing Security Checks[](#extensions/security-checks/writing-security-checks)

This section will show you how to write your own custom security check extension.


##### Creating the extension[](#extensions/security-checks/writing-security-checks/creating-the-extension)

The first thing we need to do is to use the `make:addon` command to create our extension:

    php artisan make:addon anomaly.extension.user_security_check


##### Extending the security check extension[](#extensions/security-checks/writing-security-checks/extending-the-security-check-extension)

The extension you create must extend the `\Anomaly\UsersModule\User\Security\SecurityCheckExtension` class:

    <?php namespace Anomaly\UserSecurityCheckExtension;

    use Anomaly\UserSecurityCheckExtension\Command\CheckUser;
    use Anomaly\UsersModule\User\Contract\UserInterface;
    use Anomaly\UsersModule\User\Security\SecurityCheckExtension;
    use Symfony\Component\HttpFoundation\Response;

    class UserSecurityCheckExtension extends SecurityCheckExtension
    {

        /**
         * This extension provides a security check that
         * assures the user is active, enabled, etc.
         *
         * @var null|string
         */
        protected $provides = 'anomaly.module.users::security_check.user';

        /**
         * Check an HTTP request.
         *
         * @param  UserInterface $user
         * @return bool|Response
         */
        public function check(UserInterface $user = null)
        {
            if (!$user) {
                return true;
            }

            return $this->dispatch(new CheckUser($user));
        }

    }

You must define the `provides` property as `anomaly.module.users::security_check.your_widget_slug` so that it's picked up as a supported extension.


##### Validating security[](#extensions/security-checks/writing-security-checks/validating-security)

The primary task of any security check is to validate a user. In this example we will use a command thats dispatched within the `check` method to check the user over and make sure they are valid and allowed:

    public function check(UserInterface $user = null)
    {
        if (!$user) {
            return true;
        }

        return $this->dispatch(new CheckUser($user));
    }

Our `CheckUser` command is responsible for the actual work:

    <?php namespace Anomaly\UserSecurityCheckExtension\Command;

    use Anomaly\Streams\Platform\Message\MessageBag;
    use Anomaly\UsersModule\User\Contract\UserInterface;
    use Anomaly\UsersModule\User\UserAuthenticator;
    use Illuminate\Routing\Redirector;

    class CheckUser
    {

        /**
         * The user instance.
         *
         * @var UserInterface
         */
        protected $user;

        /**
         * Create a new CheckUser instance.
         *
         * @param UserInterface $user
         */
        public function __construct(UserInterface $user)
        {
            $this->user = $user;
        }

        /**
         * @param  UserAuthenticator                      $authenticator
         * @param  MessageBag                             $message
         * @param  Redirector                             $redirect
         * @return bool|\Illuminate\Http\RedirectResponse
         */
        public function handle(UserAuthenticator $authenticator, MessageBag $message, Redirector $redirect)
        {
            if (!$this->user->isActivated()) {

                $message->error('Your account has not been activated.');

                $authenticator->logout(); // Just in case.

                return $redirect->back();
            }

            if (!$this->user->isEnabled()) {

                $message->error('Your account has been disabled.');

                $authenticator->logout(); // Just in case.

                return $redirect->back();
            }

            return true;
        }
    }
