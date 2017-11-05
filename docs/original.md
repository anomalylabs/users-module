<div class="col-lg-9">

                                                                    
    
    
        <div class="section">

            <h2>

                Introduction

                <a class="permalink" name="introduction" href="#introduction">
                    <i class="fa fa-link "></i>
                </a>

            </h2>

            	<p>The Users module provides easy to use and powerful user management , authentication, and authorization.</p>


        </div>

                    
    
    
        <div class="section">

            <h3>

                Features

                <a class="permalink" name="introduction/features" href="#introduction/features">
                    <i class="fa fa-link "></i>
                </a>

            </h3>

            	<p>The users module comes with everything you need for simple and advanced authentication and authorization needs.</p>
<ul>
<li>Registration</li>
<li>Authentication</li>
<li>Authorization</li>
<li>Password Reset</li>
<li>Login Throttling</li>
<li>Users &amp; Roles Management</li>
<li>Addon based permission system.</li>
<li>Multiple activation scenarios.</li>
<li>Extension-based Authentication</li>
<li>Extension-based Security</li>
<li>Configurable Login Fields</li>
<li>Integrated with Laravel's <code>Auth</code> service.</li>
<li>Interface Design (implementations your own as needed).</li>
</ul>


        </div>

        
    
        <div class="section">

            <h3>

                Installation

                <a class="permalink" name="introduction/installation" href="#introduction/installation">
                    <i class="fa fa-link "></i>
                </a>

            </h3>

            	<p>You can install the Users module with the <code>addon:install</code> command:</p>
<pre class=" language-php"><code class=" language-php">php artisan addon<span class="token punctuation">:</span>install anomaly<span class="token punctuation">.</span>module<span class="token punctuation">.</span>users</code></pre>
<div class="alert alert-warning">
<strong>Notice:</strong> The Users module comes installed with PyroCMS out of the box.
</div>


        </div>

        
    
        <div class="section">

            <h3>

                Configuration

                <a class="permalink" name="introduction/configuration" href="#introduction/configuration">
                    <i class="fa fa-link "></i>
                </a>

            </h3>

            	<p>You can override Users module configuration by publishing the addon and modifying the resulting configuration file:</p>
<pre class=" language-php"><code class=" language-php">php artisan addon<span class="token punctuation">:</span>publish anomaly<span class="token punctuation">.</span>module<span class="token punctuation">.</span>users</code></pre>
<p>The addon will be published to <code>/resources/{application}/addons/anomaly/users-module</code>.</p>


        </div>

                    
    
    
        <div class="section">

            <h4>

                Login Field

                <a class="permalink" name="introduction/configuration/login-field" href="#introduction/configuration/login-field">
                    <i class="fa fa-link "></i>
                </a>

            </h4>

            	<p>The <code>anomaly.module.users::config.login</code> value determines which field is used for logging in along with the password. Valid options are <code>email</code> (default) or <code>username</code>.</p>
<pre class=" language-php"><code class=" language-php"><span class="token string">'login'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token function">env</span><span class="token punctuation">(</span><span class="token string">'LOGIN'</span><span class="token punctuation">,</span> <span class="token string">'email'</span><span class="token punctuation">)</span><span class="token punctuation">,</span></code></pre>
<p>You can also use the <code>.env</code> file to set this value with <code>LOGIN</code>.</p>


        </div>

        
    
        <div class="section">

            <h4>

                Activation Mode

                <a class="permalink" name="introduction/configuration/activation-mode" href="#introduction/configuration/activation-mode">
                    <i class="fa fa-link "></i>
                </a>

            </h4>

            	<p>The <code>anomaly.module.users::config.activation_mode</code> value determines how users are activated when they register. A user must be activated in order to login.</p>
<pre class=" language-php"><code class=" language-php"><span class="token string">'activation_mode'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token function">env</span><span class="token punctuation">(</span><span class="token string">'ACTIVATION_MODE'</span><span class="token punctuation">,</span> <span class="token string">'email'</span><span class="token punctuation">)</span><span class="token punctuation">,</span></code></pre>
<p>Valid options are:</p>
<ul>
<li><code>email</code> - Send an activation email to the user. This is the default mode.</li>
<li><code>manual</code> - Require an admin to manually activate the user.</li>
<li><code>automatic</code> - Automatically activate the user when they register.</li>
</ul>


        </div>

        
    
        
    
        
    
        <div class="section">

            <h2>

                Usage

                <a class="permalink" name="usage" href="#usage">
                    <i class="fa fa-link "></i>
                </a>

            </h2>

            	<p>This section will show you how to use the addon via API and in the view layer.</p>


        </div>

                    
    
    
        <div class="section">

            <h3>

                Users

                <a class="permalink" name="usage/users" href="#usage/users">
                    <i class="fa fa-link "></i>
                </a>

            </h3>

            	<p>Users are extensible stream entries that can be associated with multiples <code>roles</code>. Users have their own <code>permissions</code> that merge with those inherited from the <code>roles</code> they belong to.</p>


        </div>

                    
    
    
        <div class="section">

            <h4>

                User Fields

                <a class="permalink" name="usage/users/user-fields" href="#usage/users/user-fields">
                    <i class="fa fa-link "></i>
                </a>

            </h4>

            <p>Below is a list of <code>fields</code> in the <code>users</code> stream. Fields are accessed as attributes:</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">email</span><span class="token punctuation">;</span></code></pre>
<p>Same goes for decorated instances in Twig:</p>
<pre class=" language-php"><code class=" language-php"><span class="token punctuation">{</span><span class="token punctuation">{</span> user<span class="token punctuation">.</span>email <span class="token punctuation">}</span><span class="token punctuation">}</span></code></pre>


    <h6>Fields</h6>

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
                                    <td><p>email</p></td>
                                    <td><p>email</p></td>
                                    <td><p>The login email address.</p></td>
                            </tr>
                    <tr>
                                    <td><p>username</p></td>
                                    <td><p>text</p></td>
                                    <td><p>The login username.</p></td>
                            </tr>
                    <tr>
                                    <td><p>password</p></td>
                                    <td><p>text</p></td>
                                    <td><p>The hashed login password.</p></td>
                            </tr>
                    <tr>
                                    <td><p>roles</p></td>
                                    <td><p>multiple relationship</p></td>
                                    <td><p>The roles the user has.</p></td>
                            </tr>
                    <tr>
                                    <td><p>display_name</p></td>
                                    <td><p>text</p></td>
                                    <td><p>The publicly displayable name.</p></td>
                            </tr>
                    <tr>
                                    <td><p>first_name</p></td>
                                    <td><p>text</p></td>
                                    <td><p>The real first name.</p></td>
                            </tr>
                    <tr>
                                    <td><p>last_name</p></td>
                                    <td><p>text</p></td>
                                    <td><p>The real last name.</p></td>
                            </tr>
                    <tr>
                                    <td><p>permissions</p></td>
                                    <td><p>textarea</p></td>
                                    <td><p>The serialized user permission array.</p></td>
                            </tr>
                    <tr>
                                    <td><p>last_login_at</p></td>
                                    <td><p>datetime</p></td>
                                    <td><p>The last login datetime.</p></td>
                            </tr>
                    <tr>
                                    <td><p>last_activity_at</p></td>
                                    <td><p>text</p></td>
                                    <td><p>The datetime for the last action made by the user.</p></td>
                            </tr>
                    <tr>
                                    <td><p>ip_address</p></td>
                                    <td><p>text</p></td>
                                    <td><p>The last IP address that accessed the user account.</p></td>
                            </tr>
                </tbody>
    </table>


        </div>

                    
    
    
        <div class="section">

            <h5>

                Custom User Fields

                <a class="permalink" name="usage/users/user-fields/custom-user-fields" href="#usage/users/user-fields/custom-user-fields">
                    <i class="fa fa-link "></i>
                </a>

            </h5>

            	<p>Custom user fields assigned through the control panel are assigned directly to the <code>users</code> stream and can be accessed directly from the user object.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">favorite_color</span><span class="token punctuation">;</span></code></pre>
