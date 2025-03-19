<?php
/*
plugin_name: Djebel Creator Links
plugin_uri: https://djebel.com/plugins/create-links
description: allows content creators to create social links to their social profiles.
version: 1.0.0
tags: socia,social media,pages
stable_version: 1.0.0
min_php_ver: 5.6
min_dj_cms_ver: 1.0.0
tested_with_dj_cms_ver: 1.0.0
author_name: Svetoslav Marinov (Slavi)
company_name: Orbisius
author_uri: https://orbisius.com
text_domain: djebe-creator-links
license: gpl2
*/

$obj = Djebel_Plugin_Creator_Links::getInstance();
Dj_App_Hooks::addAction( 'app.page.content.render', [ $obj, 'renderLinks'] );

class Djebel_Plugin_Creator_Links {
    /**
     * Stores SVG icons for social networks
     * @var array
     */
    protected $social_networks_arr = [
        'facebook' => [
            'svg' => '<path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>',
            'color' => '#1877f2',
            'hover_color' => '#1664d9',
        ],
        'linkedin' => [
            'svg' => '<path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle>',
            'color' => '#0077b5',
            'hover_color' => '#006399',
        ],
        'twitter' => [
            'svg' => '<path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z"></path>',
            'color' => '#1da1f2',
            'hover_color' => '#1a8cd8',
        ],
        'email' => [
            'svg' => '<rect width="20" height="16" x="2" y="4" rx="2"></rect><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>',
            'color' => '#ea4335',
            'hover_color' => '#d33828',
        ],
        'site' => [
            'svg' => '<circle cx="12" cy="12" r="10"></circle><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"></path><path d="M2 12h20"></path>',
            'color' => '#333333',
            'hover_color' => '#262626',
        ],
        'tiktok' => [
            'svg' => '<path d="M9 12a4 4 0 1 0 4 4V4a5 5 0 0 0 5 5"></path>',
            'color' => '#000000',
            'hover_color' => '#1a1a1a',
        ],
    ];

    public function renderLinks()
    {
        $options_obj = Dj_App_Options::getInstance();
        
        $social_networks = [];
        $cfg_social_networks = $options_obj->get('social_networks');
        $cfg_social_networks = empty($cfg_social_networks) ? [] : (array) $cfg_social_networks;

        // Get enabled social networks and their URLs
        foreach ($cfg_social_networks as $network => $config) {
            // Skip if network definition doesn't exist in our SVG map
            if (empty($this->social_networks_arr[$network])) {
                continue;
            }

            // Skip if not enabled or no URL provided
            if (empty($config['url']) || (isset($config['enabled']) && empty($config['enabled']))) {
                continue;
            }

            // Merge configuration with SVG data
            $social_networks[$network] = array_merge(
                $this->social_networks_arr[$network],
                ['url' => $config['url']],
            );
        }

        $social_profile_data = $options_obj->get('social_networks_profile');

        $template_data = [
            'social_networks' => $social_networks,
            'profile_name' => empty($social_profile_data['profile_name']) ? 'John Doe' : $social_profile_data['profile_name'],
            'profile_image' => empty($social_profile_data['profile_image']) ? 'https://via.placeholder.com/150' : $social_profile_data['profile_image'],
        ];

        Dj_App_Util::data('plugin_social_links_data', $template_data);

        $tpl = __DIR__ . '/templates/default/index.php';
        require_once $tpl;
    }

    /**
     * Singleton pattern i.e. we have only one instance of this obj
     * @staticvar static $instance
     * @return static
     */
    public static function getInstance() {
        static $instance = null;

        // This will make the calling class to be instantiated.
        // no need each sub class to define this method.
        if (is_null($instance)) {
            $instance = new static();
        }

        return $instance;
    }
}
