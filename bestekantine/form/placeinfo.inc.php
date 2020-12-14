<?php
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on'){   
        $currentpage = "https://";   
    } else{
        $currentpage = "http://";
    }
      
    $currentpage.= $_SERVER['HTTP_HOST'];   
      
    $currentpage.= $_SERVER['REQUEST_URI'];



    $sql = "SELECT * FROM tb_menuitems";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(); // get result

    if($currentpage == "http://localhost/htdocs/bestekantine/nl/subpage/drinken/"){

        function selectItmes(){
            global $result;
    
            if($result[0]['language'] == "nl"){
                $sql = "SELECT * FROM tb_menuitems WHERE catagory = 'drinken' AND language = '-'";
                return $sql;
            } else{
                echo "somthing went wrong";
            }
        }
    } elseif($currentpage == "http://localhost/htdocs/bestekantine/eng/subpage/drinks/"){
        function selectItmes(){
            global $result;
    
            if($result[0]['language'] == "nl"){
                $sql = "SELECT * FROM tb_menuitems WHERE catagory = 'drinks' AND language != 'nl'";
                return $sql;
            } else{
                echo "somthing went wrong";
            }
        }
    }
    
    if($currentpage == "http://localhost/htdocs/bestekantine/nl/subpage/eten/"){

        function selectItmes(){
            global $result;
    
            if($result[0]['language'] == "nl"){
                $sql = "SELECT * FROM tb_menuitems WHERE catagory != 'drinken' AND language != 'en' AND catagory != 'drinks' AND catagory != 'candy' ORDER BY catagory ASC";
                return $sql;
            } else{
                echo "somthing went wrong";
            }
        }
    } elseif($currentpage == "http://localhost/htdocs/bestekantine/eng/subpage/food/"){
        function selectItmes(){
            global $result;
    
            if($result[0]['language'] == "nl"){
                $sql = "SELECT * FROM tb_menuitems WHERE catagory != 'drinks' AND language != 'nl' AND catagory != 'drinken' AND catagory != 'snoepgoed' ORDER BY catagory DESC";
                return $sql;
            } else{
                echo "somthing went wrong";
            }
        }
    }

    $sql = selectItmes();
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(); // get result

    foreach($result as $key => $row) {
        if($currentpage == "http://localhost/VScode/bestekantine/eng/subpage/drinks/"){
            echo "<p>";
            echo "<b>" . $row['title'] . "</b>" . "<br />";
            echo "&euro; " . $row['price'] . "<br />";
            echo "category: " . $row['catagory'] . "<br /><br />";
            echo "lang: " . $row['language'];
            echo "</p>";
        } elseif($currentpage == "http://localhost/VScode/bestekantine/nl/subpage/drinken/"){
            echo "<p>";
            echo "<b>" . $row['title'] . "</b>" . "<br />";
            echo "&euro; " . $row['price'] . "<br />";
            echo "categorie: " . $row['catagory'] . "<br /><br />";
            echo "taal: " . $row['language'];
            echo "</p>";
        }

        if($currentpage == "http://localhost/VScode/bestekantine/eng/subpage/food/"){
            echo "<p>";
            echo "<b>" . $row['title'] . "</b>" . "<br />";
            echo "&euro; " . $row['price'] . "<br />";
            echo "category: " . $row['catagory'] . "<br /><br />";
            echo "lang: " . $row['language'];
            echo "</p>";
        } elseif($currentpage == "http://localhost/VScode/bestekantine/nl/subpage/eten/"){
            echo "<p>";
            echo "<b>" . $row['title'] . "</b>" . "<br />";
            echo "&euro; " . $row['price'] . "<br />";
            echo "categorie: " . $row['catagory'] . "<br /><br />";
            echo "taal: " . $row['language'];
            echo "</p>";
        }
    }
?>