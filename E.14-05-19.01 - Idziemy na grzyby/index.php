<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grzybobranie</title>
    <link rel="stylesheet" href="styl5.css">
</head>
<body>
    <section id="halo">
        <div id="halo1" ><a href="borowik.jpg"><img src="borowik-miniatura.jpg" alt="Grzybobranie"></a></div>
        <div id="halo2"><h1>Idziemy na grzyby :00</h1></div>
    </section>
    <section id="elo">
        <div id="elo1">
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $db = "dane2";

            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $db);

            // Check connection
            if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "SELECT nazwa_pliku, potoczna from grzyby;";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                echo "<img src=".$row["nazwa_pliku"]. " alt=". $row["potoczna"].">";
            }
            } else {
            echo "0 results";
            }

            mysqli_close($conn);
        ?>
        </div>
        <div id="elo2">
            <h2>Grzyby jadalne</h2>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $db = "dane2";

            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $db);

            // Check connection
            if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "SELECT grzyby.nazwa AS nazwaGrzyba, grzyby.potoczna AS nazwaPotoczna, rodzina.nazwa AS rodzina from grzyby inner JOIN rodzina ON grzyby.rodzina_id = rodzina.id WHERE potrawy_id = 1;";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                echo "<p>" . $row["nazwaGrzyba"]."  ". $row["nazwaPotoczna"]."  ".  $row["rodzina"]. "</p>";
            }
            } else {
            echo "0 results";
            }

            mysqli_close($conn);
        ?>
            <h2>Polecamy do sosów</h2>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $db = "dane2";

            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $db);

            // Check connection
            if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "SELECT grzyby.nazwa AS nazwaGrzyba, grzyby.potoczna AS nazwaPotoczna, rodzina.nazwa AS rodzina from grzyby inner JOIN rodzina ON grzyby.rodzina_id = rodzina.id WHERE potrawy_id = 1;";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
            echo "<ol>";
            while($row = mysqli_fetch_assoc($result)) {
                echo "<li>nazwa: " . $row["nazwaGrzyba"]."  (". $row["nazwaPotoczna"].")  rodzina: ".  $row["rodzina"]. "</li>";
            }
            echo "</ol>";
            } else {
            echo "0 results";
            }

            mysqli_close($conn);
        ?>
        </div>
    </section>
    <footer>
        <p>autor: eo</p>
    </footer>
</body>
</html>