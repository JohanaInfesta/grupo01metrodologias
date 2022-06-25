{include file="header.tpl"}

<div> 

    <div id="BusquedaPaciente">
        <form action="pacienteBusqueda" method="post" name="buscarPaciente" id="form_busqueda">
            <label for="">Ingrese DNI del paciente</label>
            <input type="number" name="buscarPaciente" id="buscarPaciente">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>
    </div>
    
    <div class="datosPaciente"> 
        {if $paciente neq "No se encuentra registrado" && $paciente neq ""}
            <p><strong>Nombre: </strong> {$paciente->nombre}, {$paciente->apellido} </p>
            <p><strong>DNI:</strong>  {$paciente->dni} </p>
            <p><strong>Direccion:</strong> {$paciente->direccion} </p>
            <p><strong>Telefono y mail:</strong> {$paciente->telefono} -  {$paciente->mail} </p>
            <p><strong>Obra social - Nro afiliado:</strong> {$paciente->id_obra_social} -  {$paciente->n_afiliado} </p>
        {else}
        {$paciente}
        {/if}
    </div>
    <div class="formTurno"> 
    </div>
</div>



{include file="footer.tpl"}