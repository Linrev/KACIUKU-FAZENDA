<?php
include("include/session.php");
if (isset($_POST['title']) && isset($_POST['ingredients']) && isset($_POST['category'])){
    $sql = 'INSERT INTO food (title, ingredients, category) VALUES (';
    $sql .= '"'.$_POST['title'].'",'.'"'.$_POST['ingredients'].'",'.'"'.$_POST['category'].'");';
    mysql_query($sql);
    header( 'Location: meniu.php' ) ;
}
?>

<html>
    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="icon" type="image/png" href="pictures/icon.png"/>
        <title>Kavinė</title>

    </head>
    <body>
        <style>
            form {background-color:#F1FCA2;}
            body {background-color:#F1FCA2;}
        </style>
        <img src="pictures/top.png" /><br>
        <h1>Naujas patiekalas</h1>
        <form method="POST">
            <div>
                <label for="title">Pavadinimas</label>
                <input type="text" id="title" name="title"/>
            </div>
            <div>
                <label for="ingredients">Sudetis</label>
                <input type="text" id="ingredients" name="ingredients"/>
            </div>
            <div>
                <label for="category">Kategorija</label>
                <select id="category" name="category">
                    <?php
                        $sql = "SELECT title FROM category;";
                        $res = mysql_query($sql);
                        while ($row = mysql_fetch_array($res)){
                            echo '<option value="'.$row['title'].'">'.$row['title'].'</option>';
                        }
                    ?>
                </select>
            </div>
            <input type="submit"/>
        </form>
    </body>
</html>


