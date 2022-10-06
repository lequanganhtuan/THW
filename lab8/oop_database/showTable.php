<?php
    $op=$_GET["chon"];
    if($op != ""){
        include("database.class.php");
        $dao = new Dao("root", "", "udn");
        $sql = "select * from $op";
        $header = "DANH SACH {$op}";
        $dao->table($sql, $header);
    }
?>