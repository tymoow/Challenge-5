<?php

if(isset($_POST['frmGegevens'])){

    //print_r($_POST);

    include_once("connection.inc.php");
    include_once("collect.inc.php");
    include_once("insert.inc.php");

    print "het is gelukt!!! klik op terug &#8592; om nog een nieuw product toetevoegen.";

} else{

    include_once("from.inc.php");

}

echo "<br /><br />";

include_once("connection.inc.php");
include_once("placeinfo.incform.php");

?>