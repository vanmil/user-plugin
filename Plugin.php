<?php namespace Plugins\RainLab\User;

use Backend;
use Modules\System\Classes\PluginBase;
use October\Rain\Support\FacadeLoader;

class Plugin extends PluginBase
{

    public function pluginDetails()
    {
        return [
            'name' => 'User',
            'description' => 'Front-end user management.',
            'author' => 'Alexey Bobkov, Samuel Georges',
            'icon' => 'icon-user'
        ];
    }

    public function register()
    {
        $facade = FacadeLoader::instance();
        $facade->facade('Auth', 'Plugins\RainLab\User\Facades\Auth');
    }

    public function registerComponents()
    {
        return [
            'Plugins\RainLab\User\Components\RegisterForm' => 'userRegisterForm',
            'Plugins\RainLab\User\Components\SignInForm' => 'userSignInForm',
            'Plugins\RainLab\User\Components\ResetForm' => 'userResetForm',
            'Plugins\RainLab\User\Components\User' => 'user',
        ];
    }

    public function registerNavigation()
    {
        return [
            'user' => [
                'label' => 'Users',
                'url' => Backend::url('rainlab/user/users'),
                'icon' => 'icon-user',
                'permissions' => ['user:*'],
                'order' => 500,
                'sideMenu' => [
                    'users' => [
                        'label' => 'All Users',
                        'icon' => 'icon-user',
                        'url' => Backend::url('rainlab/user/users'),
                        'permissions' => ['user:access_users'],
                    ],
                ]
            ]
        ];
    }

    public function registerSettings()
    {
        return [
            'location' => [
                'label' => 'Locations',
                'description' => 'Manage available user countries and states.',
                'category' => 'Users',
                'icon' => 'icon-globe',
                'url' => 'rainlab/user/locations',
                'sort' => 100
            ]
        ];
    }

}