<div class="col s3">
     <div class="card small">
         <div class="card-image waves-effect waves-block waves-light">
             <img class="activator" src="<?php echo($car['url']);?>">
         </div>
         <div class="card-content">
         <span class="card-title activator grey-text text-darken-4"><?php echo($car['brand']);?></span>
         <button class="btn waves-effect waves-light activator right" type="submit" name="action">Ver mas</button>
         </div>
         <div class="card-reveal">
             <span class="card-title grey-text text-darken-4">Ofrecido por: <?php echo($car['vendedor_id']);?><i class="material-icons right">close</i></span>
             <p>
                 <b>Modelo:</b> <?php echo($car['model']); ?><br>
                 <b>Tipo:</b> <?php echo($car['vehicletype']); ?><br>
                 <b>Pasajeros:</b> <?php echo($car['passenger']); ?><br>
                 <b>Color:</b> <?php echo($car['color']); ?><br>
                 <b>Año:</b> <?php echo($car['year']); ?><br>
                 
                 <br>                                            
                 <span style="font-size:20px;">
                     $<?php echo($car['price']); ?><br>
                 </span>
                    <?php if (isset($_SESSION['loged'])) : ?>
                     <form method='get'><input type='hidden' name='id_auto' value='<?php echo($car['id']); ?>'><button type='submit' class="waves-effect waves-light btn green">Reservar</button></form>
                    <?php else :?>
                        <a type='submit' class="modal-trigger waves-effect waves-light btn green" href="#login">Logueate para Reservar</a>
                    <?php endif; ?>

                    
             </p>
         </div>
     </div>
 </div>


