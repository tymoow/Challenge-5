<?php
    $sql = "INSERT INTO tb_menuitems (title, price, catagory, language) 
                VALUES ('$title', '$price', '$catagory', '$lang')";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    //print_r($result);

?>