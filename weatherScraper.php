
<div class="container">
        <h1>What's The Weather?</h1>
        <form>
          <fieldset class="form-group">
            <label for="city">Enter the name of a city.</label>
            <input type="text" class="form-control" name="city" id="city" aria-describedby="emailHelp" placeholder="Eg. London, Tokyo" value="<?php
                if(array_key_exists('city', $_GET)) {
                    echo $_GET['city'];
                }
             ?>">
          </fieldset>

          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <div id="weather">
            <?php
                if($weather) {
                    echo '<div class="alert alert-success" role="alert">'.$weather.'</div>';
                } else  if($error) {
                    echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
                }
            ?>
        </div>
    </div>
