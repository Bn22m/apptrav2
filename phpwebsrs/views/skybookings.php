<?php
/* 
 * skybookings.php
 * @author Brian.
 */
include '../views/header.php';
$message = "Enjoy!";
if($_REQUEST)
{
    $message = filter_input(INPUT_GET, 'message', FILTER_SANITIZE_STRIPPED);
}
?>
<table>
    <form action='skybookingb.php' method='POST'>
    <tr><td>Date:</td>
        <td><input name="tdate" type="date" value="<?php echo date("Y/m/d H:i:s"); ?>" readonly="true" required /></td>
    </tr> 
    <tr><td>Flight number:</td>
        <td><input name="fnumber" type="number" value="767" required="true" min="0" max="999999999999999999999"/></td>
    </tr>
    <tr><td>Price:</td>
        <td><input name="price" type="number" value="" min="0" max="9999999999999"/></td>
    </tr>
    <tr><td>From:</td>
        <td><select name="from">
                <option selected="selected" value="Johannesburg">Johannesburg</option>
                <option value="Durban">Durban</option>
                <option value="CapeTown">Cape Town</option>
            </select></td> 
    </tr>
    <tr><td>To:</td>
        <td><select name="to">
                <option selected="selected" value="Durban">Durban</option>
                <option value="CapeTown">Cape Town</option>
                <option value="Johannesburg">Johannesburg</option>
            </select></td>
    </tr>
    <tr><td>Time:</td>
        <td><select name="time">
                <option selected="selected" value="06:00:00">6h00</option>
                <option value="08:00:00">8h00</option>
                <option value="10:00:00">10h00</option>
                <option value="14:00:00">14h00</option>
                <option value="20:00:00">20h00</option>
            </select></td>
    </tr>
    <tr><td>Select Date:</td>
        <td><select name="yearb">
                <option selected="selected" value="<?php echo date('Y'); ?>"><?php echo date('Y');?></option>
                <option value="<?php echo date('Y')+1;?>"><?php echo date('Y')+1;?></option>
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
        </td>
    </tr>
    <tr><td>Message:</td>
        <td><?php echo " $message " ?></td>
    </tr>
    <tr>
        <td><input type="submit" name="info" value="Info"/></td>
    </tr>
    <tr>
        <td><input type="submit" name="book" value="book"/></td>
    </tr>
</form>
</table>
<div> 
</div>
<p>
   <img src="../myp2.jpg"> 
</p>

<?php
include "../views/footer.php";
?>
