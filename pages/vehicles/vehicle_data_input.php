
<div class="col s12">
    <div class="row">
        <div class="input-field col s6">
            <label for="brand">Marca</label>
            <input required required type="text" name="brand">
        </div>
        <div class="input-field col s6">
            <label for="model">Modelo</label>
            <input required type="text" name="model" id="model">
        </div>
        <div class="input-field col s6">
            <label for="vehicletype">Tipo de vehiculo</label>
            <input required type="text" name="vehicletype" id="vehicletype">
        </div>
        <div class="input-field col s6">
            <label for="year">Año</label>
            <input required placeholder="." type="number" name="year" id="year" max="9999" min="1769">
        </div>
        <div class="input-field col s6">
            <label for="color">Color</label>
            <input required type="text" name="color" id="color">
        </div>
        <div class="input-field col s6">
            <label for="url">Foto del auto</label>
            <input required type="text" name="url" id="url">
        </div>
        <div class="input-field col s6">
            <label for="price">Precio</label>
            <input required type="number" name="price" id="price">
        </div>
        <div class="input-field col s6">
            <label for="plate">Matricula</label>
            <input required type="text" name="plate" id="plate">
        </div>
        <div class="input-field col s6">
            <label for="passenger">Pasajeros</label>
            <input required type="number" name="passenger" id="passenger" min="1" max="99">
        </div>
        <?php // Si sos admin ?>
    <?php if ($user_data['role'] == 'Vendedor') : ?>
            
            <input required type="hidden" name="vendedor_id" value="<?php echo $user_data['id'];?>" readonly>
    <?php endif; ?>
    <?php if ($user_data['role'] == 'Admin' OR $user_data['role'] == 'Encargado') : ?>
        <div class="input-field col s6">
            <label for="vendedor_id">Id Vendedor</label>
            <input required type="number" name="vendedor_id" id="vendedor_id">
        </div>
    <?php endif; ?>
    </div>
</div>