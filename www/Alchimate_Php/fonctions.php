<?php
  /*
    Donne une date en format dd/mm/aa 
    à partir d'une date en format aaaa-mm-dd
    ou  format aaaa-mm-dd HH:mm:ss
    */
    function dateFr($date){
        $d = explode(" ", $date);
        $d = explode("-", $d[0]);        
        $date = $d[2] . "/" . $d[1] . "/" . substr($d[0],2,4);
        return $date;
    }
    /*
    Donne une date en format aaaa-mm-dd 
    à partir d'une date en format dd/mm/aa
    */
    function dateBdd($date){
        $d = explode("/", $date);
        $date = "00".$d[2] . "/" . $d[1] . "/" . $d[0];
        return $date;        
    } 
	?>