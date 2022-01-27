<?php
include('includes/config.php');
include('includes/credentials.php');


$sql = 'SELECT * FROM beers';

//connect
$iConn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die(myError(__FILE__,__LINE__, mysqli_connect_error()));

// query results
$result = mysqli_query($iConn, $sql) or die(myError(__FILE__,__LINE__, mysqli_connect_error($iConn)));


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <header>Beer Menu</header>
        <table>
            <tr>
                <th>Beer Name</th>
                <th>Brewery</th>
                <th>ABV</th>
                <th>Price</th>
            </tr>
        
        <?php
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                echo '<tr>';
                echo '<td>'.$row['beerName'].'</td>';
                echo '<td>'.$row['beerBrewery'].'</td>';
                echo '<td>'.$row['beerABV'].'</td>';
                echo '<td>'.$row['beerPrice'].'</td>';
                echo '</tr>';;
            }
        }
        ?>
        </table>
    </body>
</html>