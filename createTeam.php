<?php include 'header.php'; ?>
<form method = "post" enctype = "multipart/form-data" action = "processTeam.php">
    <body>
        <h3>Add Player Details</h3>
        <p>*Note* We do not have statistical data on all players</p>
        <p>Format for entering players ex: C.Wentz, T.Brady, M.Thomas, D.Brees, P.Rivers</p>
        <p>Your Name <br>
            <input type = "text" name = "team_name">
        </p>
        <p>Your Players (enter according to proper format: First initial + . + Lastname, separated by a comma)<br>
            <input type = "text" name = "players">
        </p>
        <input type = "submit">
    </body>
</form>