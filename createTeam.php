<?php include 'header1.php'; ?>
<form method = "post" enctype = "multipart/form-data" action = "processTeam.php">
    <body>
        <h3>Add Player Details</h3>
        <p>Your Name <br>
            <input type = "text" name = "team_name">
        </p>
        <p>Player 1's Name:<br>
            <input type = "text" name = "player1">
        </p>
        <p>Player 2's Name:<br>
            <input type = "text" name = "player2">
        </p>
        <p>Player 3's Name:<br>
            <input type = "text" name = "player3">
        </p>
        <p>Player 4's Name:<br>
            <input type = "text" name = "player4">
        </p>
        <p>Player 5's Name:<br>
            <input type = "text" name = "player5">
        </p>
        <p><input type = "submit"></p>
        <img src = "images/pic2.jpg" id = "pic2">
        <img src = "images/pic3.jpg" id = "pic3">

    </body>
</form>