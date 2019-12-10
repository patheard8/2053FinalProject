<?php include 'header.php';?>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $team_name = $_POST["team_name"];
        $player1 = $_POST["player1"];
        $player2 = $_POST["player2"];
        $player3 = $_POST["player3"];
        $player4 = $_POST["player4"];
        $player5 = $_POST["player5"];
        $endOfLine = $_POST["player5"];
        $file = "data/teams.txt";
        if(!is_file($file))
        {
            file_put_contents($file, "");
        }
        $current = file_get_contents($file);
        $current .= "$team_name,$player1,$player2,$player3,$player4,$player5,$endOfLine\n";
        
        file_put_contents($file, $current);
    } 
?>

<!DOCTYPE html>
<html>
  <body>
    <p><a href="viewTeams.php">Click here to view your team!</a></p>
  </body>
</html>