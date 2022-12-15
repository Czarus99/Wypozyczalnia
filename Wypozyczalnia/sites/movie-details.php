<?php
session_start();
if(!isset($_GET["idfilm"])){
header('Location: ' . './movie-search.php');
}

$con = new mysqli("localhost", "root", "", "filmy");
$sql = "SELECT f.id, `Title`, `Description`, `Ratings`, `Director`, `Confirmed`, `Borrowed_By`, g.Genere, `Users_id` FROM `films` as f JOIN generes as g ON g.id=f.Generes_id WHERE f.id='".$_GET["idfilm"]."';";
$res = $con->query($sql);
$_row = $res->fetch_assoc();
echo "tytul: " . $_row['Title'] . "<br>";
echo "opis: " . $_row['Description'] . "<br>";
echo "rezyser: " . $_row['Director'] . "<br>";
echo "gatunek: " . $_row['Genere'] . "<br>";


?>