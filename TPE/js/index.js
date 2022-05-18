let date = new Date();
let month = date.getMonth() + 1;
let year = date.getFullYear();


var horarios = {
    'Domingo': [],
    'Lunes': ['8', '8:30','9', '9:30','10','10:30','11','11:30' ],
    'Martes': ['8', '8:30','9'], 
    'Miercoles': ['8', '8:30','9'],
    'Jueves': ['8', '8:30','9'],
    'Viernes': ['8', '8:30','9'],
    'Sabado': [],
}


writeCalendar();


function writeCalendar(){
    let dates = document.getElementById('dates');
    for (let i = 1; i <= getTotalDayOfMonth(); i++) {
        let day = daySelect(i);
        console.log(day);
        if(day.length > 0){
            dates.innerHTML += `<div><button id="btn-date" class=" btnDay" onclick="setValueHours(${i})">${i}</button></div>` 
            
        }else{
            dates.innerHTML += `<div><button class="btnDisabled not-allowed" disabled">${i}</button></div>` 
        }
    }
}
let modal = document.getElementById('modal');
let divHorarios = document.getElementById('horarios');
let divOpacity = document.getElementById('divOpacity');

let btnCloseModal = document.getElementById('closeModal');
btnCloseModal.addEventListener('click', closeModal);

function closeModal(){
    modal.classList.add('dsplNone');
    divHorarios.innerHTML = '';
    divHorarios.classList.remove('horarios');
    divOpacity.classList.remove('opacity');
} 
function setValueHours(n){
    let horario = daySelect(n);
    modal.classList.remove('dsplNone');
    for (let i = 0; i < horario.length; i++) {
        divHorarios.innerHTML += `<button class="btnHorario">${horario[i]}</button>`;
    }
    divHorarios.classList.add('horarios');
    divOpacity.classList.add('opacity');
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
function startDayWeek(){
    const startDay = new Date(year, month - 1, 1).getDay();
    return startDay;
}
function getNameByDay(n){
    const week = ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado']
    let indice = new Date(year, month - 1, n).getDay();
    return week[indice];
}
function getTotalDayOfMonth(){
    if(month === -1) month = 11;
    if(month === 2){
        return bisiesto()? 28:29;
    }
    else{
        return new Date(year, month, 0).getDate();
    }
}
function bisiesto(){
    return ((year % 100 !== 0) && (year % 4 === 0) || (year % 400 === 0));
}