{include file="header.tpl"}
<section>
    <div class="divCalendar">
        <table id="calendar">
            <caption></caption>
            <thead>
                <tr>
                    <th>Lun</th><th>Mar</th><th>Mie</th><th>Jue</th><th>Vie</th><th>Sab</th><th>Dom</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        <div class="dsplNone modalHorarios"  id="modal"> 
            <h3>Horarios disponibles</h3>
            <div class=" " id="horarios">
            </div>
            <div class="container busquedaPaciente">
                <form action="pacienteBusqueda" method="post" name="buscarPaciente" id="form_busqueda">
                    <label for="buscarPaciente"><strong>Ingrese DNI del paciente</strong></label>
                    <input type="number" name="buscarPaciente" id="buscarPaciente">
                    <button id="busqueda_paciente" type="submit" class="btnBuscar">Buscar</button>
                </form>
            </div>
            <div class="flexCenter">
                <form action="confirmarTurno" method="post" id="form-confirm" class="formTurno">
                    <div id="datosPaciente"> 
                        {if $paciente neq "No se encuentra registrado el paciente..." && $paciente neq ""}
                            <p><strong>Nombre: </strong>{$paciente->nombre}, {$paciente->apellido}</p>
                            <input type="hidden" name="idPaciente" value={$paciente->dni}>
                        {else}
                            {$paciente}
                            <input type="hidden" name="idPaciente" id="idPaciente" value="">
                        {/if}
                        <label for="buscarMedico"><strong>Medico seleccionado:</strong></label>
                        <input type="text" name="" value="Guillermo Valerio" disabled>
                        <input type="hidden" name="medico" value="Guillermo Valerio">
                    </div>
                    <p name="Horario" id="horarioHTML"></p>
                    <p name="Fecha" id="fechaHTML"></p>
                    <div class="flexCenter">
                        <button class="btnConfirmar" type="submit">Confirmar</button>
                    </div>
                </form>
            </div>
            
            <div class="flexCenter btnSalir">
                <button id="closeModal">Salir</button>
            </div>
        </div>
    </div>
    <script src="js/index.js"></script>
</section>
{include file="footer.tpl"}