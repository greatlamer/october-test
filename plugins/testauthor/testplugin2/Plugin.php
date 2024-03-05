<?php namespace TestAuthor\TestPlugin2;

use Backend;
use System\Classes\PluginBase;

/**
 * TestPlugin2 Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'TestPlugin2',
            'description' => 'No description provided yet...',
            'author'      => 'TestAuthor',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return []; // Remove this line to activate

        return [
            'TestAuthor\TestPlugin2\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'testauthor.testplugin2.some_permission' => [
                'tab' => 'TestPlugin2',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return []; // Remove this line to activate

        return [
            'testplugin2' => [
                'label'       => 'TestPlugin2',
                'url'         => Backend::url('testauthor/testplugin2/mycontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['testauthor.testplugin2.*'],
                'order'       => 500,
            ],
        ];
    }
}
