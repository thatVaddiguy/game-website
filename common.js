//checks if there is a user ,then it removes the login/register button
if(localStorage.getItem("loggedinUsr")){
    var user = JSON.parse(localStorage.loggedinUsr);
    document.getElementById('user').innerHTML = "<a onclick='logout()'>"+ user.name +"</a>";
}

//clears the loggedinUsr
function logout(){
  localStorage.loggedinUsr = "";
  window.location.assign("/login.php");
}

//inserts initial dummy data into the leaderboard array
if (!localStorage.getItem("leaderboard")){
  var leaderboard = {};
  leaderboard.first = {name: "funhaus" , score:50};
  leaderboard.second = {name: "AchievementHunter", score:40};
  leaderboard.third = {name: "SugarPine7", score:30};
  localStorage.leaderboard = JSON.stringify(leaderboard);
}
