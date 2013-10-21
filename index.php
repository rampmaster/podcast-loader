<?php

use Symfony\Component\Yaml\Yaml;

require 'vendor/autoload.php';

if(php_sapi_name() != 'cli'){    
    die('Only CLI request');
}
if($argc<=1){
    die('Request parameters');
}
unset($argv[0]);
$slug = false;
foreach($argv as $value){
    $value = explode('=', $value);
    if(count($value)!=2){
        die('Incorrect parameters setting');
    }
    if($value[0]=='--slug'){
        $slug = $value[1];
    }
}
if(!$slug){
  die('Not exist slug paramets');
}

$config = Yaml::parse(file_get_contents(__DIR__.'/config/podcasts.yml'));

if(!isset($config[$slug])){
    die('Slug not exists');
}

// We'll process this feed with all of the default options.
$feed = new SimplePie();
 
// Set the feed to process.
$feed->set_feed_url($config[$slug]['url']);
 
// Run SimplePie.
$feed->init();
 
// This makes sure that the content is sent to the browser as text/html and the UTF-8 character set (since we didn't change it).
$feed->handle_content_type();
$item = $feed->get_item();
 
echo $item->get_enclosure(0)->get_link( ).PHP_EOL;



?>