<p>And in Twig:</p>
<pre class=" language-php"><code class=" language-php"><span class="token punctuation">{</span><span class="token punctuation">{</span> user<span class="token punctuation">.</span>favorite_color <span class="token punctuation">}</span><span class="token punctuation">}</span></code></pre>


        </div>

        
    
        
    
        <div class="section">

            <h4>

                User Interface

                <a class="permalink" name="usage/users/user-interface" href="#usage/users/user-interface">
                    <i class="fa fa-link "></i>
                </a>

            </h4>

            	<p>This section will go over the features of the <code>\Anomaly\UsersModule\User\Contract\UserInterface</code> class.</p>


        </div>

                    
    
    
        <div class="section">

            <h5>

                UserInterface::hasRole()

                <a class="permalink" name="usage/users/user-interface/userinterface-hasrole" href="#usage/users/user-interface/userinterface-hasrole">
                    <i class="fa fa-link "></i>
                </a>

            </h5>

            <p>The <code>hasRole</code> method ensures that the user has the given <code>role</code>.</p>

    <h6>Returns: 
        <code>boolean</code>
    </h6>


    <h6>Arguments</h6>

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
                                    <td><p>$role</p></td>
                                    <td><p>true</p></td>
                                    <td><p>string</p></td>
                                    <td><p>none</p></td>
                                    <td><p>The role ID, slug, or interface.</p></td>
                            </tr>
                </tbody>
    </table>

    <h6>Example</h6>

    <pre class=" language-php"><code class=" language-php"><span class="token keyword">if</span> <span class="token punctuation">(</span><span class="token function">auth</span><span class="token punctuation">(</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">user</span><span class="token punctuation">(</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">hasRole</span><span class="token punctuation">(</span><span class="token string">'admin'</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
    <span class="token keyword">echo</span> <span class="token string">"User is an admin!"</span><span class="token punctuation">;</span>
<span class="token punctuation">}</span></code></pre>

    <h6>Twig</h6>

    <pre class=" language-php"><code class=" language-php"><span class="token punctuation">{</span><span class="token operator">%</span> <span class="token keyword">if</span> <span class="token function">auth_user</span><span class="token punctuation">(</span><span class="token punctuation">)</span><span class="token punctuation">.</span><span class="token function">hasRole</span><span class="token punctuation">(</span><span class="token string">'admin'</span><span class="token punctuation">)</span> <span class="token operator">%</span><span class="token punctuation">}</span>
    User is an admin<span class="token operator">!</span>
<span class="token punctuation">{</span><span class="token operator">%</span> <span class="token keyword">endif</span> <span class="token operator">%</span><span class="token punctuation">}</span></code></pre>



        </div>

        
    
        <div class="section">

            <h5>

                UserInterface::hasAnyRole()

                <a class="permalink" name="usage/users/user-interface/userinterface-hasanyrole" href="#usage/users/user-interface/userinterface-hasanyrole">
                    <i class="fa fa-link "></i>
                </a>

            </h5>

            <p>The <code>hasAnyRole</code> method ensures that the user has at least one of the provided roles.</p>

    <h6>Returns: 
        <code>boolean</code>
    </h6>


    <h6>Arguments</h6>

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
                                    <td><p>$roles</p></td>
                                    <td><p>true</p></td>
                                    <td><p>mixed</p></td>
                                    <td><p>none</p></td>
                                    <td><p>An array of role IDs or slugs. A collection of roles can also be passed.</p></td>
                            </tr>
                </tbody>
    </table>

    <h6>Example</h6>

    <pre class=" language-php"><code class=" language-php"><span class="token keyword">if</span> <span class="token punctuation">(</span><span class="token function">auth</span><span class="token punctuation">(</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">user</span><span class="token punctuation">(</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">hasAnyRole</span><span class="token punctuation">(</span><span class="token punctuation">[</span><span class="token string">'admin'</span><span class="token punctuation">,</span> <span class="token string">'manager'</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
    <span class="token keyword">echo</span> <span class="token string">'Hello '</span> <span class="token punctuation">.</span> <span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">display_name</span><span class="token punctuation">;</span>
<span class="token punctuation">}</span></code></pre>

    <h6>Twig</h6>

    <pre class=" language-php"><code class=" language-php"><span class="token punctuation">{</span><span class="token operator">%</span> <span class="token keyword">if</span> <span class="token function">auth</span><span class="token punctuation">(</span><span class="token punctuation">)</span><span class="token punctuation">.</span><span class="token function">user</span><span class="token punctuation">(</span><span class="token punctuation">)</span><span class="token punctuation">.</span><span class="token function">hasAnyRole</span><span class="token punctuation">(</span><span class="token punctuation">[</span><span class="token string">'admin'</span><span class="token punctuation">,</span> <span class="token string">'manager'</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">)</span> <span class="token operator">%</span><span class="token punctuation">}</span>
    Hello <span class="token punctuation">{</span><span class="token punctuation">{</span> <span class="token function">auth_user</span><span class="token punctuation">(</span><span class="token punctuation">)</span><span class="token punctuation">.</span>display_name <span class="token punctuation">}</span><span class="token punctuation">}</span>
<span class="token punctuation">{</span><span class="token operator">%</span> <span class="token keyword">endif</span> <span class="token operator">%</span><span class="token punctuation">}</span></code></pre>



        </div>

        
    
        <div class="section">

            <h5>

                UserInterface::isAdmin()

                <a class="permalink" name="usage/users/user-interface/userinterface-isadmin" href="#usage/users/user-interface/userinterface-isadmin">
                    <i class="fa fa-link "></i>
                </a>

            </h5>

            <p>The <code>isAdmin</code> method returns if the user has the <code>admin</code> role or not.</p>

    <h6>Returns: 
        <code>boolean</code>
    </h6>



    <h6>Example</h6>

    <pre class=" language-php"><code class=" language-php"><span class="token keyword">if</span> <span class="token punctuation">(</span><span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">isAdmin</span><span class="token punctuation">(</span><span class="token punctuation">)</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
    <span class="token keyword">echo</span> <span class="token string">"Hi Admin."</span><span class="token punctuation">;</span>
<span class="token punctuation">}</span></code></pre>

    <h6>Twig</h6>

    <pre class=" language-php"><code class=" language-php">Hello <span class="token punctuation">{</span><span class="token punctuation">{</span> <span class="token function">auth_user</span><span class="token punctuation">(</span><span class="token punctuation">)</span><span class="token punctuation">.</span><span class="token function">isAdmin</span><span class="token punctuation">(</span><span class="token punctuation">)</span> <span class="token operator">?</span> <span class="token string">'admin'</span> <span class="token punctuation">:</span> <span class="token string">'user'</span> <span class="token punctuation">}</span><span class="token punctuation">}</span></code></pre>



        </div>

        
    
        <div class="section">

            <h5>

                UserInterface::hasPermission()

                <a class="permalink" name="usage/users/user-interface/userinterface-haspermission" href="#usage/users/user-interface/userinterface-haspermission">
                    <i class="fa fa-link "></i>
                </a>

            </h5>

            <p>The <code>hasPermission</code> method verifies that the user has the <code>permission</code>.</p>

    <h6>Returns: 
        <code>boolean</code>
    </h6>


    <h6>Arguments</h6>

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
                                    <td><p>$permission</p></td>
                                    <td><p>true</p></td>
                                    <td><p>string</p></td>
                                    <td><p>none</p></td>
                                    <td><p>The permission string.</p></td>
                            </tr>
                    <tr>
                                    <td><p>$checkRoles</p></td>
                                    <td><p>false</p></td>
                                    <td><p>boolean</p></td>
                                    <td><p>true</p></td>
                                    <td><p>Check the users roles for the permission too.</p></td>
                            </tr>
                </tbody>
    </table>

    <h6>Example</h6>

    <pre class=" language-php"><code class=" language-php"><span class="token keyword">if</span> <span class="token punctuation">(</span><span class="token function">auth</span><span class="token punctuation">(</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">user</span><span class="token punctuation">(</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">hasPermission</span><span class="token punctuation">(</span><span class="token string">'vendor.module.example::example.test'</span><span class="token punctuation">)</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
    <span class="token comment" spellcheck="true">// So something</span>
<span class="token punctuation">}</span></code></pre>

    <h6>Twig</h6>

    <pre class=" language-php"><code class=" language-php"><span class="token punctuation">{</span><span class="token operator">%</span> <span class="token keyword">if</span> <span class="token function">auth_user</span><span class="token punctuation">(</span><span class="token punctuation">)</span><span class="token punctuation">.</span><span class="token function">hasPermission</span><span class="token punctuation">(</span><span class="token string">'vendor.module.example::example.test'</span><span class="token punctuation">)</span><span class="token punctuation">)</span> <span class="token operator">%</span><span class="token punctuation">}</span>
    <span class="token punctuation">{</span><span class="token shell-comment comment"># So something #}</span>
<span class="token punctuation">{</span><span class="token operator">%</span> <span class="token keyword">endif</span> <span class="token operator">%</span><span class="token punctuation">}</span></code></pre>



        </div>

        
    
        <div class="section">

            <h5>

                UserInterface::hasAnyPermission()

                <a class="permalink" name="usage/users/user-interface/userinterface-hasanypermission" href="#usage/users/user-interface/userinterface-hasanypermission">
                    <i class="fa fa-link "></i>
                </a>

            </h5>

            <p>The <code>hasAnyPermission</code> method verifies that the user has at least one of the given permissions.</p>

    <h6>Returns: 
        <code>boolean</code>
    </h6>


    <h6>Arguments</h6>

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
                                    <td><p>$permissions</p></td>
                                    <td><p>true</p></td>
                                    <td><p>array</p></td>
                                    <td><p>none</p></td>
                                    <td><p>The array of permissions.</p></td>
                            </tr>
                    <tr>
                                    <td><p>$checkRoles</p></td>
                                    <td><p>false</p></td>
                                    <td><p>boolean</p></td>
                                    <td><p>true</p></td>
                                    <td><p>Check the users roles for the permission too.</p></td>
                            </tr>
                </tbody>
    </table>

    <h6>Example</h6>

    <pre class=" language-php"><code class=" language-php"><span class="token variable">$hasPermission</span> <span class="token operator">=</span> <span class="token function">auth</span><span class="token punctuation">(</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">user</span><span class="token punctuation">(</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">hasAnyPermission</span><span class="token punctuation">(</span>
    <span class="token punctuation">[</span><span class="token string">'vendor.module.example::example.test'</span><span class="token punctuation">,</span> <span class="token string">'vendor.module.example::widget.example'</span><span class="token punctuation">]</span>
<span class="token punctuation">)</span><span class="token punctuation">;</span>

<span class="token keyword">if</span> <span class="token punctuation">(</span><span class="token variable">$hasPermission</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
    <span class="token comment" spellcheck="true">// Do something</span>
<span class="token punctuation">}</span></code></pre>

    <h6>Twig</h6>

    <pre class=" language-php"><code class=" language-php"><span class="token punctuation">{</span><span class="token operator">%</span> set hasPermission <span class="token operator">=</span> <span class="token function">auth_user</span><span class="token punctuation">(</span><span class="token punctuation">)</span><span class="token punctuation">.</span><span class="token function">hasAnyPermission</span><span class="token punctuation">(</span>
    <span class="token punctuation">[</span><span class="token string">'vendor.module.example::example.test'</span><span class="token punctuation">,</span> <span class="token string">'vendor.module.example::widget.example'</span><span class="token punctuation">]</span>
<span class="token punctuation">)</span> <span class="token operator">%</span><span class="token punctuation">}</span>

<span class="token punctuation">{</span><span class="token operator">%</span> <span class="token keyword">if</span> hasPermission <span class="token operator">%</span><span class="token punctuation">}</span>
    <span class="token punctuation">{</span><span class="token shell-comment comment"># Do something #}</span>
<span class="token punctuation">{</span><span class="token operator">%</span> <span class="token keyword">endif</span> <span class="token operator">%</span><span class="token punctuation">}</span></code></pre>



        </div>

        
    
        
    
        <div class="section">

            <h4>

                User Presenter

                <a class="permalink" name="usage/users/user-presenter" href="#usage/users/user-presenter">
                    <i class="fa fa-link "></i>
                </a>

            </h4>

            	<p>This section will go over the <code>\Anomaly\UsersModule\User\UserPresenter</code> class that's returned in the view layer.</p>


        </div>

                    
    
    
        <div class="section">

            <h5>

                UserPresenter::name()

                <a class="permalink" name="usage/users/user-presenter/userpresenter-name" href="#usage/users/user-presenter/userpresenter-name">
                    <i class="fa fa-link "></i>
                </a>

            </h5>

            <p>The <code>name</code> method returns the concatenated first and last name.</p>

    <h6>Returns: 
        <code>string</code>
    </h6>



    <h6>Example</h6>

    <pre class=" language-php"><code class=" language-php"><span class="token variable">$decorated</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">name</span><span class="token punctuation">(</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>

    <h6>Twig</h6>

    <pre class=" language-php"><code class=" language-php">Hi <span class="token punctuation">{</span><span class="token punctuation">{</span> <span class="token function">user</span><span class="token punctuation">(</span><span class="token punctuation">)</span><span class="token punctuation">.</span><span class="token function">name</span><span class="token punctuation">(</span><span class="token punctuation">)</span> <span class="token punctuation">}</span><span class="token punctuation">}</span></code></pre>



        </div>

        
    
        <div class="section">

            <h5>

                UserPresenter::gravatar()

                <a class="permalink" name="usage/users/user-presenter/userpresenter-gravatar" href="#usage/users/user-presenter/userpresenter-gravatar">
                    <i class="fa fa-link "></i>
                </a>

            </h5>

            <p>The <code>gravatar</code> method returns a Gravatar image URL for the user.</p>

    <h6>Returns: 
        <code>string</code>
    </h6>


    <h6>Arguments</h6>

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
                                    <td><p>$parameters</p></td>
                                    <td><p>true</p></td>
                                    <td><p>array</p></td>
                                    <td><p>none</p></td>
                                    <td><p>Gravatar URL parameters.</p></td>
                            </tr>
                </tbody>
    </table>

    <h6>Example</h6>

    <pre class=" language-php"><code class=" language-php"><span class="token variable">$decorated</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">avatar</span><span class="token punctuation">(</span><span class="token punctuation">[</span><span class="token string">'d'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'mm'</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>

    <h6>Twig</h6>

    <pre class=" language-php"><code class=" language-php"><span class="token punctuation">{</span><span class="token punctuation">{</span> <span class="token function">img</span><span class="token punctuation">(</span><span class="token function">user</span><span class="token punctuation">(</span><span class="token punctuation">)</span><span class="token punctuation">.</span><span class="token function">gravatar</span><span class="token punctuation">(</span><span class="token punctuation">{</span><span class="token string">'d'</span><span class="token punctuation">:</span> <span class="token string">'mm'</span><span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">)</span><span class="token punctuation">.</span><span class="token keyword">class</span><span class="token punctuation">(</span><span class="token string">'img-rounded'</span><span class="token punctuation">)</span><span class="token operator">|</span>raw <span class="token punctuation">}</span><span class="token punctuation">}</span></code></pre>



        </div>

        
    
        
    
        <div class="section">

            <h4>

                User Repository

                <a class="permalink" name="usage/users/user-repository" href="#usage/users/user-repository">
                    <i class="fa fa-link "></i>
                </a>

            </h4>

            	<p>The <code>\Anomaly\UsersModule\User\Contract\UserRepositoryInterface</code> class helps you retrieve users from the database.</p>


        </div>

                    
    
    
        <div class="section">

            <h5>

                UserRepositoryInterface::findByEmail()

                <a class="permalink" name="usage/users/user-repository/userrepositoryinterface-findbyemail" href="#usage/users/user-repository/userrepositoryinterface-findbyemail">
                    <i class="fa fa-link "></i>
                </a>

            </h5>

            <p>The <code>findByEmail</code> method finds a user by their email.</p>

    <h6>Returns: 
        <code>\Anomaly\UsersModule\User\Contract\UserInterface</code> or <code>null</code>
    </h6>


    <h6>Arguments</h6>

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
                                    <td><p>$email</p></td>
                                    <td><p>true</p></td>
                                    <td><p>string</p></td>
                                    <td><p>none</p></td>
                                    <td><p>The users email.</p></td>
                            </tr>
                </tbody>
    </table>

    <h6>Example</h6>

    <pre class=" language-php"><code class=" language-php"><span class="token variable">$user</span> <span class="token operator">=</span> <span class="token variable">$repository</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">findByEmail</span><span class="token punctuation">(</span><span class="token string">'example@domain.com'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>




        </div>

        
    
        <div class="section">

            <h5>

                UserRepositoryInterface::findByUsername()

                <a class="permalink" name="usage/users/user-repository/userrepositoryinterface-findbyusername" href="#usage/users/user-repository/userrepositoryinterface-findbyusername">
                    <i class="fa fa-link "></i>
                </a>

            </h5>

            <p>The <code>findByUsername</code> method finds a user by their username.</p>

    <h6>Returns: 
        <code>\Anomaly\UsersModule\User\Contract\UserInterface</code> or <code>null</code>
    </h6>


    <h6>Arguments</h6>

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
                                    <td><p>$username</p></td>
                                    <td><p>true</p></td>
                                    <td><p>string</p></td>
                                    <td><p>none</p></td>
                                    <td><p>The username of the user.</p></td>
                            </tr>
                </tbody>
    </table>

    <h6>Example</h6>

    <pre class=" language-php"><code class=" language-php"><span class="token variable">$user</span> <span class="token operator">=</span> <span class="token variable">$repository</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">findByUsername</span><span class="token punctuation">(</span><span class="token string">'ryanthepyro'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>




        </div>

        
    
        <div class="section">

            <h5>

                UserRepositoryInterface::findByCredentials()

                <a class="permalink" name="usage/users/user-repository/userrepositoryinterface-findbycredentials" href="#usage/users/user-repository/userrepositoryinterface-findbycredentials">
                    <i class="fa fa-link "></i>
                </a>

            </h5>

            <p>The <code>findByCredentials</code> method finds a user by their login field and password.</p>

    <h6>Returns: 
        <code>\Anomaly\UsersModule\User\Contract\UserInterface</code> or <code>null</code>
    </h6>


    <h6>Arguments</h6>

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
                                    <td><p>$credentials</p></td>
                                    <td><p>true</p></td>
                                    <td><p>array</p></td>
                                    <td><p>none</p></td>
                                    <td><p>The credentials array containing email/username and password.</p></td>
                            </tr>
                </tbody>
    </table>

    <h6>Example</h6>

    <pre class=" language-php"><code class=" language-php"><span class="token variable">$user</span> <span class="token operator">=</span> <span class="token variable">$repository</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">findByCredentials</span><span class="token punctuation">(</span><span class="token punctuation">[</span><span class="token string">'email'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'example@domain.com'</span><span class="token punctuation">,</span> <span class="token string">'password'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'secret password'</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>




        </div>

        
    
        
    
        
    
        <div class="section">

            <h3>

                Roles

                <a class="permalink" name="usage/roles" href="#usage/roles">
                    <i class="fa fa-link "></i>
                </a>

            </h3>

            	<p>Roles are groups of users that define what the users has access to via role <code>permissions</code>. Roles can also be used as an inclusive test like i.e. "Does this user have the <code>foo</code> role?".</p>


        </div>

                    
    
    
        <div class="section">

            <h4>

                Role Fields

                <a class="permalink" name="usage/roles/role-fields" href="#usage/roles/role-fields">
                    <i class="fa fa-link "></i>
                </a>

            </h4>

            <p>Below is a list of <code>fields</code> in the <code>roles</code> stream. Fields are accessed as attributes:</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$role</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">slug</span><span class="token punctuation">;</span></code></pre>
<p>Same goes for decorated instances in Twig:</p>
<pre class=" language-php"><code class=" language-php"><span class="token punctuation">{</span><span class="token punctuation">{</span> role<span class="token punctuation">.</span>slug <span class="token punctuation">}</span><span class="token punctuation">}</span></code></pre>


    <h6>Fields</h6>

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
                                    <td><p>name</p></td>
                                    <td><p>text</p></td>
                                    <td><p>The name of the role.</p></td>
                            </tr>
                    <tr>
                                    <td><p>slug</p></td>
                                    <td><p>slug</p></td>
                                    <td><p>The slug used for API access.</p></td>
                            </tr>
                    <tr>
                                    <td><p>description</p></td>
                                    <td><p>textarea</p></td>
                                    <td><p>A description for the role.</p></td>
                            </tr>
                    <tr>
                                    <td><p>permissions</p></td>
                                    <td><p>textarea</p></td>
                                    <td><p>A serialized array of role permissions.</p></td>
                            </tr>
                </tbody>
    </table>


        </div>

        
    
        <div class="section">

            <h4>

                Role Interface

                <a class="permalink" name="usage/roles/role-interface" href="#usage/roles/role-interface">
                    <i class="fa fa-link "></i>
                </a>

            </h4>

            	<p>This section will go over the features of the <code>\Anomaly\UsersModule\Role\Contract\RoleInterface</code> class.</p>


        </div>

                    
    
    
        <div class="section">

            <h5>

                RoleInterface::hasPermission()

                <a class="permalink" name="usage/roles/role-interface/roleinterface-haspermission" href="#usage/roles/role-interface/roleinterface-haspermission">
                    <i class="fa fa-link "></i>
                </a>

            </h5>

            <p>The <code>hasPermission</code> method verifies that the role has the <code>permission</code>.</p>

    <h6>Returns: 
        <code>boolean</code>
    </h6>


    <h6>Arguments</h6>

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
                                    <td><p>$permission</p></td>
                                    <td><p>true</p></td>
                                    <td><p>string</p></td>
                                    <td><p>none</p></td>
                                    <td><p>The permission string.</p></td>
                            </tr>
                </tbody>
    </table>

    <h6>Example</h6>

    <pre class=" language-php"><code class=" language-php"><span class="token keyword">if</span> <span class="token punctuation">(</span><span class="token variable">$role</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">hasPermission</span><span class="token punctuation">(</span><span class="token string">'vendor.module.example::example.test'</span><span class="token punctuation">)</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
    <span class="token comment" spellcheck="true">// Do something</span>
<span class="token punctuation">}</span></code></pre>

    <h6>Twig</h6>

    <pre class=" language-php"><code class=" language-php"><span class="token punctuation">{</span><span class="token operator">%</span> <span class="token keyword">if</span> role<span class="token punctuation">.</span><span class="token function">hasPermission</span><span class="token punctuation">(</span><span class="token string">'vendor.module.example::example.test'</span><span class="token punctuation">)</span> <span class="token operator">%</span><span class="token punctuation">}</span>
    <span class="token punctuation">{</span><span class="token shell-comment comment"># Do something #}</span>
<span class="token punctuation">{</span><span class="token operator">%</span> <span class="token keyword">endif</span> <span class="token operator">%</span><span class="token punctuation">}</span></code></pre>



        </div>

        
    
        <div class="section">

            <h5>

                RoleInterface::hasAnyPermission()

                <a class="permalink" name="usage/roles/role-interface/roleinterface-hasanypermission" href="#usage/roles/role-interface/roleinterface-hasanypermission">
                    <i class="fa fa-link "></i>
                </a>

            </h5>

            <p>The <code>hasAnyPermission</code> method verifies that the role has at least one of the given permissions.</p>

    <h6>Returns: 
        <code>boolean</code>
    </h6>


    <h6>Arguments</h6>

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
                                    <td><p>$permissions</p></td>
                                    <td><p>true</p></td>
                                    <td><p>array</p></td>
                                    <td><p>none</p></td>
                                    <td><p>The array of permissions.</p></td>
                            </tr>
                </tbody>
    </table>

    <h6>Example</h6>

    <pre class=" language-php"><code class=" language-php"><span class="token variable">$hasPermission</span> <span class="token operator">=</span> <span class="token variable">$role</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">hasAnyPermission</span><span class="token punctuation">(</span>
    <span class="token punctuation">[</span><span class="token string">'vendor.module.example::example.test'</span><span class="token punctuation">,</span> <span class="token string">'vendor.module.example::widget.example'</span><span class="token punctuation">]</span>
<span class="token punctuation">)</span><span class="token punctuation">;</span>

<span class="token keyword">if</span> <span class="token punctuation">(</span><span class="token variable">$hasPermission</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
    <span class="token comment" spellcheck="true">// Do something</span>
<span class="token punctuation">}</span></code></pre>

    <h6>Twig</h6>

    <pre class=" language-php"><code class=" language-php"><span class="token punctuation">{</span><span class="token operator">%</span> set hasPermission <span class="token operator">=</span> role<span class="token punctuation">.</span><span class="token function">hasAnyPermission</span><span class="token punctuation">(</span>
    <span class="token punctuation">[</span><span class="token string">'vendor.module.example::example.test'</span><span class="token punctuation">,</span> <span class="token string">'vendor.module.example::widget.example'</span><span class="token punctuation">]</span>
<span class="token punctuation">)</span> <span class="token operator">%</span><span class="token punctuation">}</span>

<span class="token punctuation">{</span><span class="token operator">%</span> <span class="token keyword">if</span> hasPermission <span class="token operator">%</span><span class="token punctuation">}</span>
    <span class="token punctuation">{</span><span class="token shell-comment comment"># Do something #}</span>
<span class="token punctuation">{</span><span class="token operator">%</span> <span class="token keyword">endif</span> <span class="token operator">%</span><span class="token punctuation">}</span></code></pre>



        </div>

        
    
        
    
        <div class="section">

            <h4>

                Role Repository

                <a class="permalink" name="usage/roles/role-repository" href="#usage/roles/role-repository">
                    <i class="fa fa-link "></i>
                </a>

            </h4>

            	<p>The <code>\Anomaly\UsersModule\Role\Contract\RoleRepositoryInterface</code> class helps you retrieve roles from the database.</p>


        </div>

                    
    
    
        <div class="section">

            <h5>

                RoleRepositoryInterface::allButAdmin()

                <a class="permalink" name="usage/roles/role-repository/rolerepositoryinterface-allbutadmin" href="#usage/roles/role-repository/rolerepositoryinterface-allbutadmin">
                    <i class="fa fa-link "></i>
                </a>

            </h5>

            <p>The <code>allButAdmin</code> method returns all roles but the <code>admin</code> one.</p>

    <h6>Returns: 
        <code>\Anomaly\UsersModule\Role\RoleCollection</code>
    </h6>



    <h6>Example</h6>

    <pre class=" language-php"><code class=" language-php"><span class="token variable">$roles</span> <span class="token operator">=</span> <span class="token variable">$repository</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">allButAdmin</span><span class="token punctuation">(</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>




        </div>

        
    
        <div class="section">

            <h5>

                RoleRepositoryInterface::findBySlug()

                <a class="permalink" name="usage/roles/role-repository/rolerepositoryinterface-findbyslug" href="#usage/roles/role-repository/rolerepositoryinterface-findbyslug">
                    <i class="fa fa-link "></i>
                </a>

            </h5>

            <p>The <code>findBySlug</code> method returns a role by it's slug.</p>

    <h6>Returns: 
        <code>\Anomaly\UsersModule\Role\Contract\RoleInterface</code> or <code>null</code>
    </h6>


    <h6>Arguments</h6>

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
                                    <td><p>$slug</p></td>
                                    <td><p>true</p></td>
                                    <td><p>string</p></td>
                                    <td><p>none</p></td>
                                    <td><p>The slug of the role.</p></td>
                            </tr>
                </tbody>
    </table>

    <h6>Example</h6>

    <pre class=" language-php"><code class=" language-php"><span class="token variable">$guest</span> <span class="token operator">=</span> <span class="token variable">$repository</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">findBySlug</span><span class="token punctuation">(</span><span class="token string">'guest'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>




        </div>

        
    
        <div class="section">

            <h5>

                RoleRepositoryInterface::findByPermission()

                <a class="permalink" name="usage/roles/role-repository/rolerepositoryinterface-findbypermission" href="#usage/roles/role-repository/rolerepositoryinterface-findbypermission">
                    <i class="fa fa-link "></i>
                </a>

            </h5>

            <p>The <code>findByPermission</code> method returns all roles with the <code>permission</code>.</p>

    <h6>Returns: 
        <code>\Anomaly\UsersModule\Role\RoleCollection</code>
    </h6>


    <h6>Arguments</h6>

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
                                    <td><p>$permission</p></td>
                                    <td><p>true</p></td>
                                    <td><p>string</p></td>
                                    <td><p>none</p></td>
                                    <td><p>The permission string.</p></td>
                            </tr>
                </tbody>
    </table>

    <h6>Example</h6>

    <pre class=" language-php"><code class=" language-php"><span class="token variable">$roles</span> <span class="token operator">=</span> <span class="token variable">$repository</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">findByPermission</span><span class="token punctuation">(</span><span class="token string">'example.module.test::example.test'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

<span class="token comment" spellcheck="true">// Search for partial-match permissions.</span>
<span class="token variable">$roles</span> <span class="token operator">=</span> <span class="token variable">$repository</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">findByPermission</span><span class="token punctuation">(</span><span class="token string">'example.module.test::*'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>




        </div>

        
    
        <div class="section">

            <h5>

                RoleRepositoryInterface::updatePermissions()

                <a class="permalink" name="usage/roles/role-repository/rolerepositoryinterface-updatepermissions" href="#usage/roles/role-repository/rolerepositoryinterface-updatepermissions">
                    <i class="fa fa-link "></i>
                </a>

            </h5>

            <p>The <code>updatePermissions</code> method updates the permissions for a role.</p>

    <h6>Returns: 
        <code>\Anomaly\UsersModule\Role\Contract\RoleInterface</code>
    </h6>


    <h6>Arguments</h6>

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
                                    <td><p>$role</p></td>
                                    <td><p>true</p></td>
                                    <td><p>object</p></td>
                                    <td><p>none</p></td>
                                    <td><p>The role instance.</p></td>
                            </tr>
                    <tr>
                                    <td><p>$permissions</p></td>
                                    <td><p>true</p></td>
                                    <td><p>array</p></td>
                                    <td><p>none</p></td>
                                    <td><p>The array of role permissions.</p></td>
                            </tr>
                </tbody>
    </table>

    <h6>Example</h6>

    <pre class=" language-php"><code class=" language-php"><span class="token variable">$repository</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">updatePermissions</span><span class="token punctuation">(</span>
    <span class="token variable">$role</span><span class="token punctuation">,</span>
    <span class="token punctuation">[</span>
        <span class="token string">'example.module.test::example.test'</span><span class="token punctuation">,</span>
        <span class="token string">'example.module.test::example.foo'</span>
    <span class="token punctuation">]</span>
<span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>




        </div>

        
    
        
    
        
    
        <div class="section">

            <h3>

                Plugin

                <a class="permalink" name="usage/plugin" href="#usage/plugin">
                    <i class="fa fa-link "></i>
                </a>

            </h3>

            	<p>This section will go over how to use the plugin that comes with the Users module.</p>


        </div>

                    
    
    
        <div class="section">

            <h4>

                user

                <a class="permalink" name="usage/plugin/user" href="#usage/plugin/user">
                    <i class="fa fa-link "></i>
                </a>

            </h4>

            <p>The <code>user</code> function returns a decorated user instance from the identifier provided.</p>

    <h6>Returns: 
        <code>\Anomaly\UsersModule\User\UserPresenter</code> or <code>null</code>
    </h6>


    <h6>Arguments</h6>

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
                                    <td><p>$identifier</p></td>
                                    <td><p>false</p></td>
                                    <td><p>mixed</p></td>
                                    <td><p>Will return the active user.</p></td>
                                    <td><p>The id, email, or username of the user to return.</p></td>
                            </tr>
                </tbody>
    </table>


    <h6>Twig</h6>

    <pre class=" language-php"><code class=" language-php">Hello <span class="token punctuation">{</span><span class="token punctuation">{</span> <span class="token function">user</span><span class="token punctuation">(</span><span class="token punctuation">)</span><span class="token punctuation">.</span>display_name <span class="token punctuation">}</span><span class="token punctuation">}</span>

Sup <span class="token punctuation">{</span><span class="token punctuation">{</span> <span class="token function">user</span><span class="token punctuation">(</span><span class="token string">'ryanthepyro'</span><span class="token punctuation">)</span><span class="token punctuation">.</span>first_name <span class="token punctuation">}</span><span class="token punctuation">}</span>
</code></pre>



        </div>

        
    
        <div class="section">

            <h4>

                role

                <a class="permalink" name="usage/plugin/role" href="#usage/plugin/role">
                    <i class="fa fa-link "></i>
                </a>

            </h4>

            <p>The <code>role</code> method returns a decorated role instance from the identifier provided.</p>

    <h6>Returns: 
        <code>\Anomaly\UsersModule\Role\RolePresenter</code> or <code>null</code>
    </h6>


    <h6>Arguments</h6>

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
                                    <td><p>$identifier</p></td>
                                    <td><p>true</p></td>
                                    <td><p>mixed</p></td>
                                    <td><p>none</p></td>
                                    <td><p>The ID or slug of the role to return.</p></td>
                            </tr>
                </tbody>
    </table>

    <h6>Example</h6>

    <pre class=" language-php"><code class=" language-php"><span class="token punctuation">{</span><span class="token operator">%</span> <span class="token keyword">if</span> <span class="token function">role</span><span class="token punctuation">(</span><span class="token string">'user'</span><span class="token punctuation">)</span><span class="token punctuation">.</span><span class="token function">hasPermission</span><span class="token punctuation">(</span><span class="token string">'example.module.test::example.test'</span><span class="token punctuation">)</span> <span class="token operator">%</span><span class="token punctuation">}</span>
    <span class="token punctuation">{</span><span class="token shell-comment comment"># Do something #}</span>
<span class="token punctuation">{</span><span class="token operator">%</span> <span class="token keyword">endif</span> <span class="token operator">%</span><span class="token punctuation">}</span></code></pre>




        </div>

        
    
        
    
        
    
        <div class="section">

            <h2>

                Services

                <a class="permalink" name="services" href="#services">
                    <i class="fa fa-link "></i>
                </a>

            </h2>

            	<p>This section will introduce you to the various services available in the Users module and how to use them.</p>


        </div>

                    
    
    
        <div class="section">

            <h3>

                Authentication

                <a class="permalink" name="services/authentication" href="#services/authentication">
                    <i class="fa fa-link "></i>
                </a>

            </h3>

            	<p>This section will introduce you to the authentication service and how to user it.</p>


        </div>

                    
    
    
        <div class="section">

            <h4>

                User Authenticator

                <a class="permalink" name="services/authentication/user-authenticator" href="#services/authentication/user-authenticator">
                    <i class="fa fa-link "></i>
                </a>

            </h4>

            	<p>This class will go over the <code>\Anomaly\UsersModule\User\UserAuthenticator</code> class and how to use it.</p>


        </div>

                    
    
    
        <div class="section">

            <h5>

                UserAuthenticator::attempt()

                <a class="permalink" name="services/authentication/user-authenticator/userauthenticator-attempt" href="#services/authentication/user-authenticator/userauthenticator-attempt">
                    <i class="fa fa-link "></i>
                </a>

            </h5>

            <p>The <code>attempt</code> method attempts to authorize a user. The <code>login</code> method is ran if the authentication succeeds.</p>

    <h6>Returns: 
        <code>\Anomaly\UsersModule\User\Contract\UserInterface</code> or <code>false</code>
    </h6>


    <h6>Arguments</h6>

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
                                    <td><p>$credentials</p></td>
                                    <td><p>true</p></td>
                                    <td><p>array</p></td>
                                    <td><p>none</p></td>
                                    <td><p>The credentials array of email/username and password.</p></td>
                            </tr>
                    <tr>
                                    <td><p>$remember</p></td>
                                    <td><p>false</p></td>
                                    <td><p>boolean</p></td>
                                    <td><p>false</p></td>
                                    <td><p>The "remember me" flag.</p></td>
                            </tr>
                </tbody>
    </table>

    <h6>Example</h6>

    <pre class=" language-php"><code class=" language-php"><span class="token variable">$authenticator</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">attempt</span><span class="token punctuation">(</span><span class="token punctuation">[</span><span class="token string">'email'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'example@domain.com'</span><span class="token punctuation">,</span> <span class="token string">'password'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'secret'</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>




        </div>

        
    
        <div class="section">

            <h5>

                UserAuthenticator::authenticate()

                <a class="permalink" name="services/authentication/user-authenticator/userauthenticator-authenticate" href="#services/authentication/user-authenticator/userauthenticator-authenticate">
                    <i class="fa fa-link "></i>
                </a>

            </h5>

            <p>The <code>authenticate</code> method authenticates credentials without logging the user in.</p>

    <h6>Returns: 
        <code>\Anomaly\UsersModule\User\Contract\UserInterface</code> or <code>false</code>
    </h6>


    <h6>Arguments</h6>

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
                                    <td><p>$credentials</p></td>
                                    <td><p>true</p></td>
                                    <td><p>array</p></td>
                                    <td><p>none</p></td>
                                    <td><p>The credentials array of email/username and password.</p></td>
                            </tr>
                </tbody>
    </table>

    <h6>Example</h6>

    <pre class=" language-php"><code class=" language-php"><span class="token variable">$authenticator</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">authenticate</span><span class="token punctuation">(</span><span class="token punctuation">[</span><span class="token string">'email'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'example@domain.com'</span><span class="token punctuation">,</span> <span class="token string">'password'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'secret password'</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>




        </div>

        
    
        <div class="section">

            <h5>

                UserAuthenticator::login()

                <a class="permalink" name="services/authentication/user-authenticator/userauthenticator-login" href="#services/authentication/user-authenticator/userauthenticator-login">
                    <i class="fa fa-link "></i>
                </a>

            </h5>

            <p>The <code>login</code> method logs in the user.</p>

    <h6>Returns: 
        <code>void</code>
    </h6>


    <h6>Arguments</h6>

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
                                    <td><p>$user</p></td>
                                    <td><p>true</p></td>
                                    <td><p>object</p></td>
                                    <td><p>none</p></td>
                                    <td><p>The user instance.</p></td>
                            </tr>
                </tbody>
    </table>

    <h6>Example</h6>

    <pre class=" language-php"><code class=" language-php"><span class="token variable">$authenticator</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">login</span><span class="token punctuation">(</span><span class="token variable">$user</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>




        </div>

        
    
        <div class="section">

            <h5>

                UserAuthenticator::logout()

                <a class="permalink" name="services/authentication/user-authenticator/userauthenticator-logout" href="#services/authentication/user-authenticator/userauthenticator-logout">
                    <i class="fa fa-link "></i>
                </a>

            </h5>

            <p>The <code>logout</code> method logs out the user.</p>

    <h6>Returns: 
        <code>void</code>
    </h6>


    <h6>Arguments</h6>

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
                                    <td><p>$user</p></td>
                                    <td><p>true</p></td>
                                    <td><p>object</p></td>
                                    <td><p>none</p></td>
                                    <td><p>The user to logout.</p></td>
                            </tr>
                </tbody>
    </table>

    <h6>Example</h6>

    <pre class=" language-php"><code class=" language-php"><span class="token variable">$authenticator</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">logout</span><span class="token punctuation">(</span><span class="token variable">$user</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>




        </div>

        
    
        <div class="section">

            <h5>

                UserAuthenticator::kickOut()

                <a class="permalink" name="services/authentication/user-authenticator/userauthenticator-kickout" href="#services/authentication/user-authenticator/userauthenticator-kickout">
                    <i class="fa fa-link "></i>
                </a>

            </h5>

            <p>The <code>kickOut</code> method kicks a user. The <code>kickOut</code> method is similar to <code>logout</code> but a different event is fired for you to hook into as needed.</p>

    <h6>Returns: 
        <code>void</code>
    </h6>


    <h6>Arguments</h6>

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
                                    <td><p>$user</p></td>
                                    <td><p>true</p></td>
                                    <td><p>object</p></td>
                                    <td><p>none</p></td>
                                    <td><p>The user to kick out.</p></td>
                            </tr>
                </tbody>
    </table>

    <h6>Example</h6>

    <pre class=" language-php"><code class=" language-php"><span class="token variable">$authenticator</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">kickOut</span><span class="token punctuation">(</span><span class="token variable">$user</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>




        </div>

        
    
        
    
        
    
        <div class="section">

            <h3>

                Security

                <a class="permalink" name="services/security" href="#services/security">
                    <i class="fa fa-link "></i>
                </a>

            </h3>

            	<p>This section will introduce you to the security checker and how to use it.</p>


        </div>

                    
    
    
        <div class="section">

            <h4>

                User Security

                <a class="permalink" name="services/security/user-security" href="#services/security/user-security">
                    <i class="fa fa-link "></i>
                </a>

            </h4>

            	<p>This section will introduce the <code>\Anomaly\UsersModule\User\UserSecurity</code> class and how to use it.</p>


        </div>

                    
    
    
        <div class="section">

            <h5>

                UserSecurity::attempt()

                <a class="permalink" name="services/security/user-security/usersecurity-attempt" href="#services/security/user-security/usersecurity-attempt">
                    <i class="fa fa-link "></i>
                </a>

            </h5>

            <p>The <code>attempt</code> method runs the security checks when an authentication <code>attempt</code> is performed. </p>

    <h6>Returns: 
        <code>\Illuminate\Http\RedirectResponse</code> or <code>true</code>
    </h6>



    <h6>Example</h6>

    <pre class=" language-php"><code class=" language-php"><span class="token variable">$result</span> <span class="token operator">=</span> <span class="token variable">$security</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">attemp</span><span class="token punctuation">(</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>




        </div>

        
    
        <div class="section">

            <h5>

                UserSecurity::check()

                <a class="permalink" name="services/security/user-security/usersecurity-check" href="#services/security/user-security/usersecurity-check">
                    <i class="fa fa-link "></i>
                </a>

            </h5>

            <p>The <code>check</code> method verifies that a user passes all the security checks.</p>

    <h6>Returns: 
        <code>\Illuminate\Http\RedirectResponse</code> or <code>true</code>
    </h6>


    <h6>Arguments</h6>

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
                                    <td><p>$user</p></td>
                                    <td><p>false</p></td>
                                    <td><p>object</p></td>
                                    <td><p>none</p></td>
                                    <td><p>The user instance to check.</p></td>
                            </tr>
                </tbody>
    </table>

    <h6>Example</h6>

    <pre class=" language-php"><code class=" language-php"><span class="token variable">$result</span> <span class="token operator">=</span> <span class="token variable">$security</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">check</span><span class="token punctuation">(</span><span class="token variable">$user</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>




        </div>

        
    
        
    
        
    
        <div class="section">

            <h3>

                Middleware

                <a class="permalink" name="services/middleware" href="#services/middleware">
                    <i class="fa fa-link "></i>
                </a>

            </h3>

            	<p>This section will introduce you to the middleware services and how to use them.</p>


        </div>

                    
    
    
        <div class="section">

            <h4>

                Authorizing Routes

                <a class="permalink" name="services/middleware/authorizing-routes" href="#services/middleware/authorizing-routes">
                    <i class="fa fa-link "></i>
                </a>

            </h4>

            	<p>The Users module load's middleware into the stack that allows you to set custom parameters that ensure the request is made by an authorized user.</p>


        </div>

                    
    
    
        <div class="section">

            <h5>

                Authorize By Role

                <a class="permalink" name="services/middleware/authorizing-routes/authorize-by-role" href="#services/middleware/authorizing-routes/authorize-by-role">
                    <i class="fa fa-link "></i>
                </a>

            </h5>

            	<p>You can authorize a route with <code>\Anomaly\UsersModule\Http\Middleware\AuthorizeRouteRole</code> by defining the <code>anomaly.module.users::role</code> route parameter;</p>
<pre class=" language-php"><code class=" language-php"><span class="token string">'example/test'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token punctuation">[</span>
    <span class="token string">'anomaly.module.users::role'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'my_role'</span><span class="token punctuation">,</span>
    <span class="token string">'uses'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'Example/Controller@test'</span>
<span class="token punctuation">]</span></code></pre>
<p>You can also define an array of roles where the user must have at least one:</p>
<pre class=" language-php"><code class=" language-php"><span class="token string">'example/test'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token punctuation">[</span>
    <span class="token string">'anomaly.module.users::role'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token punctuation">[</span><span class="token string">'my_role'</span><span class="token punctuation">,</span> <span class="token string">'another_role'</span><span class="token punctuation">]</span><span class="token punctuation">,</span>
    <span class="token string">'uses'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'Example/Controller@test'</span>
<span class="token punctuation">]</span></code></pre>
<p>Additionally you may include an optional redirect path and message in case the user does not pass authorization:</p>
<pre class=" language-php"><code class=" language-php"><span class="token string">'example/test'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token punctuation">[</span>
    <span class="token string">'anomaly.module.users::role'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'my_role'</span><span class="token punctuation">,</span>
    <span class="token string">'anomaly.module.users::redirect'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'/'</span><span class="token punctuation">,</span>
    <span class="token string">'anomaly.module.users::message'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'Sorry, you do not have access.'</span><span class="token punctuation">,</span>
    <span class="token string">'uses'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'Example/Controller@test'</span>
<span class="token punctuation">]</span></code></pre>


        </div>

        
    
        <div class="section">

            <h5>

                Authorize By Permission

                <a class="permalink" name="services/middleware/authorizing-routes/authorize-by-permission" href="#services/middleware/authorizing-routes/authorize-by-permission">
                    <i class="fa fa-link "></i>
                </a>

            </h5>

            	<p>You can authorize a route with <code>\Anomaly\UsersModule\Http\Middleware\AuthorizeRoutePermission</code> by defining the <code>anomaly.module.users::permission</code> route parameter;</p>
<pre class=" language-php"><code class=" language-php"><span class="token string">'example/test'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token punctuation">[</span>
    <span class="token string">'anomaly.module.users::permission'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'vendor.module.example::widgets.test'</span><span class="token punctuation">,</span>
    <span class="token string">'uses'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'Example/Controller@test'</span>
<span class="token punctuation">]</span></code></pre>
<p>You can also define an array of permissions where the user must have at least one:</p>
<pre class=" language-php"><code class=" language-php"><span class="token string">'example/test'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token punctuation">[</span>
    <span class="token string">'anomaly.module.users::role'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token punctuation">[</span><span class="token string">'vendor.module.example::widgets.test'</span><span class="token punctuation">,</span> <span class="token string">'vendor.module.example::widgets.example'</span><span class="token punctuation">]</span><span class="token punctuation">,</span>
    <span class="token string">'uses'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'Example/Controller@test'</span>
<span class="token punctuation">]</span></code></pre>
<p>Additionally you may include an optional redirect path and message in case the user does not pass authorization:</p>
<pre class=" language-php"><code class=" language-php"><span class="token string">'example/test'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token punctuation">[</span>
    <span class="token string">'anomaly.module.users::permission'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'vendor.module.example::widgets.test'</span><span class="token punctuation">,</span>
    <span class="token string">'anomaly.module.users::redirect'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'/'</span><span class="token punctuation">,</span>
    <span class="token string">'anomaly.module.users::message'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'Sorry, you do not have access.'</span><span class="token punctuation">,</span>
    <span class="token string">'uses'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'Example/Controller@test'</span>
<span class="token punctuation">]</span></code></pre>


        </div>

        
    
        
    
        
    
        
    
        <div class="section">

            <h2>

                Extensions

                <a class="permalink" name="extensions" href="#extensions">
                    <i class="fa fa-link "></i>
                </a>

            </h2>

            	<p>This section will go over the addon extensions and how they work.</p>


        </div>

                    
    
    
        <div class="section">

            <h3>

                Authenticators

                <a class="permalink" name="extensions/authenticators" href="#extensions/authenticators">
                    <i class="fa fa-link "></i>
                </a>

            </h3>

            	<p>Authenticators are responsible for authenticating credentials and login attempts.</p>


        </div>

                    
    
    
        <div class="section">

            <h4>

                Authenticator Extension

                <a class="permalink" name="extensions/authenticators/authenticator-extension" href="#extensions/authenticators/authenticator-extension">
                    <i class="fa fa-link "></i>
                </a>

            </h4>

            	<p>This section will go over the <code>\Anomaly\UsersModule\User\Authenticator\AuthenticatorExtension</code> class.</p>


        </div>

                    
    
    
        <div class="section">

            <h5>

                AuthenticatorExtension::authenticate()

                <a class="permalink" name="extensions/authenticators/authenticator-extension/authenticatorextension-authenticate" href="#extensions/authenticators/authenticator-extension/authenticatorextension-authenticate">
                    <i class="fa fa-link "></i>
                </a>

            </h5>

            <p>The <code>authenticate</code> method is responsible for authenticating the <code>credentials</code> and returning <code>null</code>, a <code>user</code>, or a <code>redirect</code>.</p>

    <h6>Returns: 
        <code>\Anomaly\UsersModule\User\Contract\UserInterface</code> or <code>\Illuminate\Http\RedirectResponse</code> or <code>null</code>
    </h6>


    <h6>Arguments</h6>

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
                                    <td><p>$credentials</p></td>
                                    <td><p>true</p></td>
                                    <td><p>array</p></td>
                                    <td><p>none</p></td>
                                    <td><p>The login information.</p></td>
                            </tr>
                </tbody>
    </table>





        </div>

        
    
        
    
        <div class="section">

            <h4>

                Writing Authenticators

                <a class="permalink" name="extensions/authenticators/writing-authenticators" href="#extensions/authenticators/writing-authenticators">
                    <i class="fa fa-link "></i>
                </a>

            </h4>

            	<p>This section will show you how to write your own custom authenticator extension.</p>


        </div>

                    
    
    
        <div class="section">

            <h5>

                Creating the extension

                <a class="permalink" name="extensions/authenticators/writing-authenticators/creating-the-extension" href="#extensions/authenticators/writing-authenticators/creating-the-extension">
                    <i class="fa fa-link "></i>
                </a>

            </h5>

            	<p>The first thing we need to do is to use the <code>make:addon</code> command to create our extension:</p>
<pre class=" language-php"><code class=" language-php">php artisan make<span class="token punctuation">:</span>addon anomaly<span class="token punctuation">.</span>extension<span class="token punctuation">.</span>default_authenticator</code></pre>


        </div>

        
    
        <div class="section">

            <h5>

                Extending the authenticator extension

                <a class="permalink" name="extensions/authenticators/writing-authenticators/extending-the-authenticator-extension" href="#extensions/authenticators/writing-authenticators/extending-the-authenticator-extension">
                    <i class="fa fa-link "></i>
                </a>

            </h5>

            	<p>The extension you create must extend the <code>\Anomaly\UsersModule\User\Authenticator\AuthenticatorExtension</code> class:</p>
<pre class=" language-php"><code class=" language-php"><span class="token delimiter">&lt;?php</span> <span class="token keyword">namespace</span> <span class="token package">Anomaly<span class="token punctuation">\</span>DefaultAuthenticatorExtension</span><span class="token punctuation">;</span>

<span class="token keyword">use</span> <span class="token package">Anomaly<span class="token punctuation">\</span>DefaultAuthenticatorExtension<span class="token punctuation">\</span>Command<span class="token punctuation">\</span>AuthenticateCredentials</span><span class="token punctuation">;</span>
<span class="token keyword">use</span> <span class="token package">Anomaly<span class="token punctuation">\</span>UsersModule<span class="token punctuation">\</span>User<span class="token punctuation">\</span>Authenticator<span class="token punctuation">\</span>AuthenticatorExtension</span><span class="token punctuation">;</span>
<span class="token keyword">use</span> <span class="token package">Anomaly<span class="token punctuation">\</span>UsersModule<span class="token punctuation">\</span>User<span class="token punctuation">\</span>Contract<span class="token punctuation">\</span>UserInterface</span><span class="token punctuation">;</span>

<span class="token keyword">class</span> <span class="token class-name">DefaultAuthenticatorExtension</span> <span class="token keyword">extends</span> <span class="token class-name">AuthenticatorExtension</span>
<span class="token punctuation">{</span>

    <span class="token comment" spellcheck="true">/**
     * This extensions provides a basic
     * authenticator for the users module.
     *
     * @var string
     */</span>
    <span class="token keyword">protected</span> <span class="token variable">$provides</span> <span class="token operator">=</span> <span class="token string">'anomaly.module.users::authenticator.default'</span><span class="token punctuation">;</span>

    <span class="token comment" spellcheck="true">/**
     * Authenticate a set of credentials.
     *
     * @param array $credentials
     * @return null|UserInterface
     */</span>
    <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">authenticate</span><span class="token punctuation">(</span><span class="token keyword">array</span> <span class="token variable">$credentials</span><span class="token punctuation">)</span>
    <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token variable">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">dispatch</span><span class="token punctuation">(</span><span class="token keyword">new</span> <span class="token class-name">AuthenticateCredentials</span><span class="token punctuation">(</span><span class="token variable">$credentials</span><span class="token punctuation">)</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
    <span class="token punctuation">}</span>
<span class="token punctuation">}</span></code></pre>
<p>You must define the <code>provides</code> property as <code>anomaly.module.users::authenticator.your_widget_slug</code> so that it's picked up as a supported extension.</p>


        </div>

        
    
        <div class="section">

            <h5>

                Authenticating credentials

                <a class="permalink" name="extensions/authenticators/writing-authenticators/authenticating-credentials" href="#extensions/authenticators/writing-authenticators/authenticating-credentials">
                    <i class="fa fa-link "></i>
                </a>

            </h5>

            	<p>The primary task of any authenticators is to authenticate a login request. In this example we will use a command thats dispatched within the <code>authenticate</code> method to check the credentials:</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">authenticate</span><span class="token punctuation">(</span><span class="token keyword">array</span> <span class="token variable">$credentials</span><span class="token punctuation">)</span>
<span class="token punctuation">{</span>
    <span class="token keyword">return</span> <span class="token variable">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">dispatch</span><span class="token punctuation">(</span><span class="token keyword">new</span> <span class="token class-name">AuthenticateCredentials</span><span class="token punctuation">(</span><span class="token variable">$credentials</span><span class="token punctuation">)</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
<span class="token punctuation">}</span></code></pre>
<p>Our <code>AuthenticateCredentials</code> command is responsible for the actual work:</p>
<pre class=" language-php"><code class=" language-php"><span class="token delimiter">&lt;?php</span> <span class="token keyword">namespace</span> <span class="token package">Anomaly<span class="token punctuation">\</span>DefaultAuthenticatorExtension<span class="token punctuation">\</span>Command</span><span class="token punctuation">;</span>

<span class="token keyword">use</span> <span class="token package">Anomaly<span class="token punctuation">\</span>UsersModule<span class="token punctuation">\</span>User<span class="token punctuation">\</span>Contract<span class="token punctuation">\</span>UserRepositoryInterface</span><span class="token punctuation">;</span>

<span class="token keyword">class</span> <span class="token class-name">AuthenticateCredentials</span>
<span class="token punctuation">{</span>

    <span class="token comment" spellcheck="true">/**
     * The credentials to authenticate.
     *
     * @var array
     */</span>
    <span class="token keyword">protected</span> <span class="token variable">$credentials</span><span class="token punctuation">;</span>

    <span class="token comment" spellcheck="true">/**
     * Create a new AuthenticateCredentials instance.
     *
     * @param array $credentials
     */</span>
    <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">__construct</span><span class="token punctuation">(</span><span class="token keyword">array</span> <span class="token variable">$credentials</span><span class="token punctuation">)</span>
    <span class="token punctuation">{</span>
        <span class="token variable">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">credentials</span> <span class="token operator">=</span> <span class="token variable">$credentials</span><span class="token punctuation">;</span>
    <span class="token punctuation">}</span>

    <span class="token comment" spellcheck="true">/**
     * Handle the command.
     *
     * @param  UserRepositoryInterface                               $users
     * @return \Anomaly\UsersModule\User\Contract\UserInterface|null
     */</span>
    <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">handle</span><span class="token punctuation">(</span>UserRepositoryInterface <span class="token variable">$users</span><span class="token punctuation">)</span>
    <span class="token punctuation">{</span>
        <span class="token keyword">if</span> <span class="token punctuation">(</span><span class="token operator">!</span><span class="token function">isset</span><span class="token punctuation">(</span><span class="token variable">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">credentials</span><span class="token punctuation">[</span><span class="token string">'password'</span><span class="token punctuation">]</span><span class="token punctuation">)</span> <span class="token operator">&amp;&amp;</span> <span class="token operator">!</span><span class="token function">isset</span><span class="token punctuation">(</span><span class="token variable">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">credentials</span><span class="token punctuation">[</span><span class="token string">'email'</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
            <span class="token keyword">return</span> <span class="token keyword">null</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>

        <span class="token keyword">return</span> <span class="token variable">$users</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">findByCredentials</span><span class="token punctuation">(</span><span class="token variable">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">credentials</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
    <span class="token punctuation">}</span>
<span class="token punctuation">}</span></code></pre>


        </div>

        
    
        <div class="section">

            <h5>

                Redirecting authentication requests

                <a class="permalink" name="extensions/authenticators/writing-authenticators/redirecting-authentication-requests" href="#extensions/authenticators/writing-authenticators/redirecting-authentication-requests">
                    <i class="fa fa-link "></i>
                </a>

            </h5>

            	<p>The <code>authenticate</code> method can return an instance of the user, null, or a redirect instance. In the case a redirect is returns the request will be redirected immediately. After the redirect is made the authentication will be in your hands!</p>


        </div>

        
    
        
    
        
    
        <div class="section">

            <h3>

                Security Checks

                <a class="permalink" name="extensions/security-checks" href="#extensions/security-checks">
                    <i class="fa fa-link "></i>
                </a>

            </h3>

            	<p>Security checks are responsible for filtering login attempts and users. For example a security check could enforce that a certain criteria is met by the user. Or check that the login form is not being flooded.</p>


        </div>

                    
    
    
        <div class="section">

            <h4>

                Security Check Extension

                <a class="permalink" name="extensions/security-checks/security-check-extension" href="#extensions/security-checks/security-check-extension">
                    <i class="fa fa-link "></i>
                </a>

            </h4>

            	<p>This section will go over the <code>\Anomaly\UsersModule\User\Security\Contract\SecurityCheckInterface</code> class.</p>


        </div>

                    
    
    
        <div class="section">

            <h5>

                SecurityCheckExtension::attempt()

                <a class="permalink" name="extensions/security-checks/security-check-extension/securitycheckextension-attempt" href="#extensions/security-checks/security-check-extension/securitycheckextension-attempt">
                    <i class="fa fa-link "></i>
                </a>

            </h5>

            <p>The <code>attempt</code> method is used to check security during a login attempt.</p>

    <h6>Returns: 
        <code>\Illuminate\Http\RedirectResponse</code> or <code>true</code>
    </h6>







        </div>

        
    
        <div class="section">

            <h5>

                SecurityCheckExtension::check()

                <a class="permalink" name="extensions/security-checks/security-check-extension/securitycheckextension-check" href="#extensions/security-checks/security-check-extension/securitycheckextension-check">
                    <i class="fa fa-link "></i>
                </a>

            </h5>

            <p>The <code>check</code> method is run during each request against a user. </p>

    <h6>Returns: 
        <code>\Illuminate\Http\RedirectResponse</code> or <code>true</code>
    </h6>


    <h6>Arguments</h6>

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
                                    <td><p>$user</p></td>
                                    <td><p>false</p></td>
                                    <td><p><code>UserInterface</code></p></td>
                                    <td><p>null</p></td>
                                    <td><p>The user to check security for.</p></td>
                            </tr>
                </tbody>
    </table>





        </div>

        
    
        
    
        <div class="section">

            <h4>

                Writing Security Checks

                <a class="permalink" name="extensions/security-checks/writing-security-checks" href="#extensions/security-checks/writing-security-checks">
                    <i class="fa fa-link "></i>
                </a>

            </h4>

            	<p>This section will show you how to write your own custom security check extension.</p>


        </div>

                    
    
    
        <div class="section">

            <h5>

                Creating the extension

                <a class="permalink" name="extensions/security-checks/writing-security-checks/creating-the-extension" href="#extensions/security-checks/writing-security-checks/creating-the-extension">
                    <i class="fa fa-link "></i>
                </a>

            </h5>

            	<p>The first thing we need to do is to use the <code>make:addon</code> command to create our extension:</p>
<pre class=" language-php"><code class=" language-php">php artisan make<span class="token punctuation">:</span>addon anomaly<span class="token punctuation">.</span>extension<span class="token punctuation">.</span>user_security_check</code></pre>


        </div>

        
    
        <div class="section">

            <h5>

                Extending the security check extension

                <a class="permalink" name="extensions/security-checks/writing-security-checks/extending-the-security-check-extension" href="#extensions/security-checks/writing-security-checks/extending-the-security-check-extension">
                    <i class="fa fa-link "></i>
                </a>

            </h5>

            	<p>The extension you create must extend the <code>\Anomaly\UsersModule\User\Security\SecurityCheckExtension</code> class:</p>
<pre class=" language-php"><code class=" language-php"><span class="token delimiter">&lt;?php</span> <span class="token keyword">namespace</span> <span class="token package">Anomaly<span class="token punctuation">\</span>UserSecurityCheckExtension</span><span class="token punctuation">;</span>

<span class="token keyword">use</span> <span class="token package">Anomaly<span class="token punctuation">\</span>UserSecurityCheckExtension<span class="token punctuation">\</span>Command<span class="token punctuation">\</span>CheckUser</span><span class="token punctuation">;</span>
<span class="token keyword">use</span> <span class="token package">Anomaly<span class="token punctuation">\</span>UsersModule<span class="token punctuation">\</span>User<span class="token punctuation">\</span>Contract<span class="token punctuation">\</span>UserInterface</span><span class="token punctuation">;</span>
<span class="token keyword">use</span> <span class="token package">Anomaly<span class="token punctuation">\</span>UsersModule<span class="token punctuation">\</span>User<span class="token punctuation">\</span>Security<span class="token punctuation">\</span>SecurityCheckExtension</span><span class="token punctuation">;</span>
<span class="token keyword">use</span> <span class="token package">Symfony<span class="token punctuation">\</span>Component<span class="token punctuation">\</span>HttpFoundation<span class="token punctuation">\</span>Response</span><span class="token punctuation">;</span>

<span class="token keyword">class</span> <span class="token class-name">UserSecurityCheckExtension</span> <span class="token keyword">extends</span> <span class="token class-name">SecurityCheckExtension</span>
<span class="token punctuation">{</span>

    <span class="token comment" spellcheck="true">/**
     * This extension provides a security check that
     * assures the user is active, enabled, etc.
     *
     * @var null|string
     */</span>
    <span class="token keyword">protected</span> <span class="token variable">$provides</span> <span class="token operator">=</span> <span class="token string">'anomaly.module.users::security_check.user'</span><span class="token punctuation">;</span>

    <span class="token comment" spellcheck="true">/**
     * Check an HTTP request.
     *
     * @param  UserInterface $user
     * @return bool|Response
     */</span>
    <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">check</span><span class="token punctuation">(</span>UserInterface <span class="token variable">$user</span> <span class="token operator">=</span> <span class="token keyword">null</span><span class="token punctuation">)</span>
    <span class="token punctuation">{</span>
        <span class="token keyword">if</span> <span class="token punctuation">(</span><span class="token operator">!</span><span class="token variable">$user</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
            <span class="token keyword">return</span> <span class="token boolean">true</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>

        <span class="token keyword">return</span> <span class="token variable">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">dispatch</span><span class="token punctuation">(</span><span class="token keyword">new</span> <span class="token class-name">CheckUser</span><span class="token punctuation">(</span><span class="token variable">$user</span><span class="token punctuation">)</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
    <span class="token punctuation">}</span>

<span class="token punctuation">}</span></code></pre>
<p>You must define the <code>provides</code> property as <code>anomaly.module.users::security_check.your_widget_slug</code> so that it's picked up as a supported extension.</p>


        </div>

        
    
        <div class="section">

            <h5>

                Validating security

                <a class="permalink" name="extensions/security-checks/writing-security-checks/validating-security" href="#extensions/security-checks/writing-security-checks/validating-security">
                    <i class="fa fa-link "></i>
                </a>

            </h5>

            	<p>The primary task of any security check is to validate a user. In this example we will use a command thats dispatched within the <code>check</code> method to check the user over and make sure they are valid and allowed:</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">check</span><span class="token punctuation">(</span>UserInterface <span class="token variable">$user</span> <span class="token operator">=</span> <span class="token keyword">null</span><span class="token punctuation">)</span>
<span class="token punctuation">{</span>
    <span class="token keyword">if</span> <span class="token punctuation">(</span><span class="token operator">!</span><span class="token variable">$user</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token boolean">true</span><span class="token punctuation">;</span>
    <span class="token punctuation">}</span>

    <span class="token keyword">return</span> <span class="token variable">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">dispatch</span><span class="token punctuation">(</span><span class="token keyword">new</span> <span class="token class-name">CheckUser</span><span class="token punctuation">(</span><span class="token variable">$user</span><span class="token punctuation">)</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
<span class="token punctuation">}</span></code></pre>
<p>Our <code>CheckUser</code> command is responsible for the actual work:</p>
<pre class=" language-php"><code class=" language-php"><span class="token delimiter">&lt;?php</span> <span class="token keyword">namespace</span> <span class="token package">Anomaly<span class="token punctuation">\</span>UserSecurityCheckExtension<span class="token punctuation">\</span>Command</span><span class="token punctuation">;</span>

<span class="token keyword">use</span> <span class="token package">Anomaly<span class="token punctuation">\</span>Streams<span class="token punctuation">\</span>Platform<span class="token punctuation">\</span>Message<span class="token punctuation">\</span>MessageBag</span><span class="token punctuation">;</span>
<span class="token keyword">use</span> <span class="token package">Anomaly<span class="token punctuation">\</span>UsersModule<span class="token punctuation">\</span>User<span class="token punctuation">\</span>Contract<span class="token punctuation">\</span>UserInterface</span><span class="token punctuation">;</span>
<span class="token keyword">use</span> <span class="token package">Anomaly<span class="token punctuation">\</span>UsersModule<span class="token punctuation">\</span>User<span class="token punctuation">\</span>UserAuthenticator</span><span class="token punctuation">;</span>
<span class="token keyword">use</span> <span class="token package">Illuminate<span class="token punctuation">\</span>Routing<span class="token punctuation">\</span>Redirector</span><span class="token punctuation">;</span>

<span class="token keyword">class</span> <span class="token class-name">CheckUser</span>
<span class="token punctuation">{</span>

    <span class="token comment" spellcheck="true">/**
     * The user instance.
     *
     * @var UserInterface
     */</span>
    <span class="token keyword">protected</span> <span class="token variable">$user</span><span class="token punctuation">;</span>

    <span class="token comment" spellcheck="true">/**
     * Create a new CheckUser instance.
     *
     * @param UserInterface $user
     */</span>
    <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">__construct</span><span class="token punctuation">(</span>UserInterface <span class="token variable">$user</span><span class="token punctuation">)</span>
    <span class="token punctuation">{</span>
        <span class="token variable">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">user</span> <span class="token operator">=</span> <span class="token variable">$user</span><span class="token punctuation">;</span>
    <span class="token punctuation">}</span>

    <span class="token comment" spellcheck="true">/**
     * @param  UserAuthenticator                      $authenticator
     * @param  MessageBag                             $message
     * @param  Redirector                             $redirect
     * @return bool|\Illuminate\Http\RedirectResponse
     */</span>
    <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">handle</span><span class="token punctuation">(</span>UserAuthenticator <span class="token variable">$authenticator</span><span class="token punctuation">,</span> MessageBag <span class="token variable">$message</span><span class="token punctuation">,</span> Redirector <span class="token variable">$redirect</span><span class="token punctuation">)</span>
    <span class="token punctuation">{</span>
        <span class="token keyword">if</span> <span class="token punctuation">(</span><span class="token operator">!</span><span class="token variable">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">isActivated</span><span class="token punctuation">(</span><span class="token punctuation">)</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>

            <span class="token variable">$message</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">error</span><span class="token punctuation">(</span><span class="token string">'Your account has not been activated.'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

            <span class="token variable">$authenticator</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">logout</span><span class="token punctuation">(</span><span class="token punctuation">)</span><span class="token punctuation">;</span> <span class="token comment" spellcheck="true">// Just in case.</span>

            <span class="token keyword">return</span> <span class="token variable">$redirect</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">back</span><span class="token punctuation">(</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>

        <span class="token keyword">if</span> <span class="token punctuation">(</span><span class="token operator">!</span><span class="token variable">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">isEnabled</span><span class="token punctuation">(</span><span class="token punctuation">)</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>

            <span class="token variable">$message</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">error</span><span class="token punctuation">(</span><span class="token string">'Your account has been disabled.'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

            <span class="token variable">$authenticator</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">logout</span><span class="token punctuation">(</span><span class="token punctuation">)</span><span class="token punctuation">;</span> <span class="token comment" spellcheck="true">// Just in case.</span>

            <span class="token keyword">return</span> <span class="token variable">$redirect</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">back</span><span class="token punctuation">(</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>

        <span class="token keyword">return</span> <span class="token boolean">true</span><span class="token punctuation">;</span>
    <span class="token punctuation">}</span>
<span class="token punctuation">}</span></code></pre>


        </div>

        
    
        
    
        
    
        
    
                                            
                </div>
