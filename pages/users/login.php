<?php
?>


<div class="col">
    <form method="post">
        <?php if (isset($login_failed) && $login_failed == true) :?>
            <div class="card-panel red lighten-2">
                <span class="white-text">
                    Usuario o contraseña incorrectos
                </span>
            </div>
        <?php endif; ?>
        <input type="hidden" name="login">
        <div class="input-field row s5">
            <i class="material-icons prefix">email</i>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div class="input-field row s5">
            <i class="material-icons prefix">lock</i>
            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password" required>
        </div>
        <div class="input-field row s5">
            <button type="submit" name="login"class="btn waves-effect waves-light">
                    <span>Login</span>
                    <i class="material-icons right">send</i>
            </button>
        </div>
    </form>
</div>