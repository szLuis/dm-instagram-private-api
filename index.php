<?php

$inboxJSON = file_get_contents("inbox.json");
$inbox = json_decode($inboxJSON);

$threads = $inbox->inbox->threads;

foreach ($threads as $thread) {
    echo "<a href='showthread.php?thread_id=" . $thread->thread_id . "'>" . $thread->users[0]->username . " ---> " .$thread->users[0]->full_name. "</a><br>";
}


?>