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

            <div class="flexCenter">
                <form action="confirmarTurno" method="post" id="form-confirm" class="formTurno">
                    <h4>Confirmar turno</h4>
                    <div>
                        Aca iria busqueda de paciente
                    </div>
                    
                    <div>
                        Aca se mostraria el medico previamente seleccionado
                    </div>
                    <p name="Horario" id="horarioHTML"></p>
                    <p name="Fecha" id="fechaHTML"></p>
                    <button type="submit">Confirmar turno</button>
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