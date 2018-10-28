<?php

// register addon path to current dir to prevent auto-registered paths on
// wrong folder names like `cockpit_MoreOptions`
$app->path('moreoptions', __DIR__);

// load only if collections controller gets called
$app->on('app.collections.controller.admin.init', function() use($app){
      
    $route = explode('/', substr($app['route'],1));
    
    // load assets and custom code only on `/*/collection`
    if (isset($route[1]) && $route[1] == 'collection') {
        
        $this->helper('admin')->addAssets('moreoptions:assets/components/cp-collection-tab-content.tag');
    
        $app->on('app.layout.contentafter', function(){
            
            $tab = ['name' => 'more', 'label' => 'More Options'];
            
            // add link to tab list
            $newtab = str_replace('"', '\"', "<li class=\"{ tab=='". $tab['name'] ."' && 'uk-active'}\"><a class=\"uk-text-capitalize\" onclick=\"{ toggleTab }\" data-tab=\"". $tab['name'] ."\">{ App.i18n.get('". $tab['label'] ."') }</a></li>");
            
            // append $newtab and <cp-collection-tab-content> to html, must be inside the riot-view div
            // could break if the source code changes
            echo "<script>\r\n";
            echo '$(\'[data-tab]\').parent().parent().append("'.$newtab.'")' . "\r\n";
            echo '$(\'.uk-width-medium-3-4 > .uk-form-row\').last().after("<cp-collection-tab-content tab=\''. $tab['name'] .'\' types=\'foo, bar\'></cp-collection-tab-content>");' . "\r\n";
            echo "</script>\r\n";
            
        });
    
    }
    
});

// settings for collection grouping
$app->on('app.collections.controller.admin.init', function() use($app){
    
    $app->on('app.layout.contentbefore', function(){
            
        echo $this->view('moreoptions:views/partials/options.php');
        
    });
    
});


// dashboard widget
$app->on("admin.dashboard.widgets", function($widgets) {
    
    $group = $this->module('cockpit')->getGroup();
    
    $collections = $this->module('collections')->getCollectionsInGroup($group);
    
    $colgroups = [];
    
    foreach ($collections as $col)
        if (isset($col['type']))
            foreach ($col['type'] as $type)
                $colgroups[$type][$col['name']] = $col;
    
    $widgets[] = [
        "name" => "collectiontypes",
        "content" => $this->view('moreoptions:views/partials/widget.php', compact('collections', 'colgroups')),
        "area" => 'main'
    ];
}, 100);
