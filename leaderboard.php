<?php
include ('common.php');
outputHeader('Leaderboard');
outputNavbar('Leaderboard');
?>

<!--Container to hold the leaderboard and the content -->
<div class="container">
  <div class="col-md-8">
    <h2>Leaderboard</h2>
    <p>
      Don't see your name on the Leaderboard yet ?
      Keep playing and you could become the best alien slayer on the planet
    </p>
    <!--Table to hold the rankings data -->
    <table class="table table-responsive table-striped">
      <thead>
        <tr>
          <th>Rank</th>
          <th>Username</th>
          <th>Title</th>
          <th>Score</th>
        </tr>
      </thead>
      <tbody>
        <tr id="first">
          <td>1</td>
          <td id="firstName">funhaus</td>
          <td>Top Slayer</td>
          <td id="firstScore">50</td>
        </tr>
        <tr id="second">
          <td>2</td>
          <td id="secondName">AchievementHunter</td>
          <td>Good Slayer</td>
          <td id="secondScore">40</td>
        </tr>
        <tr id="third">
          <td>3</td>
          <td id="thirdName">SugarPine7</td>
          <td>"Just Happy to be here" slayer</td>
          <td id="thirdScore">30</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
<script>
//checking if the users new score goes on the Leaderboard
var leaderboard = JSON.parse(localStorage.leaderboard);
var user = JSON.parse(localStorage.loggedinUsr);
//checking if the score should be on leaderboard
if (user.score > leaderboard.first.score) {
  leaderboard.second = leaderboard.first;
  leaderboard.first = user;
}else if(user.score >leaderboard.second.score){
  leaderboard.third = leaderboard.second;
  leaderboard.second = user;
}else if(user.score > leaderboard.third.score){
  leaderboard.third = user;
}
localStorage.leaderboard = JSON.stringify(leaderboard);

//adding the data from the leaderboard array onto the leaderboard table
document.getElementById('firstName').innerHTML = leaderboard.first.name;
document.getElementById('firstScore').innerHTML = leaderboard.first.score;
document.getElementById('secondName').innerHTML = leaderboard.second.name;
document.getElementById('secondScore').innerHTML = leaderboard.second.score;
document.getElementById('thirdName').innerHTML = leaderboard.third.name;
document.getElementById('thirdScore').innerHTML = leaderboard.third.score;
</script>

<?php
outputFooter();
?>
