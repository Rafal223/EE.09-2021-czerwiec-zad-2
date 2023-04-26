<!DOCTYPE html>
<html lang="pl">
<head>
    <link rel="stylesheet" href="styl2.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warzywniak</title>
</head>
<body>
    <div class="lewy"><h1>Internetowy sklep z eko-warzywami</h1></div>
    <div class="prawy">
        <ol>
            <li>warzywa</li>
            <li>owoce</li>
            <li><a href="https://terapiasokami.pl/">soki</a></li>
        </ol>
    </div>
    <div class="glowny">
        <?php
            $dir = new mysqli("127.0.0.1","root","","dane2");
            $sql = "SELECT produkty.nazwa,produkty.ilosc,produkty.opis,produkty.cena,produkty.zdjecie FROM produkty WHERE produkty.Rodzaje_id=1 OR produkty.Rodzaje_id=2;";
            $wyslij = $dir->query($sql);
            $cos = $wyslij->fetch_all();

            for($i=0;$i<count($cos);$i++)
            {
                echo "<div class='blok'><img src=".$cos[$i][4]." alt='warzywniak''>";
                echo "<h5>".$cos[$i][0]."</h5>";
                echo "<p>opis: ".$cos[$i][2]."</p>";
                echo "<p>na stanie: ".$cos[$i][1]."</p>";
                echo "<h2>".$cos[$i][3]."zł</h2>";
                echo "</div>";
            }

            $dir -> close();
        ?>
    </div>
    <div class="stopka">
    <form method="POST">
        Nazwa:<input name="nazwa">
        Cena:<input name="cena">
        <input type=submit value="Dodaj produkt"><br>
        Stronę wykonał: 0000000000
    </form>
    <?php
        $dir = new mysqli("127.0.0.1","root","","dane2");

        if(isset($_POST["nazwa"]) && isset($_POST["cena"]))
        {
            $sql = "INSERT INTO `produkty` (`id`, `Rodzaje_id`, `Producenci_id`, `nazwa`, `ilosc`, `opis`, `cena`, `zdjecie`) VALUES (NULL, '1', '4', '".$_POST["nazwa"]."', '10', NULL, '".$_POST["cena"]."', 'owoce.jpg');";
            $wyslij = $dir->query($sql);
        }

        $dir -> close();
    ?>
    </div>
</body>
</html>