<?php
session_start();
$con = new mysqli("localhost", "root", "", "filmy");
$sql = "SELECT * FROM `films` WHERE 1;";
$res = $con->query($sql);
echo "<h1>Wszystkie filmy:</h1>";
while ($row = $res->fetch_assoc()) {
    echo "<div class='film'>";
    echo $row["Title"];
    echo "<a href='movie-details.php?idfilm=".$row["id"]."'>   Pokaz szczegoly filmu</a>";
    echo "</div>";
}
$sql = "SELECT * FROM `films` WHERE `Confirmed` is NULL;";
$res = $con->query($sql);
echo "<h1>Niezaakceptowane filmy:</h1>";
while ($row = $res->fetch_assoc()) {
    echo "<div class='film'>";
    echo $row["Title"];
    echo "<a href='movie-details.php?idfilm=".$row["id"]."'>   Pokaz szczegoly filmu</a>";
    echo "</div>";
}

?>