<?php
    $mysqli = new mysqli('localhost', 'root', '', 'arbitrios');
    $mysqli->set_charset('utf8');
    
    $query=$mysqli->query("select * from distritos where provincia_id=$_GET[provincia]");
    $states = array();

    while($r=$query->fetch_object()){ 
        $states[]=$r;
    }

    if(count($states)>0){
        print "<option value=''>Selecciona</option>";

        foreach ($states as $s) {
            print "<option value='$s->id'>$s->distrito</option>";
        }
    }else{
        print "<option value=''>-- NO HAY DATOS --</option>";
    }
?>