<?php

/*
 * Forexapi.php
 */
include '../views/header.php';
include ("../configs/dbconfig.php");
/**
 * Description of forexapi
 *
 * @author Brian
 */
$apiapp = isset($_REQUEST["btnapi"]);
if($apiapp)
{
    $dt = date("Y/m/d H:i:s");
    $fapi = filter_input(INPUT_POST, 'apik', FILTER_SANITIZE_STRIPPED);
    $app = new Forexapi($fapi, $dt);
}
else
{
    echo '<br><hr><p><a href="../views/mytravelapp.php">Exit</a></p><br>';
    header("Location: ../views/forexapitpl.php");
    exit();
}

class Forexapi 
{
    
    var $access_key;
    var $date;
    var $gbp;
    Var $eur;
    var $kes;
    var $zar;
    var $usd;
    var $user;
    var $ref;
    
    
    function __construct($accesskey, $dd) 
    {
        $this->access_key = $accesskey;
        $this->date = $dd;
        //
        $this->gbp = 0.74713;
        $this->eur = 0.847803;
        $this->kes = 102.949997;
        $this->zar = 12.749305;
        $this->usd = 1.00;
        $this->ref = $accesskey;
        $this->user = "user@localhost.net";
        //
        $this->realtime();
        //
        //$this->validate();
    }
    
    function realtime()
    {
        echo '<p><a href="../views/skybookings.php">Exit</a></p>';
        echo "Online: $this->date <br>";
        try 
        {
            $access_key = filter_var($this->access_key,FILTER_SANITIZE_STRING);
            echo "$access_key <br>";
            $url = 'http://apilayer.net/api/live?access_key='.$access_key.'';
            // 
            //
            echo "$url <br>";
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $json = curl_exec($ch);
            curl_close($ch);
            $exchangeRates = json_decode($json, true);
            //
            $gbp = $exchangeRates['quotes']['USDGBP'];
            $eur = $exchangeRates['quotes']['USDEUR'];
            $kes = $exchangeRates['quotes']['USDKES'];
            $zar = $exchangeRates['quotes']['USDZAR'];
            //
            echo "GBP : $gbp <br>";
            echo "EUR : $eur <br>";
            echo "KES : $kes <br>";
            echo "ZAR : $zar <br>";
            //
            //$this->ref = $url;
            $this->eur = $eur;
            $this->gbp = $gbp;
            $this->kes = $kes;
            $this->zar = $zar;
        } 
        catch (Exception $ex) 
        {
            echo "Processing: $ex->getMessage() <br> ";
            
        }
        $this->validate();
    }
    
    function validate()
    {
        if(isset($_REQUEST["user"]))
        {
            $this->user = filter_input(INPUT_POST, "user", FILTER_SANITIZE_EMAIL);
        }
        else
        {
            $this->user = filter_var($this->user,FILTER_SANITIZE_EMAIL);
        }
        $this->ref = filter_var($this->ref,FILTER_SANITIZE_STRING);
        settype($this->eur, "float");
        settype($this->gbp, "float");
        settype($this->kes, "float");
        settype($this->usd, "float");
        settype($this->zar, "float");
        
        $this->update();
    }
            
    function update()
    {
        echo '<br><hr><p><a href="../views/mytravelapp.php">Exit</a></p><br>';
        try 
        {
            include_once "../configs/dbconn.php";
            $mysqli = connDB();
            //$mysqli = new mysqli(DBHOST, DBUSER, DBPWD , DBNAME);
            //
            $query = "INSERT INTO currencies (user, eur, gbp, kes, usd, zar, date, ref) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $mysqli->prepare($query);
            //
            $userv = $this->user;
            $eurv = $this->eur;
            $gbpv = $this->gbp;
            $kesv = $this->kes;
            $usdv = $this->usd;
            $zarv = $this->zar;
            $datev = $this->date;
            $refv = $this->ref;
            $stmt->bind_param("sdddddss",$userv, $eurv, $gbpv, $kesv, $usdv, $zarv, $datev, $refv);
            $info = $stmt->execute();
            //
            $stmt->close();
            $mysqli->close();
            //
            echo "Info = $info <br>";
            if ($info)
            {
                echo "Info ...Saved. <br>";
            }
        } 
        catch (Exception $ex) 
        {
            echo "Ex $ex->getMessage() <br>";
        }
    }
}

include '../views/footer.php';
