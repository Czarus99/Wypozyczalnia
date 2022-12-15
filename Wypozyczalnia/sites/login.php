<?php
session_start();
$con = new mysqli("localhost", "root", "", "filmy");
        if (!empty($_SESSION["id"]))
            header('Location: ' . '/Wypozyczalnia/index.php');


        if (isset($_POST["login"]) && !empty($_POST["login"]) && isset($_POST["password"]) && !empty($_POST["password"])) {
            $sql = "SELECT ID FROM `users` WHERE Password='" . $_POST['password'] . "' and Login='" . $_POST['login'] . "';";
            $wys = $con->query($sql);
            $wynik = $wys->fetch_array();
            if (!empty($wynik["ID"])) {
                $_SESSION["id"]=$wynik["ID"];
                header('Location: ' . '/Wypozyczalnia/index.php');
            }

        }

        if (isset($_SESSION["logged"]) && !empty($_SESSION["logged"])) {
            echo "<a href='movie-add.php> Dodaj swój film! </a>'";

        } else {
            echo "<h1>LOGOWANIE</h1>
                <br>
                <br>
                <form method='post'>
                    <h3>Podaj login:</h3>
                    <input type='text' name='login'><br>
                    <h3>Podaj haslo:</h3>
                    <input type='password'' name='password''><br>
                    <br><input type='submit' value='Zaloguj'>
                </form>";
        }

        $con->close();
        ?>