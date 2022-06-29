{include file="headerSecretaria.tpl"}

<div id="formAsignarTurno">
    <h1>Asignar un Turno</h1>
    <p class="text-danger"><strong>{$message}</strong></p>
    <div id="content">
        <div id="BusquedaPaciente">
            <div>
                <form action="pacienteBusqueda" method="post" name="buscarPaciente" id="form_busqueda">
                    <label for="buscarPaciente"><strong>Ingrese DNI del paciente</strong></label>
                    <input type="number" name="buscarPaciente" id="buscarPaciente">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </form>
            </div>
            
            <div id="datosPaciente"> 
                {if $paciente neq "No se encuentra registrado el paciente..." && $paciente neq ""}
                    <p><strong>Nombre: </strong>{$paciente->nombre}, {$paciente->apellido}</p>
                    <p><strong>DNI:</strong>{$paciente->dni}</p>
                    <p><strong>Direccion:</strong>{$paciente->direccion}</p>
                    <p><strong>Telefono y mail:</strong>{$paciente->telefono} - {$paciente->mail}</p>
                    <p><strong>Obra social - Nro afiliado:</strong>{$paciente->nombre_obra_social} - {$paciente->n_afiliado}</p>
                {else}
                    {$paciente}
                {/if}
            </div>
        </div>

        <div> 
            {if $paciente neq "No se encuentra registrado el paciente..." && $paciente neq ""}
                <div>
                    <form action="turnoAsignado" method="post" name="crearTurno" id="formTurno">
                        <input type="hidden" name="dniPaciente" id="dniPaciente" value="{$paciente->dni}">
                        <label for="paciente"><strong>Paciente</strong></label>
                        <input type="text" name="paciente" id="pacienteTurno" value='{$paciente->nombre} {$paciente->apellido} / {$paciente->dni}' disabled>
                        <label for="fecha"><strong>Fecha</strong></label>
                        <input type="date" name="fecha" id="fechaTurno">
                        <label for="hora"><strong>Hora</strong></label>
                        <input type="time" name="hora" id="horarioTurno">

                        <label for="medico"><strong>Medico</strong></label>
                        <select name="medico" id="medicoTurno">
                            <option value="-1" selected>
                                Sin Seleccionar...
                            </option>
                            {foreach from=$medicos item=$medico}
                                <option value="{$medico->id_medico}">
                                    {$medico->nombre} {$medico->apellido} / {$medico->especialidad}
                                </option>
                            {/foreach}
                        </select>

                        <button type="submit" class="btn btn-primary">Asignar</button>
                    </form>
                </div>
            {else}
                <div>
                    <p>Esperando los datos del paciente para continuar con el proceso...</p> 
                    <form action="" method="" name="crearTurno" id="formTurno">
                        <label for="paciente">Paciente</label>
                        <input type="text" name="paciente" id="pacienteTurno" disabled>
                        <label for="fecha">Fecha</label>
                        <input type="date" name="fecha" id="fechaTurno" disabled>
                        <label for="hora">Horario</label>
                        <input type="time" name="hora" id="horarioTurno" disabled>

                        <label for="medico">Medico</label>
                        <select name="medico" id="medicoTurno" disabled></select>

                        <button type="submit" class="btn btn-primary" disabled>Asignar</button>
                    </form>
                </div>
            {/if}
        </div>
    </div>
</div>

{include file="footer.tpl"}