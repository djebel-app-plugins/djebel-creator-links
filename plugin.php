<?php
/*
plugin_id: djebel-creator-links
plugin_name: Djebel Creator Links
plugin_uri: https://djebel.com/plugins/create-links
description: allows content creators to create social links to their social profiles.
version: 1.0.0
tags: socia,social media,pages
stable_version: 1.0.0
min_php_ver: 5.6
min_dj_app_ver: 1.0.0
tested_with_dj_app_ver: 1.0.0
author_name: Svetoslav Marinov (Slavi)
company_name: Orbisius
author_uri: https://orbisius.com
text_domain: djebel-creator-links
license: gpl2
*/

$obj = Djebel_Plugin_Creator_Links::getInstance();
Dj_App_Hooks::addAction( 'app.page.content.render', [ $obj, 'renderLinks'] );
Dj_App_Hooks::addAction( 'app.page.html.head', [ $obj, 'outputCSS' ], 100 );

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
        'x' => [
            'svg' => '<path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z"></path>',
            'color' => '#1da1f2',
            'hover_color' => '#1a8cd8',
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
        'youtube' => [
            'svg' => '<rect x="2" y="2" width="20" height="20" rx="2" ry="2"></rect><polygon points="8,6 18,12 8,18" fill="currentColor"></polygon>',
            'color' => '#ff0000',
            'hover_color' => '#cc0000',
        ],
        'instagram' => [
            'svg' => '<rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>',
            'color' => '#e4405f',
            'hover_color' => '#c13584',
        ],
        'telegram' => [
            'svg' => '<path d="M21.73 4.73L2.27 11.27c-.94.35-.9 1.63.04 1.91l5.34 1.6 12.46-7.66c.25-.15.49.19.29.4L9.46 16.38c-.14.14-.19.36-.11.56l1.6 4.32c.31.83 1.45.78 1.69-.08L21.73 4.73z"></path>',
            'color' => '#0088cc',
            'hover_color' => '#006ba3',
        ],
    ];

    public function renderLinks()
    {
        $options_obj = Dj_App_Options::getInstance();

        $ctx = [];
        
        // Process quick social networks - maintain order from social_networks_arr
        $social_quick_networks = [];
        $cfg_social_quick_networks = $options_obj->get('social_quick_networks');
        $cfg_social_quick_networks = empty($cfg_social_quick_networks) ? [] : (array) $cfg_social_quick_networks;
        
        foreach ($cfg_social_quick_networks as $network => $config) {
            // Skip if network definition doesn't exist in our SVG map
            if (empty($this->social_networks_arr[$network])) {
                continue;
            }

            // Skip if not enabled or no URL provided
            if (empty($config['url']) || (isset($config['enabled']) && empty($config['enabled']))) {
                continue;
            }

            $network_data = $this->social_networks_arr[$network];

            // Merge configuration with SVG data
            $social_quick_networks[$network] = array_merge($network_data, $config);
        }

        // Process regular social networks
        $social_networks = [];
        $cfg_social_networks = $options_obj->get('social_networks');
        $cfg_social_networks = empty($cfg_social_networks) ? [] : (array) $cfg_social_networks;

        foreach ($cfg_social_networks as $network => $config) {
            // Skip if network definition doesn't exist in our SVG map
            if (empty($this->social_networks_arr[$network])) {
                continue;
            }

            // Skip if not enabled or no URL provided
            if (empty($config['url']) || (isset($config['enabled']) && empty($config['enabled']))) {
                continue;
            }

            $network_data = $this->social_networks_arr[$network];

            // Merge configuration with SVG data
            $social_networks[$network] = array_merge($network_data, $config);
        }

        $social_networks_data = $options_obj->get('social_networks_data');

        $template_data = [
            'bio' => empty($social_networks_data['bio']) ? '' : $social_networks_data['bio'],
            'full_name' => empty($social_networks_data['full_name']) ? '' : $social_networks_data['full_name'],
            'social_networks' => $social_networks,
            'social_quick_networks' => $social_quick_networks,
            'profile_image_url' => empty($social_networks_data['profile_image_url']) ? '' : $social_networks_data['profile_image_url'],
        ];

        $template_data = Dj_App_Hooks::applyFilter( 'app.plugins.djebel-creator-links.template_data', $template_data, $ctx );

        Dj_App_Util::data('plugin_social_links_data', $template_data);

        $tpl = __DIR__ . '/templates/default/index.php';
        require_once $tpl;
    }

    /**
     * Outputs CSS for social network buttons in the header
     */
    public function outputCSS()
    {
        $options_obj = Dj_App_Options::getInstance();
        
        // Get both regular and quick social networks
        $cfg_social_networks = $options_obj->get("social_networks");
        $cfg_social_networks = empty($cfg_social_networks) ? [] : (array) $cfg_social_networks;
        
        $cfg_social_quick_networks = $options_obj->get("social_quick_networks");
        $cfg_social_quick_networks = empty($cfg_social_quick_networks) ? [] : (array) $cfg_social_quick_networks;

        echo "<style>\n";
        echo ".oapp-social-btn { color: white !important; }\n";
        echo ".oapp-quick-social-btn { color: white !important; }\n";
        
        // Merge both types and generate CSS for each enabled network
        $all_networks = array_merge($cfg_social_networks, $cfg_social_quick_networks);
        $processed_networks = []; // Track to avoid duplicates
        
        foreach ($all_networks as $network => $config) {
            if (isset($processed_networks[$network]) || empty($this->social_networks_arr[$network])) {
                continue;
            }
            
            if (empty($config["url"]) || (isset($config["enabled"]) && empty($config["enabled"]))) {
                continue;
            }

            $network_data = $this->social_networks_arr[$network];
            
            // Generate CSS for both button types if network is enabled
            if (isset($cfg_social_networks[$network])) {
                printf(".oapp-social-btn[class*='%s'] { background-color: %s; }\n", $network, $network_data["color"]);
                printf(".oapp-social-btn[class*='%s']:hover { background-color: %s; }\n", $network, $network_data["hover_color"]);
            }
            
            if (isset($cfg_social_quick_networks[$network])) {
                printf(".oapp-quick-social-btn[class*='%s'] { background-color: %s; }\n", $network, $network_data["color"]);
                printf(".oapp-quick-social-btn[class*='%s']:hover { background-color: %s; }\n", $network, $network_data["hover_color"]);
            }
            
            $processed_networks[$network] = true;
        }
        
        echo "</style>\n";
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
