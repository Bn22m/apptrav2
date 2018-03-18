<?php

/* 
 * bnbclient.php
 * @author Brian.
 */

try 
{
    if(!$_REQUEST)
    {
        header("Location: mytravelapp.php");
        exit();
    }
    $bnbclient = new SoapClient(NULL, array('location' => "http://localhost/phpwebsrs/bnbserver.php",
                 'uri' => "urn://travel/db"));

    $bnbresult = $bnbclient->__soapCall("bnbsearch", array($bnb, $location, $date, $price));

    if($bnbresult != '')
    {
        print "<table>";
        print "<tr><td><b>Code</b></td>
               <td><b>Name</b></td>
               <td><b>Info</b></td>
               <td><b>Price</b></td></tr>";
        print "$bnbresult</table>";
    }
    
} 
catch (Exception $ex) 
{
    print "Offline: $ex";
}
catch (SoapFault $sf) 
{
    print "Sf: $sf";
}
catch (ErrorException $err)
{
    print ("Err: $err");
}

?>