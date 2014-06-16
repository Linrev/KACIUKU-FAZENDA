<?php
include("include/session.php");
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
        <form>
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
                            echo '<option value="'.$row['title'].'">'.$row['title'].'<option>';
                        }
                    ?>
                </select>
            </div>
            <input type="submit"/>
        </form>
    </body>
</html>


