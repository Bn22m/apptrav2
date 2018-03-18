<?php
/* 
 * skybookingb.php
 * @author Brian.
 */
include 'header.php';
if(isset($_REQUEST['book']))
{
    $date2 = filter_input(INPUT_POST, 'tdate');
    $from = filter_input(INPUT_POST, 'from');
    $to = filter_input(INPUT_POST, 'to');
    $time = filter_input(INPUT_POST, 'time');
    $fnumber = filter_input(INPUT_POST, 'fnumber');
    $yearb = filter_input(INPUT_POST, 'yearb');
    $monthb = filter_input(INPUT_POST, 'monthb');
    $dayb = filter_input(INPUT_POST, 'dayb');
    $bd = bd($yearb,$monthb,$dayb,$time);
    $dateb = $bd[2];
    $price = 800;
    if($from == "Johannesburg")
    {
        $price = 500;
    }
    elseif($from == "Durban")
    {
        $price = 600;
    }
    elseif($from == "CapeTown")
    {
        $price = 700;
    }
    if($from == $to)
    {
        $message = "No: ".$from ." to ". $to;
        header("Location: skybookings.php?message=$message");
        exit();
    }
    if($bd[3] == 0)
    {
        $message = $dateb.' Is Gone! ';
        header("Location: skybookings.php?message=$message");
        exit();
    }
    
}
elseif($_POST['info'])
{
    header("Location: mytravelapp.php");
    exit();
}
if(!isset($_REQUEST['book']))
{
    header("Location: skybookings.php");
    exit();
}
?>

<table>
    <form action='skybookingc.php' method='POST'>
    <tr><td>Name:</td>
        <td><input name="name" type="text" value="" required="true" maxlength="29"/></td>
    </tr>
    <tr><td>Email:</td>
        <td><input name="email" type="email" value="" required="true" maxlength="29"/></td>
    </tr>
    <tr><td>Date:</td>
        <td><input name="tdate" type="date" value="<?php echo "$date2"; ?>" required="true" readonly="true"/></td>
    </tr>
    <tr><td>Price:</td>
        <td><input name="price" type="number" value="<?php echo "$price"; ?>" min="0" readonly="true"/></td>
    </tr>
    <tr><td>Flight Number:</td>
        <td><input name="fnumber" type="number" value="<?php echo "$fnumber"; ?>" required="true" min="0" readonly="true"/></td> 
    <tr><td>From:</td>
        <td><input name="from" type="text" value="<?php echo "$from"; ?>" required="true" readonly="true"/></td>
    </tr>
    <tr><td>To:</td>
        <td><input name="to" type="text" value="<?php echo "$to"; ?>" required="true" readonly="true"/></td>
    </tr>
    <tr><td>Time:</td>
        <td><input name="time" type="text" value="<?php echo "$time"; ?>" required="true" readonly="true"/></td>
    </tr>
    <tr><td>Date Booked for:</td>
        <td><input name="date" type="date" value="<?php echo "$dateb"; ?>" required="true" readonly="true"/></td>
    </tr>
    <tr>
        <td><input type="submit" name="book2" value="Book"/></td>
    </tr>
</form>
</table>
<?php
function bd($y,$m,$d,$t,$i=0,$s=0)
{
    $client2 = new SoapClient(null, array(
      'location' => "http://localhost/phpwebsrs/simplesever.php",
      'uri'      => "urn://sps/sev"));

    $result2 = $client2->__soapCall("testd", array($y,$m,$d,$t,$i,$s));
    return $result2;
}
?>
<?php
include 'footer.php';
?>
