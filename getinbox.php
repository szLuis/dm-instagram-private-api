<?php
set_time_limit(0);
date_default_timezone_set('UTC');
require __DIR__.'/vendor/autoload.php';

/////// CONFIG ///////
$username = '';
$password = '';
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
        $inbox  = $ig->direct->getInbox();
        file_put_contents("inbox.json", $inbox);
    } catch (\Exception $e) {
        echo 'Something went wrong: '.$e->getMessage()."\n";
    }


?>