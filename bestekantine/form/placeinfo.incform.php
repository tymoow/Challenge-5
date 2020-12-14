<?php
    $sql = "SELECT * FROM tb_menuitems";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(); // get result
    
    foreach($result as $key => $row) {

        echo "<p>";
        echo "<b>" . $row['title'] . "</b>" . "<br />";
        echo "&euro; " . $row['price'] . "<br />";
        echo "categorie: " . $row['catagory'] . "<br /><br />";
        echo "taal: " . $row['language'];
        echo "</p>";
    }
?>