<?php
session_start();
$con = new mysqli("localhost", "root", "", "filmy");
$sql = "SELECT * FROM `films` WHERE `Confirmed` != 'NULL';";
$res = $con->query($sql);
while ($row = $res->fetch_assoc()) {
    echo "<div class='film'>";
    echo $row["Title"];
    echo "<a href='movie-details.php?idfilm=".$row["id"]."'>   Pokaz szczegoly filmu</a>";
    echo "</div>";
}

?>