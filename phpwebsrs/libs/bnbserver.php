<?php

/* 
 * bnbserver.php
 * @author Brian.
 */
include "../configs/dbconfig.php";
include "../configs/dbconn.php";

$info = TRUE;

function bnbsearch($bnb, $location, $date, $price )
{
    global $info;
    $info = FALSE;
    $search = ' ';
    try 
    {
        $mysqli = connDB();
        $bnb2 = filter_var($bnb, FILTER_SANITIZE_STRIPPED);
        $location2 = filter_var($location, FILTER_SANITIZE_STRIPPED);
        $date2 = filter_var($date, FILTER_SANITIZE_STRIPPED);
        $price2 = filter_var($price, FILTER_SANITIZE_STRIPPED);
        if($location2 == "All")
        {
            $query = 'SELECT * FROM bnb';
            $stmt = $mysqli->prepare($query);
        }
        else 
        {
            $query = 'SELECT * FROM bnb where location = ?';
            $stmt = $mysqli->prepare($query);
            $stmt->bind_param("s", $location2);
        }
        $rs = $stmt->execute();
        $rsr = $stmt->get_result();
        foreach ($rsr as $q)
        {
            $id = $q['id'];
            $name = $q['name'];
            $desc = $q['details'];
            $price3 = $q['pricemin'];
            $search .= '<tr><td>'.$id.'</td><td>'.$name.'</td><td>'.$desc.'</td><td>'.$price3.'</td></tr>';
        }
        $stmt->close();
        $p1 = "RS : $rs";
        $p2 = '<tr><td>'.$p1.'</td><td>'.$bnb2.'</td><td>'.$location2.' '.$date2.'</td><td>'.$price2.'</td></tr><br>';
        $search .= $p2;
        return $search;        
    } 
    catch (Exception $ex) 
    {
        $search .= "<br> \n $ex <br>";
    }
    
    catch (SoapFault $sf)
    {
        $search .= "<br> \n $sf <br>";
    }
 
    return $search;
}

$server = new SoapServer(NULL, array('uri' => "urn://travel/db"));
$server->addFunction('bnbsearch');
$server->handle();
if($info)
{
    header("Location: mytravelapp.php");
    exit();
}
?>