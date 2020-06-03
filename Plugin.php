<?php namespace AlbrightLabs\Client;

use Backend;
use System\Classes\PluginBase;

/**
 * Client Plugin Information File
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
            'name'        => 'Client',
            'description' => 'A simple client management plugin.',
            'author'      => 'Albright Labs LLC',
            'icon'        => 'icon-user'
        ];
    }

    /**
     * Registers back-end settings items for this plugin.
     *
     * @return array
     */
    public function registerSettings()
    {
        return [
            'settings' => [
                'label'       => 'Client settings',
                'description' => 'Manage client settings and custom data fields.',
                'category'    => 'Clients',
                'icon'        => 'icon-user',
                'class'       => 'AlbrightLabs\Client\Models\Settings',
                'order'       => 400,
                'keywords'    => 'client crm',
            ]
        ];
    }


    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return [
            'albrightlabs.client.manage' => [
                'tab' => 'Client',
                'label' => 'Manage clients'
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
        return [
            'client' => [
                'label'       => 'Clients',
                'url'         => Backend::url('albrightlabs/client/clients'),
                'icon'        => 'icon-user',
                'iconSvg'     => '/plugins/albrightlabs/client/assets/img/icon.svg',
                'permissions' => ['albrightlabs.client.*'],
                'order'       => 400,
            ],
        ];
    }
}
