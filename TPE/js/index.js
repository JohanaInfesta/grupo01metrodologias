var horarios = {
    'Domingo': [],
    'Lunes': ['8','9','10','11','16','17','18','19'],
    'Martes': ['8','9','10','11','16','17','18','19'], 
    'Miercoles': ['8','9','10','11','16','17','18','19'],
    'Jueves': ['8','9','10','11','16','17','18','19'],
    'Viernes': ['8','9','10','11','16','17','18','19'],
    'Sabado': ['8','9','10','11','16','17','18','19'],
  }
  
  var actual=new Date();
  let fechaCambiar = new Date();

  function mostrarCalendario(year,month)
  {
      fechaCambiar.setFullYear(year);
      fechaCambiar.setMonth(month - 1);
      var now=new Date(year,month-1,1);
      var last=new Date(year,month,0);
      var primerDiaSemana=(now.getDay()==0)?7:now.getDay();
      var ultimoDiaMes=last.getDate();
      var dia=0;
      var resultado="<tr bgcolor='silver'>";
      var diaActual=0;
   
      var last_cell=primerDiaSemana+ultimoDiaMes;
   
      for(var i=1;i<=42;i++)
      {
          if(i==primerDiaSemana)
          {
              // determinamos en que dia empieza
              dia=1;
          }
          if(i<primerDiaSemana || i>=last_cell)
          {
              // celda vacia
              resultado+="<td class='domingo'><button>&nbsp;</button></td>";
          }else{
              // mostramos el dia
              if(dia==actual.getDate() && now.getMonth()+1==actual.getMonth()+1 && now.getFullYear()==actual.getFullYear()){
                  resultado+=`<td class='hoy' id="${dia}"><button onclick='showHorarios(${dia})'>${dia}</button></td>`;
              }
            else if(getNameByDay(dia) === 'Domingo'){
              resultado+=`<td id="${dia}" onclick='showHorarios(${dia})' class='domingo'><button disabled>${dia}</button></td>`;
          }else{
              resultado+=`<td id="${dia}" onclick='showHorarios(${dia})'class='laboral'><button >${dia}</button></td>`;
          
        }
              dia++;
          }
          if(i%7==0)
          {
              if(dia>ultimoDiaMes)
                  break;
              resultado+="</tr><tr>\n";
          }
      }
      resultado+="</tr>";
   
      var meses=Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
   
      // Calculamos el siguiente mes y año
      nextMonth=month+1;
      nextYear=year;
      if(month+1>12)
      {
          nextMonth=1;
          nextYear=year+1;
      }
   
      // Calculamos el anterior mes y año
      prevMonth=month-1;
      prevYear=year;
      if(month-1<1)
      {
          prevMonth=12;
          prevYear=year-1;
      }
   
      document.getElementById("calendar").getElementsByTagName("caption")[0].innerHTML="<div>"+meses[month-1]+" / "+year+"</div><div><a onclick='mostrarCalendario("+prevYear+","+prevMonth+")'>&lt;</a> <a onclick='mostrarCalendario("+nextYear+","+nextMonth+")'>&gt;</a></div>";
      document.getElementById("calendar").getElementsByTagName("tbody")[0].innerHTML=resultado;
  }
   
  mostrarCalendario(actual.getFullYear(),actual.getMonth()+1);
  
  
  let horarioHTML = document.getElementById('horarioHTML');
  let fechaHTML = document.getElementById('fechaHTML');
  
  
  function obtenerHorario(horario, numeroDia){
      console.log('Horario', horario);
      console.log('numeroDia', numeroDia);
      console.log('Mes', fechaCambiar.getMonth()+1);
      console.log('Anio',fechaCambiar.getFullYear());
      horarioHTML.innerHTML=`${horario}:00hs`;
      fechaHTML.innerHTML=`${numeroDia}/${fechaCambiar.getMonth()+1}/${fechaCambiar.getFullYear()}`;
  }
  
  function showHorarios(n){
      let horario = daySelect(n);
      modal.classList.remove('dsplNone');
      for (let i = 0; i < horario.length; i++) {
          divHorarios.innerHTML += `<button class="btnHorario" onclick='obtenerHorario(${horario[i]}, ${n})'>${horario[i]}</button>`;
      }
      divHorarios.classList.add('horarios');
  }
  function daySelect(n){
    let aux = getNameByDay(n);
    switch (aux) {
        case 'Lunes':
            return horarios.Lunes;
        case 'Martes':
            return horarios.Martes;
        case 'Miercoles':
            return horarios.Miercoles;
        case 'Jueves':
            return horarios.Jueves;
        case 'Viernes':
            return horarios.Viernes;
        case 'Sabado':
            return horarios.Sabado;
        case 'Domingo':
            return horarios.Domingo;
        default:
            break;
    }
  }
  function getNameByDay(n){
    const week = ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado']
    let indice = new Date(fechaCambiar.getFullYear(), fechaCambiar.getMonth(), n).getDay();
    return week[indice];
  }
  
  
  let modal = document.getElementById('modal');
  let divHorarios = document.getElementById('horarios');
  
  
  
  let btnCloseModal = document.getElementById('closeModal');
  btnCloseModal.addEventListener('click', closeModal);
  
  function closeModal(){
      modal.classList.add('dsplNone');
      divHorarios.innerHTML = '';
      divHorarios.classList.remove('horarios');
      horarioHTML.innerHTML = '';
      fechaHTML.innerHTML = '';
  } 
  
  
  //Setea los horarios dependiendo el dia
  function setValueHours(n){
      let horario = daySelect(n);
      modal.classList.remove('dsplNone');
      for (let i = 0; i < horario.length; i++) {
          divHorarios.innerHTML += `<button class="btnHorario">${horario[i]}</button>`;
      }
      divHorarios.classList.add('horarios');
  }
