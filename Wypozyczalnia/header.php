<div class="glowacz">
<a href="index.php"><h1>Wypożyczalnia</h1></a>
<link rel="stylesheet" href="css/styl.css">
</div>
<div class="glowacz2">
<a href="sites/movie-search.php">Wyszukaj</a>


<?php
session_start();
if (isset($_SESSION["id"]) && !empty($_SESSION["id"])) {
    echo "<a href='sites/logout.php'>Wyloguj</a>";
    echo "<a href='sites/movie-add.php'> Dodaj swój film! </a>";
    echo "<a href='sites/movie-my.php'> Pokaz swoje filmy! </a>";
}
else {
    echo "<a href='sites/login.php'>Zaloguj</a>
    <a href='sites/register.php'>Zarejestruj</a>";
}
?>

</div>