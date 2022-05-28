{include file="header.tpl"}

<div class="formBusqueda">
    <form action="" method="post" name="form_busqueda" id="form_busqueda">
        <label for="especialidad">Seleccione especialidad: </label>
        <select class="especialidad">
        <option value="-1" >-------------</option>
        {foreach from=$especialidades item=$especialidad}
            <option value="">{$especialidad->especialidad}</option>
        {/foreach}
        </select>

        <label for="obrSoc">Seleccione Obra Social: </label>
        <select class="obrSoc">
        <option value="-1" >-------------</option>
        {foreach from=$obraSociales item=$obraSocial}
            <option value="{$obraSocial->id_obra_social}">{$obraSocial->nombre}</option>
        {/foreach}
        </select>
        <button type="submit" class="btn btn-primary">Buscar</button>
    </form>
</div>
<article>
    <div class="calendar">
        <h1>Medicos disponibles</h1>
        <div id="divTablaMedicos">
            <table class="table table-primary table-hover tablaMedicos">
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
                            <td>{$medico->nombre}</td>
                            <td>{$medico->apellido}</td>
                            <td>{$medico->especialidad}</td>
                        </tr>
                    {/foreach}
                </tbody>
            </table>
        </div>
    </div>
</article>

<script src="js/(OBSOLETE)showMedicos.js"></script>
{include file="footer.tpl"}