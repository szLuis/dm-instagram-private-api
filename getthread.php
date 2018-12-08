<?php

set_time_limit(0);
date_default_timezone_set('UTC');
require __DIR__.'/vendor/autoload.php';

if (defined('STDIN')) {
    $thread_id = $argv[1];
  } 


/////// CONFIG ///////
$username = '_szluis';
$password = '*/*14iGram31*/*';
$debug = true;
$truncatedDebug = false;
//////////////////////

$ig = new \InstagramAPI\Instagram($debug, $truncatedDebug);

try {
    $ig->login($username, $password);
} catch (\Exception $e) {
    echo 'Something went wrong: '.$e->getMessage()."\n";
    exit(0);
}


    try {
        $thread = $ig->direct->getThread($thread_id);

        file_put_contents("thread.json", $thread);

    } catch (\Exception $e) {
        echo 'Something went wrong: '.$e->getMessage()."\n";
    }


?>


?>