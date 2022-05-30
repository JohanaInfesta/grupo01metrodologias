let filasMedicos = document.getElementsByClassName("filaMedico");

for(let i = 0; i < filasMedicos.length; i++) {
    filasMedicos[i].addEventListener("click", function() {
        window.location.replace("calendarioDeTurnos")
    })
}