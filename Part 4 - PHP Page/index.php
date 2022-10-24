<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University</title>
</head>

    <body>
    
        <?php 
        
            define("DB_SERVERNAME", "localhost");
            define("DB_USERNAME", "root");
            define("DB_PASSWORD", "root");
            define("DB_NAME", "db-university");
            define("DB_PORT", 3306);

            $connection = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);
        
            if($connection === false){

                die("Connessione fallita: " . $connection->connect_error);

            }
            else {
                
                echo "<h1> Connessione riuscita! </h1>" . "<br>";

            }

            $sql = "SELECT `name`, `email`  FROM `students`";
            $result = $connection->query($sql);

            if($result && $result->num_rows > 0)  {

                while($row = $result->fetch_assoc()) {

                    echo "<h4 style=display:inline;> Name: </h4>". $row['name'] . "<br>";

                    echo "<h4 style=display:inline;> Email: </h4>". $row['email'] . "<br><br>";

                }

            }  elseif ($result)  {

                    echo "0 results";

                } else{

                    echo "Query error";

                }

            $connection->close();
        
        ?>

    </body>

</html>