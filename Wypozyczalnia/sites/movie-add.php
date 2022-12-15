<html>
    <head>
        <title>Dodawanie filmu</title>
        <link rel="stylesheet" href="styl.css">
    </head>
    
    
    <body>
        <?php
        session_start();
        $con = new mysqli("localhost", "root", "", "filmy");
        if(isset($_POST["tytul"]) && isset($_POST["opis"]) && isset($_POST["rezyser"])&& isset($_POST["gatunek"])){
            $sql = "INSERT INTO `films` (`id`, `Title`, `Description`, `Ratings`, `Director`, `Confirmed`, `Borrowed_By`, `Generes_id`, `Users_id`) VALUES (NULL, '".$_POST["tytul"]."', '".$_POST["opis"]."', NULL, '".$_POST["rezyser"]."', NULL, NULL, '".$_POST["gatunek"]."', '".$_SESSION["id"]."');";
            $con->query($sql);
                
            header('Location: '.'/Wypozyczalnia/index.php');    
        }

        ?>
        <form method="post">
            <p>Podaj tytuł:</p>
            <input name="tytul">
            <p>Nadaj opis:</p>
            <input name="opis">
            <p>Podaj reżysera:</p>
            <input name="rezyser">
            <p>Nadaj Gatunek:</p>
            <select name="gatunek">
                <?php
                $sql = "SELECT * FROM `generes` WHERE 1";
                $res = $con->query($sql);
                while($row=$res->fetch_assoc()){
                    echo "<option value='" . $row["id"] . "'>" . $row["Genere"] . "</option>";
                }

                ?>
            </select>
            <input type="submit" value="Dodaj Film">
        </form>    
    </body>
        
    
    
</html>