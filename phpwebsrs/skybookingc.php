<?php

/* 
 * skybookingc.php
 * @author Brian.
 */
include 'header.php';
include 'dbconfig.php';
include 'dbconn.php';

if(!isset($_REQUEST['book2']))
{
    $message = "Welcome!";
    header("Location: skybookings.php?message=$message");
    exit();
}
$app = new Skybooking();

class Skybooking
{
    var $name;
    var $email;
    var $from;
    var $to;
    var $date;
    var $time;
    var $fnumber;
    var $price;
    var $ref;
    var $title;

    function __construct() 
    {
        $this->title = "Sky e Booking:";
        print ("<tr><td><b>$this->title</b></td></tr>");
        $this->name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRIPPED);
        $this->email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $this->from = filter_input(INPUT_POST, 'from', FILTER_SANITIZE_STRIPPED);
        $this->to = filter_input(INPUT_POST, 'to', FILTER_SANITIZE_STRIPPED);
        $this->date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRIPPED);
        $this->time = filter_input(INPUT_POST, 'time', FILTER_SANITIZE_STRIPPED);
        $this->fnumber = filter_input(INPUT_POST, 'fnumber', FILTER_SANITIZE_STRIPPED);
        $this->price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRIPPED);
        $this->ref = date('YmdHis').''.$this->email;
        print ("<tr><td>Name: $this->name</td></tr>");
        print ("<tr><td>Email: $this->email</td></tr>");
        print ("<tr><td>FromA: $this->from</td></tr>");
        print ("<tr><td>ToB: $this->to</td></tr>");
        print ("<tr><td>DateB: $this->date</td></tr>");
        print ("<tr><td>TimeB: $this->time</td></tr>");
        print ("<tr><td>Fnumber: $this->fnumber</td></tr>");
        print ("<tr><td>Price: $this->price</td></tr>");
        print ("<tr><td>Ref#: $this->ref</td></tr>");
        
        $this->book();
        
    }
    
    function book()
    {
        try 
        {
            $mysqli = connDB();
            $query = "INSERT INTO skyebooking(name, email, froma, tob, dateb, timeb, fnumber, price, ref) "
               . "VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $smt = $mysqli->prepare($query);
            $smt->bind_param("sssssssss", $this->name, $this->email, $this->from, 
               $this->to, $this->date, $this->time, $this->fnumber, $this->price, $this->ref);
            $info = $smt->execute();
            $smt->close();
            $mysqli->close();
            if($info)
            {
                print ("<tr><td>Info#: $info</td></tr>");
                echo '<tr><td><br>Done.<br></td></tr>';
            }
            
        } 
        catch (Exception $ex) 
        {
            print ("<tr><td><br>$ex<br></td></tr>");
        }
        
    }
}

echo '<tr><td><a href="index.php">Info</a>
         <a href="forexapitpl.php">Forex</a></td></tr>';
include 'footer.php';