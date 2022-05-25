let filasMedicos = document.getElementsByClassName("filaMedico");

for(let i = 0; i < filasMedicos.length; i++) {
    filasMedicos[i].addEventListener("click", function() {
        window.location.replace("calendarioDeTurnos")
    })
}


   // window.location.replace("calendarioDeTurnos");


/* 
VIEJO METODO PARA MOSTRAR MEDICOS

var medicos = [
    {"id": 1, 
    "nombre": "Roberto", 
    "apellido": "Sanchez", 
    "especialidad": "Pedriatra", 
    "obras_sociales": ["Medifé", "OSDE", "Omint"]
    },
    {"id": 2,
    "nombre": "Juan",
    "apellido": "Perez",
    "especialidad": "Oftalmologo",
    "obras_sociales": ["Medifé", "OSDE"]
    },
    {"id": 3,
    "nombre": "Sergio",
    "apellido": "Schmidth",
    "especialidad": "Ginecologo",
    "obras_sociales": ["Ospe", "OSDE", "Femeba", "Osecac"]
    },
    {"id": 5,
    "nombre": "Cecilia",
    "apellido": "Campos",
    "especialidad": "Cirujano",
    "obras_sociales": ["OSDE"]
    }
];

function showMedicos() {
    medicos.forEach(function (medico) {  
        let filasTablaMedicos = document.getElementById('filasMedicos');
        let tr = document.createElement('tr');
        let tdNombre = document.createElement('td');
        tdNombre.innerHTML = medico.nombre;

        let tdApellido = document.createElement('td');
        tdApellido.innerHTML = medico.apellido;

        let tdEspecialidad = document.createElement('td');
        tdEspecialidad.innerHTML = medico.especialidad;

        let tdObrasSoc = document.createElement('td');
        medico.obras_sociales.forEach(function(obraSocial) {
            tdObrasSoc.innerHTML += '<li>' + obraSocial + '</li>';
        });
        
        tr.appendChild(tdNombre);
        tr.appendChild(tdApellido);
        tr.appendChild(tdEspecialidad);
        tr.appendChild(tdObrasSoc);

        filasTablaMedicos.appendChild(tr);
    }
    );

}
showMedicos();
*/
