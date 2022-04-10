<?php
  	if (!function_exists("search_bar_function")) {
  	  function search_bar_function($searchSecction) {
  	    if (isset($searchSecction)) {
  	      echo $searchSecction;
  	    } else {
  	      echo 'search';
  	    }
  	  }
  	}
?>

<nav>
  <div class="nav-wrapper" style="background-color: #1f88db;">
    <form method="get">
      <div class="input-field">
        <input style="color: #333333;" id="searchBar" name="<?php  search_bar_function($search_Attribute)?>" type="search" required>
        <label class="label-icon" for="search"><i class="material-icons">search</i></label>
        <i class="material-icons">close</i>
      </div>
    </form>
  </div>
</nav>

<?php

?>