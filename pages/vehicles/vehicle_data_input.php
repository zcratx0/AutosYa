
<div class="col s12">
    <div class="row">
        <div class="input-field col s6">
            <label for="brand">Marca</label>
            <input type="text" name="brand">
        </div>
        <div class="input-field col s6">
            <label for="model">Modelo</label>
            <input type="text" name="model" id="model">
        </div>
        <div class="input-field col s6">
            <label for="vehicletype">Tipo de vehiculo</label>
            <input type="text" name="vehicletype" id="vehicletype">
        </div>
        <div class="input-field col s6">
            <label for="year">Año</label>
            <input placeholder="." type="date" name="year" id="year">
        </div>
        <div class="input-field col s6">
            <label for="color">Color</label>
            <input type="text" name="color" id="color">
        </div>
        <div class="input-field col s6">
            <label for="url">Foto del auto</label>
            <input type="text" name="url" id="url">
        </div>
        <div class="input-field col s6">
            <label for="price">Precio</label>
            <input type="number" name="price" id="price">
        </div>
        <?php // Si sos admin ?>
    <?php if ($user_data['role'] == 'Admin' OR $user_data['role'] == 'Encargado') : ?>
        <div class="input-field col s6">
            <label for="vendedor_id">Id Vendedor</label>
            <input type="number" name="vendedor_id" id="vendedor_id">
        </div>
        <div class="input-field col s6">
            <label for="date_start">Fecha de inicio</label>
            <input type="text" name="model" id="model">
        </div>
        <div class="input-field col s6">
            <label for="date_end">Fecha de fin</label>
            <input type="text" name="model" id="model">
        </div>
    <?php endif; ?>
    </div>
</div>