<?php

/* 
 * simpleclient
 * @author Brian.
 */
$echo = "";
if (isset($_REQUEST['submit']))
{
    $echo2 = filter_input(INPUT_GET, 'input');
    $echo = filter_var($echo2, FILTER_SANITIZE_STRIPPED);
}
print "<h2>Echo Web Service</h2>";
print "<form action='simpleclient.php' method='GET'/>";
print "<input name='input' value='$echo' maxlength='30'/><br/>";
print "<input type='Submit' name='submit' value='GO'/>";
print "</form>";
print "<form action='simpleclient.php' method='GET'/>";
?>     <tr><td>Select Date:</td>
        <td><select name="yearb">
                <option selected="selected" value="<?php echo date('Y'); ?>"><?php echo date('Y');?></option>
                <?php for($x = date('Y')+1; $x < date('Y')+5; $x++)
                {
                    echo "<option value=$x>";
                    echo "$x";
                    echo "</option>";
                } ?>
            </select>
            <select name="monthb">
                <option selected="selected" value="<?php echo date('m'); ?>"><?php echo date('m');?></option>
                <?php for($x=1; $x<13;$x++)
                {
                    echo "<option value=$x>";
                    echo "$x";
                    echo "</option>";
                } ?>
            </select>
            <select name="dayb">
                <option selected="selected" value="<?php echo date('d'); ?>"><?php echo date('d');?></option>
                <?php for($x=1; $x<32;$x++)
                {
                    echo "<option value=$x>";
                    echo "$x";
                    echo "</option>";
                } ?>
            </select>
            <select name="timeb">
                <option selected="selected" value="<?php echo date('H'); ?>"><?php echo date('H');?></option>
                <?php for($x=0; $x<24;$x++)
                {
                    echo "<option value=$x>";
                    echo "$x";
                    echo "</option>";
                } ?>
            </select>
        </td>
    </tr>
<?php   
print "<input type='Submit' name='submit2' value='GO'/>";
print "</form>";

if($echo != ''){
    $client = new SoapClient(null, array(
      'location' => "http://localhost/phpwebsrs/simplesever.php",
      'uri'      => "urn://sps/sev"));

    $result = $client->__soapCall("testa", array($echo));

    print $result;
}

if (isset($_REQUEST['submit2']))
{
    $y = filter_input(INPUT_GET,'yearb');
    $m = filter_input(INPUT_GET,'monthb');
    $d = filter_input(INPUT_GET,'dayb');
    $t = filter_input(INPUT_GET,'timeb');
    $i = 0;
    $s = 0;
    $client2 = new SoapClient(null, array(
      'location' => "http://localhost/phpwebsrs/simplesever.php",
      'uri'      => "urn://sps/sev"));

    $result2 = $client2->__soapCall("testd", array($y,$m,$d,$t,$i,$s));
    
    for($x = 0; $x < count($result2);$x++)
    {
        print $result2[$x].'<br>';
    }
    
   
}


