<?php


    try {
        // $thread_id = $_GET['thread_id'];
        // exec("php getthread.php $thread_id 2>&1" , $output, $return);
        // var_dump($output);

        // exit();
        
        $threadJSON = file_get_contents("thread.json");
        $thread = json_decode($threadJSON);

        echo $thread->thread->users[0]->username. "<br>";
        echo $thread->thread->users[0]->full_name. "<br>";
        echo "<img src='".$thread->thread->users[0]->profile_pic_url."' ><br>";
        
        $messages = $thread->thread->items;

        function cmp($a, $b)
        {
            return strcmp($a->timestamp, $b->timestamp);
        }

        usort($messages, "cmp");

        foreach ($messages as $message) {
            $user = "me";
            if ($message->user_id == $thread->thread->users[0]->pk){
                $user = $thread->thread->users[0]->username;
            }
            print($user . ": " . $message->text."\n<br><br>");
        }

    } catch (\Exception $e) {
        echo 'Something went wrong: '.$e->getMessage()."\n";
    }


?>