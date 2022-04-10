<div class="row">
    
    <form action="" method="post" id='register' class="col">
    <?php if (isset($register_failed) && $register_failed == true) :?>
            <div class="card-panel red lighten-2">
                <span class="white-text">
                    Email ya en uso
                </span>
            </div>
    <?php endif; ?>
    <?php   require("user_data_input.php"); ?>
    <input type="hidden" name="register">
    <button type="submit" class="btn waves-effect waves-light col" >
        <span>Registrar</span>
        <i class="material-icons right">send</i>
    </button>
    </form>
</div>


<script>
    function checkPassword() {
        return document.getElementById('password') == document.getElementById('password1');
    }
    document.getElementById('register').addEventListener('submit', (event) => {
        
    })
</script>