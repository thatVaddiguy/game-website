<?php
include ('common.php');
outputHeader('Home');
outputNavbar('Home');

?>

<!--Container to hold all the main content -->
<div class="container-fluid text-center">
  <div class="row content">
    <div class="col-sm-9 text-center">
        <h1>Space Madness</h1>
    </div>
    <!--Container to hold the placeholder image for the game -->
    <div class="container">
      <div class="col-sm-9">
        <canvas id="background" width="600" height="360">
          Your browser does not support.
        </canvas>
        <canvas id="main" width="600" height="360">
        </canvas>
        <canvas id="ship" width="600" height="360">
        </canvas>
        <div class="score">SCORE: <span id="score"></span></div>
        <div class="game-over" id="game-over">GAME OVER<p><span onclick="game.restart()">Restart</span></p></div>
        <div class="loading" id="loading">LOADING .... <p>Please Wait</p></div>
        <script src="space_madness.js"></script>
      </div>

      <!--Container to hold the sidenav -->
      <div class="col-sm-3 sidenav">
        <div class="well">
          <h4>Game Description</h4>
          <p>We thought the aliens were coming to help us but, we were WRONG. Now you are the last hope to save earth, make every bullet count</p>
        </div>
        <div class="well">
          <h4>Game Instructions</h4>
          <p>Use the arrow keys to move you space vessel and spacebar to fire at the alien scum</p>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
outputFooter();
?>
