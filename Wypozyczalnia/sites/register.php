<html>
    <head>
        <title>Rejestracja</title>
        <link rel="stylesheet" href="styl.css">
    </head>
    
    
    <body>
        <?php
        $con = new mysqli("localhost", "root", "", "filmy");
        if(isset($_POST["imie"]) && isset($_POST["nazwisko"]) && isset($_POST["haslo"]) && isset($_POST["nazwa"])){
            $sql = "INSERT INTO `users`(`id`, `Name`, `Surname`, `Films_Borrowed`, `Password`, `Login`) VALUES ('NULL','".$_POST['imie']."','".$_POST['nazwisko']."', '', '".$_POST['haslo']."','".$_POST['nazwa']."')";
            $con->query($sql);
                
            header('Location: '.'index.php');    
        }

        ?>
        <form method="post">
            <p>Podaj imie:</p>
            <input name="imie">
            <p>Podaj nazwisko:</p>
            <input name="nazwisko">
            <p>Podaj hasło:</p>
            <input name="haslo" type="password">
            <p>Podaj login:</p>
            <input name="nazwa"><br><br>
            <input type="submit" value="Zarejestruj Esse">
        </form>    
    </body>
        
    
    
</html>