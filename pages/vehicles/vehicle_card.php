<?php
    	require_once($_SERVER['DOCUMENT_ROOT'].'/V2/models/vehicle_model.php');
        
?>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>

    <!-- <div class="row s12"> -->
                            <div class="col s3">
                                <div class="card small">
                                    <div class="card-image waves-effect waves-block waves-light">
                                        <img class="activator" src="https://www.cocinayvino.com/wp-content/uploads/2020/03/Muffins-con-pasas-e1584117645212-1200x900.jpg">
                                    </div>
                                    <div class="card-content">
                                    <span class="card-title activator grey-text text-darken-4"><?php echo($car['brand']);?></span>
                                    <button class="btn waves-effect waves-light activator right" type="submit" name="action">Ver mas</button>
                                    </div>
                                    <div class="card-reveal">
                                        <span class="card-title grey-text text-darken-4">Ofrecido por: <?php echo($car['vendedor_id']);?><i class="material-icons right">close</i></span>
                                        <p>
                                            <b>Modelo:</b> <?php echo($car['model']); ?><br>
                                            <b>Pasajeros:</b> <?php echo($car['passenger']); ?><br>
                                            <b>Color:</b> <?php echo($car['color']); ?><br>
                                            <b>Año:</b> <?php echo($car['year']); ?><br>
                                            
                                            <br>
                                            <b>Disponibilidad:</b> </br><?php echo($car['date_start']); ?> - <?php echo($car['date_end']); ?><br>
                                            
                                            <span style="font-size:20px;">
                                                $<?php echo($car['price']); ?><br>
                                            </span>

                                            <form method='get'><input type='hidden' name='id_auto' value='$i[id]'><button type='submit' class="waves-effect waves-light btn green">Reservar</button></form>
                                        </p>
                                    </div>
                                </div>
                            </div>
    <!-- </div> -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script type="text/javascript" src="../js/materialize.js"></script>
    <script>M.AutoInit();
    </script>
  

