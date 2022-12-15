<?php
session_start();

$con = new mysqli("localhost", "root", "", "filmy");
if(isset($_POST["Confirmation"])){
    $sql = "UPDATE `films` SET `Confirmed`='1' WHERE id='".$_GET["idfilm"]."'";
    $con->query($sql);
}


$sql = "SELECT f.id, `Title`, `Description`, `Ratings`, `Director`, `Confirmed`, `Borrowed_By`, g.Genere, `Users_id` FROM `films` as f JOIN generes as g ON g.id=f.Generes_id WHERE f.id='".$_GET["idfilm"]."';";
$res = $con->query($sql);
$_row = $res->fetch_assoc();
echo "tytul: " . $_row['Title'] . "<br>";
echo "opis: " . $_row['Description'] . "<br>";
echo "rezyser: " . $_row['Director'] . "<br>";
echo "gatunek: " . $_row['Genere'] . "<br>";
if($_row["Confirmed"]==NULL){
    echo "<form method='post'>
    <input type='hidden' name='Confirmation' value='1'>
    <input type='submit' value='Zatwierdz film'>
       
    </form>";
}

?>