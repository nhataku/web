let rows = 0;
let table  = document.createElement('table');
function create(){
    if (document.getElementById('table')!=null){
        alert("Таблица уже есть");
    }
    else{
        table .innerHTML = "<table>";
        table .setAttribute('id', 'table');
        document.body.append(table );
        rows += 1;
        add_row();}
    }

    function add_row(){
        let row = table .insertRow();
        row.insertCell().append(rows);
        row.insertCell().append("");
        rows += 1;
    }

function delete_row(){
    if (document.getElementById('num').value<1) {
        alert("Число должно быть больше нуля");
        return null;
    }
    num = document.getElementById('num').value;
    if (num>rows-1){
       alert("Такой строки нет");
    }
    else{
        var i=1;
        table.deleteRow(num-1);
        rows--;
        }
    }

    

