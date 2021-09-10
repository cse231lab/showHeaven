<?php

// require_once("db/db.php");
require_once("db/show.php");
require_once("db/episode.php");
require_once("db/season.php");
require_once("db/usertable.php");

    // createShowTable();
    // createSeasonTable();
    // createEpisodeTable();

    // truncShows();
    // createShow('Code Geass', 'This is Code Geass', '2000-01-01', 1);
    // createShow('The Witcher', 'This is The Witcher', '2000-01-01', 1);
    // createShow('Breaking Bad', 'This is Breaking Bad', '2000-01-01', 1);

     // createSeason('Season 4',4,1);

    // createEpisode(4,1,'Episode 4');
    // $res = retrieveEpisodeList(1);
    // var_dump($res);

    // $res = retrieveShowList();
    // foreach($res as $arr)
    // {
    //     echo '<h1>'.$arr['name']."<br>".'</h1>';
    // }

    // $var = retrieveShow(3);

    // echo '<br>';
    // foreach($var as $x)
    // {
    //     echo $x.'<br>';
    // }

    echo var_dump(retrieveShowList('Wit'));

   

    


?>

