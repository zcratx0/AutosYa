<?php
$NUM = $count_vehicle_total[0][0];
$Pages = $NUM / 8;
?>
<ul class="pagination center">
<?php

for ($i = 0; $i < $Pages; $i ++) {
  echo "<li class='waves-effect ";
  if ($_GET['search_paginator'] == $i+1) {
    echo "disabled active blue' style='padding: 0 2px;'";
    echo "><a style='color: #ffffff;' href='index.php?search_paginator=";
  }
  else {
    echo "blue lighten-4' style='padding: 0 2px;'";
    echo "><a href='index.php?search_paginator=";
  }
   
    echo $i+1;
    echo "'>";
    echo $i+1;
    echo "</a></li>";

}
?>
  </ul>
  <footer class="page-footer blue">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">About Us</h5>
                <p class="grey-text text-lighten-4">Autos Ya! es una pagina web de alquiler de vehiculos publicados por los usuario.</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © <script>document.write(new Date().getFullYear())</script> Matias Sanchez
            <a class="grey-text text-lighten-4 right" target="_blank" href="https://github.com/zcratx0">More Links</a>
            </div>
          </div>
          
</footer>