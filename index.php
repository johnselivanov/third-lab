<?php include "connection.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лаба3</title>
    <script>
        var ajax = new XMLHttpRequest();

function action1() {
    ajax.onreadystatechange = function() {
        if (ajax.readyState === 4) {
            if (ajax.status === 200) {
                console.dir(ajax.responseText);
                document.getElementById("res").innerHTML = ajax.response;
            }
        }
    }
    var client = document.getElementById("statistic").value;
    ajax.open("get", "action1.php?statistic=" + client);
    ajax.send();
}

function action2() {
    ajax.onreadystatechange = function() {
        if (ajax.readyState === 4) {
            if (ajax.status === 200) {

                console.dir(ajax);
                let rows = ajax.responseXML.firstChild.children;
                let result = "Сатистика за указанный временной интервал: <ol>";
                for (var i = 0; i < rows.length; i++) {
                    result += "<li>";
                    result += "Имя: " + rows[i].children[0].firstChild.nodeValue + "</td>";
                    result += ", IP: " + rows[i].children[1].firstChild.nodeValue + "</td>";
                    result += ", balance: " + rows[i].children[2].firstChild.nodeValue + "</td>";
                    result += ", начало: " + rows[i].children[3].firstChild.nodeValue + "</td>";
                    result += ", конец: " + rows[i].children[4].firstChild.nodeValue + "</td>";
                    result += ", входящий трафик: " + rows[i].children[5].firstChild.nodeValue + "</td>";
                    result += ", выходящий трафик: " + rows[i].children[5].firstChild.nodeValue + "</td>";
                    result += "</li>";
                }
                document.getElementById("res").innerHTML = result;
            }
        }
    }
    var start = document.getElementById("start").value;
    var stop = document.getElementById("stop").value;
    var adress = "action2.php?start=" + start + "&stop=" + stop;
    ajax.open("get", adress);
    ajax.send();
}

function action3() {
    ajax.onreadystatechange = function() {
    let rows = JSON.parse(ajax.responseText);
    console.dir(rows);
    if (ajax.readyState === 4) {
        if (ajax.status === 200) {
            console.dir(ajax);
            let result = "Пользователи с отрицательным балансом: ";
            result += "<ol>";
            for (var i = 0; i < rows.length; i++) {
                result += "<li>";
                result += "Имя: " + rows[i].name + ", ";
                result += "IP: " + rows[i].IP + ", ";
                result += "balance: " + rows[i].balance + ", ";
                result += "</li>";
            }
            result += "</ol>";
            document.getElementById("res").innerHTML = result;
        }
    }
}
    ajax.open("get", "action3.php?");
    ajax.send();
}
    </script>
</head>
<body>
<p><strong> Статистика работы в сети: </strong>
        <select name="statistic" id="statistic">
            <?php
            $sql = "SELECT DISTINCT name FROM $db.client";
            $sql = $dbh->query($sql);
            foreach ($sql as $cell) {
                echo "<option> $cell[0] </option>";
            }
            ?>
        </select>
    <button onclick="action1()">ОК</button>
</p>
<p><strong>Статистика работы в сети за указанный промежуток времени:</strong>
    <select name="start" id="start">
        <?php
        $sql = "SELECT DISTINCT start FROM $db.seanse";
        $sql = $dbh->query($sql);
        foreach ($sql as $cell) {
            echo "<option> $cell[0] </option>";
        }
        ?>
    </select>
    <select name="stop" id="stop">
    <?php
        $sql = "SELECT DISTINCT stop FROM $db.seanse";
        $sql = $dbh->query($sql);
        foreach ($sql as $cell) {
            echo "<option> $cell[0] </option>";
        }
        ?>
    </select>
    <button onclick="action2()">ОК</button>
</p>
<p><strong> Вывести людей с отрицательным балансом </strong>
    <button onclick="action3()">ОК</button>
</p>
<div id="res"></div>
</body>
</html>