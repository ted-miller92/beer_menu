<?php
//editMenu.php
include('includes/config.php');
include('includes/credentials.php');
if(isset($_POST['beerName'])){
    
    $iConn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die(myError(__FILE__,__LINE__, mysqli_connect_error()));

    $beerID = $_POST['beerID'];
    $beerName = $_POST['beerName'];
    $beerBrewery = $_POST['beerBrewery'];
    $beerABV = $_POST['beerABV'];
    $beerPrice = $_POST['beerPrice'];

    $sql = 'UPDATE beers SET 
        beerName="'.$beerName.'",
        beerBrewery="'.$beerBrewery.'",
        beerABV='.$beerABV.',
        beerPrice='.$beerPrice.'
        WHERE beerID='.$beerID.'
        ';
    
    if (!$iConn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    if (mysqli_query($iConn, $sql)) {
        echo "great success!";
        echo "<a href=''>Back to Edit Menu page</a>";
	} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($iConn);
	}
    // close connection
    mysqli_free_result($result);
    mysqli_close($iConn);
}else{
    echo '
        <form action="" method="POST">
            <p>Beer #: <select name="beerID">
                    <option value=1>1</option>
                    <option value=2>2</option>
                    <option value=3>3</option>
                    <option value=4>4</option>
                    <option value=5>5</option>
                    <option value=6>6</option>
                </select></p>
            <p>Beer Name:<input type="text" name="beerName"></p>
            <p>Beer Brewery:<input type="text" name="beerBrewery"></p>
            <p>Beer ABV:<input type="text" name="beerABV"></p>
            <p>Beer Price:<input type="text" name="beerPrice"></p>
        
            <input type="submit">
            </form>
        
    ';
}




?>