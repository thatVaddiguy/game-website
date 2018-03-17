<?php

//outputs header for the websites
function outputHeader($title){
  echo '<DOCTYPE html>';
  echo '<html>';
  echo '<head>';
  echo '<title>Space Madness - '.$title.'</title>';
  //meta tags
  echo '<meta charset="utf-8">';
  echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
  //sets the scripts and links to the css files
  if ($title == 'About') {
    echo '<!--Link for icons-->';
    echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">';
  }
  echo '<!--Fonts links-->';
  echo '<link href="https://fonts.googleapis.com/css?family=Signika" rel="stylesheet">';
  echo '<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">';
  echo '<!--Bootstrap and Jquery links-->';
  echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">';
  echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>';
  echo '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>';
  echo '<!--Local CSS files-->';
  echo '<link rel="stylesheet" type="text/css" href="css/default.css">';
  echo '<link rel="stylesheet" type="text/css" href="css/'.strtolower($title).'.css">';
  echo '</head>';
  echo '<body>';
}

//sets the navbar on the page
function outputNavbar($pageName){
  echo '<nav class="navbar navbar-inverse">';
  echo '<div class="container-fluid">';
  echo '<div class="navbar-header">';
  echo '<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">';
  $a = 0;
  while ($a <= 2) {
    echo '<span class="icon-bar"></span>';
    $a += 1;
  }
  echo '</button>';
  echo '<img class="navbar-brand" src="images/logo.png" alt="logo">';
  echo '</div>';
  //arrays holding the name of the files to link and their names
  $linkNames = array("Home","Leaderboard","About","Login/Register");
  $linkAddress = array("home.php","leaderboard.php","about.php","login.php");
  echo '<div class="collapse navbar-collapse" id="myNavbar">';
  echo '<ul class="nav navbar-nav">';
  for ($i=0; $i < count($linkNames) - 1 ; $i++) {
    echo '<li ';
    //makes sure the active page is highlighted on the navbar
    if ($linkNames[$i] == $pageName) {
      echo 'class="active">';
    }else{
      echo '>';
    }
    echo '<a href="'.$linkAddress[$i].'">'.$linkNames[$i].'</a></li>';
  }
  echo '</ul>';
  echo '<ul class="nav navbar-nav navbar-right">';
  echo '<li id="user" ';
  if ($pageName == 'Login') {
    echo 'class="active"';
  }
  echo '><a href="'.$linkAddress[3].'"><span class="glyphicon glyphicon-log-in"></span> '.$linkNames[3].'</a></li>';
  echo '</ul>';
  echo '</div>';
  echo '</div>';
  echo '</nav>';
}

//sets the footer on the page
function outputFooter(){
  echo '<script src="common.js" type="text/javascript"></script>';
  echo '</body>';
  echo '<footer class="container-fluid text-center">';
  echo '<p>Website made by Rohit Vaddi</p>';
  echo '</footer>';
  echo '</html>';
}

?>
