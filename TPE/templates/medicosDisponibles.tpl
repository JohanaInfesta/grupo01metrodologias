{include file="header.tpl"}

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