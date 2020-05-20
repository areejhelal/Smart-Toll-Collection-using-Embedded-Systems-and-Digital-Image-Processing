function myFunction1() {
// Declare variables
var input, filter, table, tr, td, i, txtValue;
input = document.getElementById("myInput1");
filter = input.value.toUpperCase();
table = document.getElementById("myTable1");
tr = table.getElementsByTagName("tr");

// Loop through all table rows, and hide those who don't match the search query
for (i = 0; i < tr.length; i++) {
  td = tr[i].getElementsByTagName("td")[0];
  if (td) {
    txtValue = td.textContent || td.innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      tr[i].style.display = "";
    } else {
      tr[i].style.display = "none";
    }
  }
}
}
function myFunction2() {
// Declare variables
var input, filter, table, tr, td, i, txtValue;
input = document.getElementById("myInput2");
filter = input.value.toUpperCase();
table = document.getElementById("myTable2");
tr = table.getElementsByTagName("tr");

// Loop through all table rows, and hide those who don't match the search query
for (i = 0; i < tr.length; i++) {
td = tr[i].getElementsByTagName("td")[0];
if (td) {
  txtValue = td.textContent || td.innerText;
  if (txtValue.toUpperCase().indexOf(filter) > -1) {
    tr[i].style.display = "";
  } else {
    tr[i].style.display = "none";
  }
}
}
}
function myFunction3() {
// Declare variables
var input, filter, table, tr, td, i, txtValue;
input = document.getElementById("myInput3");
filter = input.value.toUpperCase();
table = document.getElementById("myTable3");
tr = table.getElementsByTagName("tr");

// Loop through all table rows, and hide those who don't match the search query
for (i = 0; i < tr.length; i++) {
td = tr[i].getElementsByTagName("td")[0];
if (td) {
  txtValue = td.textContent || td.innerText;
  if (txtValue.toUpperCase().indexOf(filter) > -1) {
    tr[i].style.display = "";
  } else {
    tr[i].style.display = "none";
  }
}
}
}
function myFunction4() {
// Declare variables
var input, filter, table, tr, td, i, txtValue;
input = document.getElementById("myInput4");
filter = input.value.toUpperCase();
table = document.getElementById("myTable4");
tr = table.getElementsByTagName("tr");

// Loop through all table rows, and hide those who don't match the search query
for (i = 0; i < tr.length; i++) {
td = tr[i].getElementsByTagName("td")[0];
if (td) {
  txtValue = td.textContent || td.innerText;
  if (txtValue.toUpperCase().indexOf(filter) > -1) {
    tr[i].style.display = "";
  } else {
    tr[i].style.display = "none";
  }
}
}
}
function myFunction5() {
// Declare variables
var input, filter, table, tr, td, i, txtValue;
input = document.getElementById("myInput5");
filter = input.value.toUpperCase();
table = document.getElementById("myTable5");
tr = table.getElementsByTagName("tr");

// Loop through all table rows, and hide those who don't match the search query
for (i = 0; i < tr.length; i++) {
td = tr[i].getElementsByTagName("td")[0];
if (td) {
  txtValue = td.textContent || td.innerText;
  if (txtValue.toUpperCase().indexOf(filter) > -1) {
    tr[i].style.display = "";
  } else {
    tr[i].style.display = "none";
  }
}
}
}
function myFunction6() {
// Declare variables
var input, filter, table, tr, td, i, txtValue;
input = document.getElementById("myInput6");
filter = input.value.toUpperCase();
table = document.getElementById("myTable6");
tr = table.getElementsByTagName("tr");

// Loop through all table rows, and hide those who don't match the search query
for (i = 0; i < tr.length; i++) {
td = tr[i].getElementsByTagName("td")[0];
if (td) {
  txtValue = td.textContent || td.innerText;
  if (txtValue.toUpperCase().indexOf(filter) > -1) {
    tr[i].style.display = "";
  } else {
    tr[i].style.display = "none";
  }
}
}
}

      document.getElementById("carsusers").onclick = function() {
        document.getElementById("table2").style.display = "none";
        document.getElementById("table3").style.display = "none";
        document.getElementById("table4").style.display = "none";
        document.getElementById("table5").style.display = "none";
        document.getElementById("table6").style.display = "none";
        document.getElementById("table1").style.display = "block";
      }

      document.getElementById("cars").onclick = function() {
        document.getElementById("table1").style.display = "none";
        document.getElementById("table3").style.display = "none";
        document.getElementById("table4").style.display = "none";
        document.getElementById("table5").style.display = "none";
        document.getElementById("table6").style.display = "none";
        document.getElementById("table2").style.display = "block";
      }

      document.getElementById("users").onclick = function() {
        document.getElementById("table1").style.display = "none";
        document.getElementById("table2").style.display = "none";
        document.getElementById("table4").style.display = "none";
        document.getElementById("table5").style.display = "none";
        document.getElementById("table6").style.display = "none";
        document.getElementById("table3").style.display = "block";
      }
      document.getElementById("alerts").onclick = function() {
        document.getElementById("table1").style.display = "none";
        document.getElementById("table2").style.display = "none";
        document.getElementById("table3").style.display = "none";
        document.getElementById("table5").style.display = "none";
        document.getElementById("table6").style.display = "none";
        document.getElementById("table4").style.display = "block";
      }
      document.getElementById("admins").onclick = function() {
        document.getElementById("table1").style.display = "none";
        document.getElementById("table2").style.display = "none";
        document.getElementById("table3").style.display = "none";
        document.getElementById("table4").style.display = "none";
        document.getElementById("table6").style.display = "none";
        document.getElementById("table5").style.display = "block";
      }
      document.getElementById("images").onclick = function() {
        document.getElementById("table1").style.display = "none";
        document.getElementById("table2").style.display = "none";
        document.getElementById("table3").style.display = "none";
        document.getElementById("table4").style.display = "none";
        document.getElementById("table5").style.display = "none";
        document.getElementById("table6").style.display = "block";
      }
