var tbl = document.getElementById("user");

for (let x = 1; x < tbl.rows.length; x++){
    tbl.rows[x].onclick = function(){

        document.getElementById("email").value = this.cells[0].innerHTML;
        document.getElementById("number").value = this.cells[1].innerHTML;
        document.getElementById("contry").value = this.cells[2].innerHTML;

    }
1   
}

function myFunction() {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("user");
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