<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Académico</title>
    <link rel="stylesheet" href="style/styles.css">
</head>
<body>

<div class="encabezado-sistema">
    <h1>INSTITUTO NACIONAL "GENERAL FRANCISCO MENÉNDEZ"</h1>
    <h2>Sistema de Registro Académico</h2>

</div>

<div class="contenedor">

    <div class="barra-superior">

        <div class="acciones">
            <button  type="button" id="btnAgregar"><img src="img/agregarU.png" class="btn-acciones">&#43; Agregar</button>
            <button  type="button" id="btnEditar"><img src="img/editar.png" class="btn-acciones">&#9998; Editar</button>
            <button  type="button" id="btnEliminar"><img src="img/eliminar.png" class="btn-acciones">&#10006; Eliminar</button>
        </div>

        <div class="selector-seccion">
            <label for="seccion">SECCIÓN:</label>
            <select id="seccion"></select>
        </div>

    </div>

    <div class="tabla-contenedor">

        <table id="estudiantesTable">

            <thead>
                <tr>
                    <th></th>
                    <th>NIE</th>
                    <th>Apellidos</th>
                    <th>Nombres</th>
                    <th>Género</th>
                    <th>Fecha Nac.</th>
                    <th>Edad</th>
                    <th>Dirección</th>
                    <th>Estado</th>
                </tr>
            </thead>

            <tbody></tbody>

        </table>

    </div>

</div>

<dialog id="modalEstudiante" >

    <form id="formEstudiante">

        <h2>Registro de Estudiante</h2>
        <img src="img/equis.png" class="btnCerrarDialog" id="btnCerrarDialog">

        <div class="campo">
            <label for="nie">NIE</label>
            <input type="text" id="nie" name="nie" required>
        </div>

        <div class="campo">
            <label for="apellidos">Apellidos</label>
            <input type="text" id="apellidos" name="apellidos" required>
        </div>

        <div class="campo">
            <label for="nombres">Nombres</label>
            <input type="text" id="nombres" name="nombres" required>
        </div>

        <div class="campo">
            <label>Género</label>
            <div class="genero">
                <label><input type="radio" name="genero" value="F" required> Femenino</label>
                <label><input type="radio" name="genero" value="M"> Masculino</label>
            </div>
        </div>

        <div class="campo">
            <label for="fecha_nacimiento">Fecha de Nacimiento</label>
            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>
        </div>

        <div class="campo">
            <label for="direccion">Dirección</label>
            <input type="text" id="direccion" name="direccion" required>
        </div>

        <div class="campo">
            <label for="estado">Estado</label>
            <select id="estado" name="estado">
                <option value="Activo">Activo</option>
                <option value="Inactivo">Inactivo</option>
            </select>
        </div>

        <div class="botones-modal">
            <button type="submit">Guardar</button>
            <button type="button" id="btnCancelar">Cancelar</button>
        </div>

    </form>

</dialog>

<script src="js/app.js"></script>

</body>
</html>