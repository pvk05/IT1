<!DOCTYPE html>
<html>
    <head>
        <title>LeaderBoard Using PHP</title>
    </head>
  
    <body>
        <h2>Leaderboard</h2>
        <table>
            <tr>
                <td>Ranking</td>
                <td>Name</td>
                <td>Scores</td>
            </tr>

<?php
$host='sql108.epizy.com'; //mysql host name
$user='epiz_33091760';  //mysql username   
$pass='FKT9yIbSQ5';   //mysql password
$db='epiz_33091760_highscores'; //mysql database

// Create connection
$con = new mysqli($host, $user, $pass, $db);
// Check connection
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
$name = $_POST["name"];
$score = $_POST["score"];

//echo $_POST["name"]. $_POST["score"];
$insert = "INSERT INTO Scores (Name, Score) VALUES ('${name}', '${score}')";

if ($con->query($insert) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $insert . "<br>" . $con->error;
}

$result = mysqli_query($con, "SELECT Name, 
Score FROM Scores ORDER BY Score DESC");

$ranking = 1;

if (mysqli_num_rows($result)) {
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>
        <td>{$ranking}</td>
        <td>{$row['Name']}</td>
        <td>{$row['Score']}</td>
        </tr>";
        $ranking++;
    }
}

$con->close();
?>
</table>
</body>
</html>
