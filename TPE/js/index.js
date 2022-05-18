let date = new Date();
let month = date.getMonth() + 1;
let year = date.getFullYear();

writeCalendar();

let horarios = {
    'Domingo': [],
    'Lunes': ['8', '8:30','9'],
    'Martes': ['8', '8:30','9'], 
    'Miercoles': ['8', '8:30','9'],
    'Jueves': ['8', '8:30','9'],
    'Viernes': ['8', '8:30','9'],
    'Sabado': [],
}
function writeCalendar(){
    let dates = document.getElementById('dates');
    for (let i = 1; i <= getTotalDayOfMonth(); i++) {
        dates.innerHTML += `<div><button id="btn-date" class=" btnDay" onclick="daySelect(${i})">${i}</button><div>` 
    }
}
function daySelect(n){
    let aux = getNameByDay(n);
    switch (aux) {
        case 'Lunes':
            alert(horarios.Lunes)
            break;
        case 'Martes':
            alert(horarios.Martes)
            break;
        case 'Miercoles':
            alert(horarios.Miercoles)
            break;
        case 'Jueves':
            alert(horarios.Jueves)
            break;
        case 'Viernes':
            alert(horarios.Viernes)
            break;
        case 'Sabado':
            alert(horarios.Sabado)
        break;    
        default:
            break;
    }
    console.log(n+" dia ", aux+" dia semana");
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