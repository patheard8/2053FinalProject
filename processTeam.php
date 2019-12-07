<?php include 'header.php';?>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $team_name = $_POST["team_name"];
        $players = $_POST["players"];

        $file = "data/teams.txt";
        if(!is_file($file))
        {
            file_put_contents($file, "");
        }
        file_put_contents($file, "");

        $current = file_get_contents($file);
        $current .= "$team_name,$players\n";
        
        file_put_contents($file, $current);
    } 
?>

<!DOCTYPE html>
<html>
  <body>
    <a href="viewTeams.php">Click here to view your team!</a></p>
  </body>
</html>