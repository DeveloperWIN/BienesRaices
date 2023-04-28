<fieldset>
    <legend>Información General</legend>

    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="vendedor[nombre]" placehoolder="Nombre Vendedor" value="<?php echo sanitizar($vendedor->nombre); ?>">    

    <label for="apellido">Apellido:</label>
    <input type="text" id="apellido" name="vendedor[apellido]" placehoolder="Apellido Vendedor" value="<?php echo sanitizar($vendedor->apellido); ?>">

</fieldset>

<fieldset>
    <legend>Información Extra</legend>

    <label for="telefono">Teléfono:</label>
    <input type="text" id="telefono" name="vendedor[telefono]" placehoolder="Teléfono Vendedor" value="<?php echo sanitizar($vendedor->telefono); ?>">

</fieldset>