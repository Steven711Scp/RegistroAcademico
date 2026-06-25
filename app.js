let id = null;
let process = 'new';
let id_seccion = null;

document.addEventListener('DOMContentLoaded', () => {

    cargarSecciones();

    document.getElementById('seccion').addEventListener('change', () => {
        id = null;
        cargarEstudiantes();
    });

    document.getElementById('formEstudiante').addEventListener('submit', (e) => {
        e.preventDefault();
        guardar();
    });

    document.getElementById('btnAgregar').addEventListener('click', () => {
        process = 'new';
        document.getElementById('formEstudiante').reset();
        document.getElementById('modalEstudiante').showModal();
    });

    document.getElementById('btnCancelar').addEventListener('click', () => {
        document.getElementById('modalEstudiante').close();
    });
     document.getElementById('btnCerrarDialog').addEventListener('click', () => {
        document.getElementById('modalEstudiante').close();
    });

    document.getElementById('btnEditar').addEventListener('click', () => {
        if(id){
            process = 'update';
            editar();
        }else{
            alert('Seleccione un estudiante');
        }
    });

    document.getElementById('btnEliminar').addEventListener('click', () => {
        eliminar();
    });

});

function cargarSecciones(){
    fetch('cargar_secciones.php')
    .then(response => response.json())
    .then(data => {
        let select = document.getElementById('seccion');
        select.innerHTML = '';
        data.forEach(sec => {
            select.innerHTML += `<option value="${sec.id_seccion}">${sec.nombre}</option>`;
        });
        cargarEstudiantes();
    });
}

function cargarEstudiantes(){
    id_seccion = document.getElementById('seccion').value;
    const fd = new FormData();
    fd.append('id_seccion', id_seccion);
    fetch('cargar_estudiantes.php', {
        method: 'POST',
        body: fd
    })
    .then(response => response.json())
    .then(data => {
        const tbody = document.querySelector('#estudiantesTable tbody');
        tbody.innerHTML = '';
        data.forEach(est => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${est.correlativo}</td>
                <td>${est.nie}</td>
                <td>${est.apellidos}</td>
                <td>${est.nombres}</td>
                <td>${est.genero}</td>
                <td>${est.fecha_nacimiento}</td>
                <td>${est.edad}</td>
                <td>${est.direccion}</td>
                <td>${est.estado}</td>
            `;
            row.addEventListener('click', () => {
                id = est.correlativo;
                let filas = document.getElementsByTagName('tr');
                for(let i = 0; i < filas.length; i++){
                    filas[i].style.background = '';
                }
                row.style.background = 'lightblue';
            });
            tbody.appendChild(row);
        });
    })
    .catch(error => console.error('Error:', error));
}

function guardar(){
    const fd = new FormData(document.getElementById('formEstudiante'));
    fd.append('process', process);
    fd.append('id', id);
    fd.append('id_seccion', id_seccion);
    fetch('guardar.php', {
        method: 'POST',
        body: fd
    })
    .then(response => response.json())
    .then(data => {
        id = null;
        document.getElementById('modalEstudiante').close();
        cargarEstudiantes();
        console.log(data);
    });
}

function editar(){
    const fd = new FormData();
    fd.append('id', id);
    fetch('editar.php', {
        method: 'POST',
        body: fd
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById('nie').value = data.nie;
        document.getElementById('apellidos').value = data.apellidos;
        document.getElementById('nombres').value = data.nombres;
        document.getElementById('fecha_nacimiento').value = data.fecha_nacimiento;
        document.getElementById('direccion').value = data.direccion;
        document.getElementById('estado').value = data.estado;
        if(data.genero == 'F'){
            document.querySelector('input[value="F"]').checked = true;
        }else{
            document.querySelector('input[value="M"]').checked = true;
        }
        document.getElementById('modalEstudiante').showModal();
    });
}

function eliminar(){
    if(id){
        if(confirm('¿Esta seguro de eliminar este estudiante?')){
            const fd = new FormData();
            fd.append('id', id);
            fetch('eliminar.php', {
                method: 'POST',
                body: fd
            })
            .then(response => response.json())
            .then(data => {
                id = null;
                cargarEstudiantes();
            });
        }
    }else
        alert('Debe seleccionar un estudiante');
}