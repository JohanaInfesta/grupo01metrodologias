

let busqueda = document.getElementById('buscarMedico');
let table = document.getElementById("idTabla").tBodies[0];

busqueda.addEventListener('keyup', buscarTabla2);

function buscarTabla2(){
filter = busqueda.value.toUpperCase();
tr = table.getElementsByTagName("tr");

  
  for (i = 0; i < tr.length; i++) {
    visible = false;
    td = tr[i].getElementsByTagName("td");
      if (td[0] && td[0].innerHTML.toUpperCase().indexOf(filter) > -1 || td[1] && td[1].innerHTML.toUpperCase().indexOf(filter) > -1  ) {
        visible = true;
      }
    
    if (visible === true) {
      tr[i].style.display = "";
    } else {
      tr[i].style.display = "none";
    }
  }
}





    

    
    