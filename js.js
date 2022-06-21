var ajax = new XMLHttpRequest();

function form1() {
    ajax.onreadystatechange = function() {
        if (ajax.readyState === 4) {
            if (ajax.status === 200) {
                console.dir(ajax.responseText);
                document.getElementById("res").innerHTML = ajax.response;
            }
        }
    }
    var publisher = document.getElementById("publisher").value;
    console.dir(publisher);
    ajax.open("get", "1.php?publisher=" + publisher);
    ajax.send();
}

function form2() {
    ajax.onreadystatechange = function() {
        if (ajax.readyState === 4) {
            if (ajax.status === 200) {

                console.dir(ajax);
                let rows = ajax.responseXML.firstChild.children;
                let result = "Информация: <ol>";
                for (var i = 0; i < rows.length; i++) {
                    result += "<li>";
                    result += "Книга: " + rows[i].children[0].firstChild.nodeValue;
                    result += ", автор: " + rows[i].children[1].firstChild.nodeValue;
                    result += ", издательство: " + rows[i].children[2].firstChild.nodeValue;
                    result += ", <b>год выпуска: " + rows[i].children[3].firstChild.nodeValue;
                    result += "</b>, ISBN" + rows[i].children[4].firstChild.nodeValue;
                    result += "</li>";
                }
                result += "</ol>";
                document.getElementById("res").innerHTML = result;
            }
        }
    }
    var year_min = document.getElementById("year_min").value;
    var year_max = document.getElementById("year_max").value;
    ajax.open("get", "2.php?year_min=" + year_min + "&year_max=" + year_max);
    ajax.send();
}

function form3() {
    ajax.onreadystatechange = function() {
    let rows = JSON.parse(ajax.responseText);
    console.dir(rows);
    if (ajax.readyState === 4) {
        if (ajax.status === 200) {
            console.dir(ajax);
            let result = "Информация: <ol>";
            for (var i = 0; i < rows.length; i++) {
                result += "<li>";
                result += "Книга: " + rows[i].title;
                result += ", автор: " + rows[i].name;
                result += ", издательство: " + rows[i].publisher;
                result += ", <b>год выпуска: " + rows[i].year;
                result += "</b>, ISBN" + rows[i].ISBN;
                result += "</li>";
                }
            result += "</ol>";
            document.getElementById("res").innerHTML = result;
            }
        }
    }
    var author = document.getElementById("author").value;
    ajax.open("get", "3.php?author=" + author);
    ajax.send();
}