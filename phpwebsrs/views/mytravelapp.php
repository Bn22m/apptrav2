<?php

/* 
 * mytravelapp.php
 * @author Brian.
 */
require ('header.php');
$messg = 'Start.';

if(isset($_REQUEST['search']))
{
    $bnb = filter_input(INPUT_GET, 'bnb', FILTER_SANITIZE_STRIPPED);
    $location = filter_input(INPUT_GET, 'location', FILTER_SANITIZE_STRIPPED);
    $price = filter_input(INPUT_GET, 'price', FILTER_SANITIZE_STRIPPED);
    $date = filter_input(INPUT_GET, 'date', FILTER_SANITIZE_STRIPPED);
    //$bnb2 = gettype($bnb);
    //$price2 = gettype($price);
    //$date2 = gettype($date);
    $messg = "Searching..".$date."..".$bnb."..".$price."..".$location;
}
else 
{
    $messg = "Enjoy!";       
}
$date1 = date("Y/m/d");
?>
    <script src="../public/jquery/jquery-1.js"></script>
    <script src="../public/jquery/jquery-ui.js"></script>
    <link rel="stylesheet" href="../public/jquery/jquery-ui.css" />
    <link rel="stylesheet" href="../public/jquery/style.css">
    <script>
	    $( function() {
            $( "#date" ).datepicker({
			    numberOfMonths: 1,
			    showButtonPanel: true,
                dateFormat: "yy/mm/dd"
		    });
	    } );
	</script>
<h3>Search for open space:</h3>
<table>
<form action='mytravelapp.php' method='GET'>
    <tr><td>Bed And Breakfast:</td>
        <td><input name="bnb" type="text" value="BnB" required="true" maxlength="20"/></td>
    </tr>
    <tr><td>Location:</td>
        <td><select name="location">
                <option selected="selected" value="All">All</option>
                <option value="CapeTown">Cape Town</option>
                <option value="Johannesburg">Johannesburg</option>
                <option value="Durban">Durban</option>
            </select></td>
    </tr>
    <tr><td>Date:</td>
        <td><input name="date" id="date" type="text" value="<?php echo "$date1"; ?>" required="true" maxlength="30"/></td> 
    <tr><td>Price:</td>
        <td><input name="price" type="number" value="" min="0" max="999999999999"/></td>
    </tr>
    <tr><td>Message:</td>
        <td><?php echo " $messg "; ?></td>
    </tr>    
    <tr>
        <td><input type="submit" name="search" value="Search"/></td>
    </tr>
</form>
</table>
<br><hr><br>

<div>
    <?php
    if($_GET)
    {
        print '<p>
                <a href="skybookings.php">Skye Booking</a>
                <a href="forexapitpl.php">Forex</a>
                </p> <br>';
        print 'Results:<br>';
        require ('../libs/bnbclient.php');
    }
    ?>
</div>
<br>
<p>
    <a href="skybookings.php">Skye Booking</a>
    <a href="forexapitpl.php">Forex</a>
</p>
<?php
require ('footer.php');
?>