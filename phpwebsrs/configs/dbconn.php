<?php

/* 
 * dbconn.php
 * @author Brian
 */
function connDB()
{
    try {
        $mysqli = new mysqli(DBHOST, DBUSER, DBPWD ,DBNAME);
        if($mysqli->errno)
        {
            echo '<tr><td> Conn#: '.$mysqli->errno.'</td></tr>';
            echo '<tr><td><a href="../index.php">ExitDb1</a></td></tr>';
            exit();
        }
        if($mysqli->connect_errno)
        {
            echo '<tr><td> Conn Offline: '.$mysqli->connect_errno.'</td></tr>';
            echo '<tr><td> Conn#: '.$mysqli->connect_error.'</td></tr>';
            echo '<tr><td><a href="../index.php">ExitDb2</a></td></tr>';
            exit();
        }
        return $mysqli;
    } catch (Exception $ex) {
        echo '<tr><td> Exc: '.$ex->getMessage().'</td></tr>';
        echo '<tr><td><a href="../index.php">ExitExdb3</a></td></tr>';
        exit();
    }catch (ErrorException $cx){
        echo '<tr><td>'.$cx->getMessage().'</td></tr>';
    } catch (Error $err){
        echo '<tr><td>'.$err->getMessage().'</td></tr>';
    }
}

?>
