<?php

/* 
 * simpleserver
 * @author Brian.
 */

function testa($echo)
{
    $info = getenv('HTTP_USER_AGENT');
    $info2 = getcwd();
    $info3 = gethostname();
    $info4 = time();
    $info5 = getdate();
    $info6 = $info5['year'].'/'.$info5['month'].'/'.$info5['mday'].' '
            .$info5['hours'].':'.$info5['minutes'].':'.$info5['seconds'];
    $info7 = 60*60*24;
    return "ECHO: ".$echo."<br> ".$info."<br> ".$info2.
            "<br>".$info3."<br>".$info4."<br>".$info6.
            "<br>".$info7;
}

function testd($y,$m,$d,$h,$i,$s)
{
    $info2 = 0;
    $info = time();
    $ts = mktime($h, $i, $s, $m, $d, $y);
    if($info <= $ts)
    {
        $info2 = 1;
    }
    $info3[] = $info.' <= '.$ts.' = '.$info2;
    $info3[] = date('Y/m/d H:i:s', $info);
    $info3[] = date('Y/m/d H:i:s', $ts);
    $info3[] = date($info2);
    return $info3;
}

$server = new SoapServer(NULL, array('uri' => "urn://sps/sev"));
$server->addFunction('testa');
$server->addFunction('testd');
$server->handle();

?>