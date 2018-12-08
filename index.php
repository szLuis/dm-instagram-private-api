<?php

$inboxJSON = file_get_contents("inbox.json");
$inbox = json_decode($inboxJSON);

$threads = $inbox->inbox->threads;
$i=0;
foreach ($threads as $thread) {
    if ($i===3) break;
    if ($i < 1)
    echo "<a href='showthread.php?thread_id=" . $thread->thread_id . "'>" . $thread->users[0]->username . " ---> " .$thread->users[0]->full_name. "</a><br>";
    else
     echo $thread->users[0]->username . " ---> " .$thread->users[0]->full_name. "<br>";
    $i++;
}


?>