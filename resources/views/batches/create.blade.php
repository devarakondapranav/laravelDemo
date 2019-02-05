@extends('layouts.app')

@section('content')
   

    
    <h1>Place new order</h1>
    
    

    <p>
        <input type="button" id="addRow" value="Add New Row" onclick="addRow()" class="btn btn-danger" />
    </p>

    <!--THE CONTAINER WHERE WE'll ADD THE DYNAMIC TABLE-->
    {{ Form::open(array('action' => 'BatchController@store', 'method' => 'POST', 'onsubmit' => 'return validateForm()')) }}

    <div id="cont"></div>
    <div id ="submitButton"><br><br></div>
    {{ Form::close() }}
    
</body>

<script>
    // ARRAY FOR HEADER.
    var arrHead = new Array();
    arrHead = ['', 'First Name','Last Name','Age', 'Adress Documents'];      // SIMPLY ADD OR REMOVE VALUES IN THE ARRAY FOR TABLE HEADERS.

    // FIRST CREATE A TABLE STRUCTURE BY ADDING A FEW HEADERS AND
    // ADD THE TABLE TO YOUR WEB PAGE.
    var flag = false;

    function createTable() {
        var empTable = document.createElement('table');
        empTable.setAttribute('id', 'empTable');  
        empTable.setAttribute('action', './submitAddresses.php');         // SET THE TABLE ID.

        var tr = empTable.insertRow(-1);

        for (var h = 0; h < arrHead.length; h++) {
            var th = document.createElement('th');          // TABLE HEADER.
            th.innerHTML = arrHead[h];
            tr.appendChild(th);
        }

        var div = document.getElementById('cont');
        div.appendChild(empTable);    // ADD THE TABLE TO YOUR WEB PAGE.
    }
    createTable();

    // ADD A NEW ROW TO THE TABLE.s
    function addRow() {
        var empTab = document.getElementById('empTable');

        var rowCnt = empTab.rows.length;        // GET TABLE ROW COUNT.
        var tr = empTab.insertRow(rowCnt);      // TABLE ROW.
        tr = empTab.insertRow(rowCnt);

        for (var c = 0; c < arrHead.length; c++) {
            var td = document.createElement('td');          // TABLE DEFINITION.
            td = tr.insertCell(c);

            if (c == 0) {           // FIRST COLUMN.
                // ADD A BUTTON.
                var button = document.createElement('input');

                // SET INPUT ATTRIBUTE.
                button.setAttribute('type', 'button');
                button.setAttribute('value', 'Remove');

                // ADD THE BUTTON's 'onclick' EVENT.
                button.setAttribute('onclick', 'removeRow(this)');
                button.setAttribute('class', 'btn btn-primary')

                td.appendChild(button);
            }
            else {
                // CREATE AND ADD TEXTBOX IN EACH CELL.
                if(c == arrHead.length-1) //this is file
                {
                  var ele = document.createElement('input');
                ele.setAttribute('type', 'file');
                ele.setAttribute('value', '');
                ele.setAttribute('name', 'image[]');

                td.appendChild(ele);
                }
                else{
                  if(c == 1)//firstname
                  {
                    var ele = document.createElement('input');
                    ele.setAttribute('type', 'text');
                    ele.setAttribute('value', '');
                    ele.setAttribute('name', 'first_name[]');


                    td.appendChild(ele);
                  }
                  else if(c==2)//lastname
                  {
                    var ele = document.createElement('input');
                    ele.setAttribute('type', 'text');
                    ele.setAttribute('value', '');
                    ele.setAttribute('name', 'last_name[]');


                    td.appendChild(ele);
                  }
                  else if (c==3) //age
                  {
                  var ele = document.createElement('input');
                    ele.setAttribute('type', 'text');
                    ele.setAttribute('value', '');
                    ele.setAttribute('name', 'age[]');


                    td.appendChild(ele);

                }
              }
            }
        }
        if(flag == false)
        {
          var ele = document.createElement('input');
          ele.setAttribute('type', 'submit');
          ele.setAttribute('value', 'Submit Data');
          ele.setAttribute('class', 'btn btn-success');
          flag = true;
          //ele.setAttribute('onclick', 'submitData()');
          document.getElementById("submitButton").appendChild(ele);
        }
    }

    // DELETE TABLE ROW.
    function removeRow(oButton) {
        var empTab = document.getElementById('empTable');
        empTab.deleteRow(oButton.parentNode.parentNode.rowIndex);       // BUTTON -> TD -> TR.
    }
    function validateForm()
    {
      var myTab = document.getElementById('empTable');
        var values = new Array();

        // LOOP THROUGH EACH ROW OF THE TABLE.
        for (row = 1; row < myTab.rows.length - 1; row++) {
            for (c = 0; c < myTab.rows[row].cells.length; c++) {   // EACH CELL IN A ROW.

                var element = myTab.rows.item(row).cells[c];
                if (element.childNodes[0].getAttribute('type') == 'text') {
                    values.push("'" + element.childNodes[0].value + "'");
                    if(element.childNodes[0].value == '')
                    {
                      alert("You have left some fields blank for the " + String(row) + " entry");
                      return false;
                    }
                }
                else if (element.childNodes[0].getAttribute('type') == 'file') {
                    
                    if(element.childNodes[0].files.length == 0)
                    {
                      alert("You havent uploaded files for the " + String(row) + " entry");
                      return false;
                    }
                }

            }
        }
        
        console.log(values);
        return true;
    }

    
</script>



@endsection