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
Dj_CMS_Hooks::addAction( 'app.page.content.render', [ $obj, 'renderLinks'] );

// no need for a theme
Dj_CMS_Hooks::addFilter( 'app.core.themes.load_theme', Dj_CMS_Hooks::RETURN_FALSE );

class Djebel_Plugin_Creator_Links {
    function renderLinks()
    {
        $social_networks_arr = [
            'twitter' => [
                'handle' => 'orbisius',
                'url' => 'https://twitter.com/orbisius',
            ],
        ];

        $tpl = __DIR__ . '/templates/default/index.php';
        require $tpl;
    }

    public function renderLinkedIn()
    {

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
