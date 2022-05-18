{include file="header.tpl"}
<div>
    <div class="" id="divOpacity">
    </div>
    <div class="calendar">
        <h1>Calendario</h1>
            <div class="week">
                <h3>Domingo</h3>
                <h3>Lunes</h3>
                <h3>Martes</h3>
                <h3>Miercoles</h3>
                <h3>Jueves</h3>
                <h3>Viernes</h3>
                <h3>Sabado</h3>
            </div>
            <div id="dates" class="dates">
            </div>
        </div>
        <div class="dsplNone modalHorarios"  id="modal"> 
            <h3>Horarios disponibles</h3>
            <div class=" " id="horarios">
            </div>
            <div class="btnSalir">
                <button id="closeModal">Salir</button>
            </div>
        </div>
    </div>
    <script src="js/index.js"></script>
</div>
{include file="footer.tpl"}