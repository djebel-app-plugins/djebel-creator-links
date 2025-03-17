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
text_domain: hello-world
license: gpl2
*/

Dj_CMS_Hooks::addAction( 'app.page.body.start', 'dj_app_social_pages_content' );

function dj_app_social_pages_content()
{
//    echo 'Hello World' . __METHOD__;
}
