<?php include "conn.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лаб3</title>
    <script src="js.js">
        
    </script>
</head>
<body>
<h3>Пахомова Евгения, КИУКИ-19-1, Вариант №0 </h3>
<p><strong> Информация о книгах издательства: </strong>
        <select name="publisher" id="publisher">
            <?php
            $sql = "SELECT DISTINCT publisher FROM $db.LITERATURE";
            $sql = $dbh->query($sql);
            foreach ($sql as $cell) {
                echo "<option> $cell[0] </option>";
            }
            ?>
        </select>
    <button onclick="form1()">ОК</button>
</p>

<p><strong>Информация о книгах, журналах, газетах, опубликованных за указанный период:</strong>
        <select name="year_min" id="year_min">
            <?php
                $sql = "SELECT DISTINCT year FROM $db.LITERATURE";
                $sql = $dbh->query($sql);
                foreach ($sql as $cell) {
                    if($cell[0] == 0)
                        continue;
                    else
                        echo "<option> $cell[0] </option>";
                }
                $sql = "Select distinct year(date) from $db.LITERATURE";
                $sql = $dbh->query($sql);
                foreach ($sql as $cell) {
                    if($cell[0] == 0)
                        continue;
                    else
                        echo "<option> $cell[0] </option>";
                }
            ?>
        </select>
        <select name="year_max" id="year_max">
        <?php
            $sql = "SELECT DISTINCT year FROM $db.LITERATURE";
            $sql = $dbh->query($sql);
            foreach ($sql as $cell) {
                if($cell[0] == 0)
                    continue;
                else
                    echo "<option> $cell[0] </option>";
            }
            $sql = "Select distinct year(date) from $db.LITERATURE";
            $sql = $dbh->query($sql);
            foreach ($sql as $cell) {
                if($cell[0] == 0)
                    continue;
                else
                    echo "<option> $cell[0] </option>";
            }
            ?>
        </select>
    <button onclick="form2()">ОК</button>
</p>
<p><strong> Вывести информацию о книгах автора: </strong>
        <select name="author" id="author">
            <?php
                $sql = "SELECT DISTINCT name FROM $db.authors";
                $sql = $dbh->query($sql);
                foreach ($sql as $cell) {
                    echo "<option> $cell[0] </option>";
                }
            ?>
        </select>
    <button onclick="form3()">ОК</button>
</p>
<p id="res"></p>
</body>
</html>