<?php include 'header2.php' ?>
<?php
    //read teams file
    function readTeamsFile() 
    {
        // read the file into memory; if there is an error then stop processing
        $arr = file("data/teams.txt") or die('ERROR: Cannot find file');
        // our data is comma-delimited
        $delimiter = ',';
        $teams = array();
        // loop through each line of the file
        foreach ($arr as $line) 
        {  
            // explode returns an array of strings where each element in the array
            // corresponds to each substring between the delimiters
            $splitcontents = explode($delimiter, $line);       
            $team = array();
            $team['teamName'] = $splitcontents[0];
            $team['player1'] = $splitcontents[1];
            $team['player2'] = $splitcontents[2];
            $team['player3'] = $splitcontents[3];
            $team['player4'] = $splitcontents[4];
            $team['player5'] = $splitcontents[5];
            $teams[$team['teamName']] = $team;
        }
        return $teams;
    }
    function adjustPlayerName(&$player)
    {
        $spaceIndex = 0;
        for($i = 0; $i < strlen($player); $i++)
            if($player[$i] == ' ')
                $spaceIndex = $i;
        $playerQuery = $player[0].'.'. (substr($player, $spaceIndex + 1));
        return $playerQuery;
    }
    function getPlayerData(&$player)
    {
        $url = 'https://profootballapi.com/players';
        $api_key = 'EJKgao14kLi7ZRlPAwQn6CVpM3UIrHmd';
        $query_string = 'api_key='.$api_key.'&stats_type=offense&year=2019&week=13&player_name='.adjustPlayerName($player);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $query_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        
        $result = curl_exec($ch);
        curl_close($ch);
        
        $str_arr = explode (",", $result);
        error_reporting(0);
        
        return $str_arr[1] . '   ' . $str_arr[2] . '   ' . $str_arr[3] . '   ' . $str_arr[4] . '   ' . $str_arr[5];
    }
?>

<table class="mdl-data-table  mdl-shadow--2dp">
    <thead>
        <tr>
            <th>Teams</th>
            <th>Players</th>
            <th>Stats</th>
        </tr>
    </thead>
    <tbody>

    <?php
        $teams = readTeamsFile();
        foreach ($teams as $team) 
        {
            echo '<tr>';
                echo '<td>' . '</td>';
                echo "<td id = 'p1'>" . $team['player1'] . '</td>';
                echo '<td>' . getPlayerData($team['player1']) . '</td>';
            echo '</tr>';
            echo '<tr>';
                echo '<td>' . '</td>';
                echo "<td id = 'p2'>" . $team['player2'] . '</td>';
                echo '<td>' . getPlayerData($team['player2']) . '</td>';
            echo '</tr>';
            echo '<tr>';
                echo '<td>' . $team['teamName'] . '</td>';
                echo "<td id = 'p3'>" . $team['player3'] . '</td>';
                echo '<td>' . getPlayerData($team['player3']) . '</td>';
            echo '</tr>';
            echo '<tr>';
                echo '<td>' .  '</td>';
                echo "<td id = 'p4'>" . $team['player4'] . '</td>';
                echo '<td>' . getPlayerData($team['player4']) . '</td>';
            echo '</tr>';
            echo "<tr id = 'r5'>";
                echo '<td>' . '</td>';
                echo "<td id = 'p5'>" . $team['player5'] . '</td>';
                echo '<td>' . getPlayerData($team['player5']) . '</td>';
            echo '</tr>';
            
            
           
        } 
    ?>            
</tbody>
</table>
<img src = "images/pic4.jpg" id = "pic4">
<img src = "images/player2.jpg" id = "pla2">
