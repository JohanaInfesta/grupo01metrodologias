{include file="headerSecretaria.tpl"}
    <div>
        <form action="filtrosMedico" method="post" name="" id="">
        <label for="obrSoc">Seleccione Medico: </label>
            <select class="id_medico" name="id_medico" >
            <option value="-1" >-------------</option>
            {foreach from=$medicos item=$medico} 
                    <option value="{$medico->id_medico}">{$medico->apellido} {$medico->nombre}</option>
            {/foreach}
            </select>
            <button type="submit" class="btn btn-primary">buscar </button>
        </form>

        <article>
        <div class=" ">
            <h1>Lista de turnos</h1>
            <div id="divTablaMedicos">
                <table class="table table-primary table-hover tablaMedicos " id="idTabla">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>dia</th>
                            <th>Horario</th>
                        </tr>
                    </thead>
                    <tbody id=" ">
                        {foreach from=$turnos item=$turno}
                            <tr class="filaMedico">
                                <td id="idNombre" value="">{$turno->nombre} {$turno->apellido}</td>
                                <td>{$turno->dia}</td>
                                <td>{$turno->horario}</td>
                                 <td><a href=" deleteTurno/{$turno->id}" id="deleteTurno">Borrar</a>
                            </tr>
                        {/foreach}
                    </tbody>
                </table>
            </div>
        </div>
    </article>
    </div>