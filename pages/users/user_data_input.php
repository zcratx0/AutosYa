    <div class="col s12">
        <div class="row">
            <div class="input-field col s6">
                <i class="material-icons prefix">account_circle</i>
                <label for="name">Nombre</label>
                <input type="text" name="name" value="<?php echo $user_data['name']?>" required>
            </div>
            <div class="input-field col s6">
                <label for="lastname">Apellido</label>
                <input type="text" name="lastname" value="<?php echo $user_data['lastname']?>">
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <i class="material-icons prefix">lock</i>
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password">
            </div>
            <div class="input-field col s6">
                <i class="material-icons prefix">lock</i>
                <label for="password1">Repetir Contraseña</label>
                <input type="password" name="password1" id="password1"  onclick="this.classList.remove('red');">
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <i class="material-icons prefix">email</i>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="<?php echo $user_data['mail']?>">
            </div>
            <div class="input-field col s6">
                <i class="material-icons prefix">phone</i>
                <label for="phonenumber">Numero de Telefono</label>
                <input type="tel" name="phonenumber" id="phonenumber" value="<?php echo $user_data['phonenumber']?>">
            </div>
        </div>
        <div class="row">
            <div class="col s6">
                <label for="documenttype">Tipo de documento</label>
                <p>
                    <label>
                        <input type="radio" name="documenttype" value="cedula" <?php if($user_data['documenttype'] == 'cedula') {echo 'checked';}?>>
                        <span>DNI</span>
                    </label>
                </p>
                <p>
                    <label>
                        <input type="radio" name="documenttype" value="pasaporte" <?php if($user_data['documenttype'] == 'pasaporte') {echo 'checked';}?>>
                        <span>Pasaporte</span>
                    </label>
                </p>
            </div>
            <div class="input-field col s6">
                <i class="material-icons prefix">recent_actors</i>
                <label for="document">Documento</label>
                <input type="text" name="document" id="document" value=" <?php echo $user_data['document']?>">
            </div>
        </div>
            <?php if (isset($admin) && $admin == true) : // Only for admins ?>
                <div class="row">
                    <div class="col s6">
                        <label for="state">Estado</label>
                        <select id="state" name="state">
                            <option value="Activado" selected >Activado</option>
                            <option value="Desactivado">Desactivado</option>
                            <option value="Borrado">Borrado</option>
                        </select>
                    </div>
                <div class="col s6">
                    <label for="role">Rango</label>
                    <select id="role">
                        <option value="Usuario" selected>Usuario</option>
                        <option value="Vendedor">Vendedor</option>
                        <option value="Encargado">Borrado</option>
                        <option value="Admin">Admin</option>
                    </select>                    
                </div>
            <?php endif; ?>
        </div>
    </div>
