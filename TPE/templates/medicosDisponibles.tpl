{include file="header.tpl"}
<div>
    <div class="formBusqueda">

        <div id="filtroMedico">
            <label for="">ingrese el medico que desea buscar</label>
            <input type="text" id="buscarMedico">

        </div>

        <form action="filtrosBusqueda" method="post" name="form_busqueda" id="form_busqueda">
            <label for="especialidad">Seleccione especialidad: </label>
            <select class="especialidad" name="especialidad" >
            <option value="-1" >-------------</option>
            {foreach from=$especialidades item=$especialidad}
                <option value="{$especialidad->especialidad}">{$especialidad->especialidad}</option>
            {/foreach}
            </select>

            <label for="obrSoc">Seleccione Obra Social: </label>
            <select class="obrSoc" name="obraSocial" >
            <option value="-1" >-------------</option>
            {foreach from=$obraSociales item=$obraSocial}
                <option value="{$obraSocial->id_obra_social}">{$obraSocial->nombre_obra_social}</option>
            {/foreach}
            </select>
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>
    </div>
    <article>
        <div class="calendar">
            <h1>Medicos disponibles</h1>
            <div id="divTablaMedicos">
                <table class="table table-primary table-hover tablaMedicos " id="idTabla">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Especialidad</th>
                        </tr>
                    </thead>
                    <tbody id="filasMedicos">
                        {foreach from=$medicos item=$medico}
                            <tr class="filaMedico">
                                <td id="idNombre" value="{$medico->nombre}">{$medico->nombre}</td>
                                <td>{$medico->apellido}</td>
                                <td>{$medico->especialidad}</td>
                            </tr>
                        {/foreach}
                    </tbody>
                </table>
            </div>
        </div>
    </article>
</div>
<script src="js/showMedicos.js"></script>
<script src="js/buscarMedicos.js"></script>


{include file="footer.tpl"}