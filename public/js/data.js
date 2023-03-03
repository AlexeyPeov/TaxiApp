document.write('<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>');

function getData() {
    $.ajax({
        type: "POST",
        url: "http://dc/api/docker/getAllContainers",

        success: function (data) {
            console.log(data);
            let table = document.createElement("table");
            let tr = table.insertRow(-1);
            for (let key in data[0]) {
                let th = document.createElement("th");
                th.innerHTML = key;
                tr.appendChild(th);

            }
            for (let i = 0; i < data.length; i++) {
                tr = table.insertRow(-1);
                for (let key in data[i]) {
                    let cell = tr.insertCell(-1);
                    if(typeof data[i][key] == 'object'){
                        let string = JSON.parse(JSON.stringify(data[i][key]));
                        console.log(string);
                        for (let strkey in string) {
                            cell.innerHTML += strkey + ': ' + string[strkey] + '<br>';
                        }
                        cell.width = 150;
                    } else {
                        cell.innerHTML = data[i][key];
                    }

                    //console.log(data[i][key]);
                }
            }
            document.body.appendChild(table);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus + ": " + errorThrown);
        }
    });
}
$(document).ready(function () {
    // Call the getData function when the page loads
    getData();
});
