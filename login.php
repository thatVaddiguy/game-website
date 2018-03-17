<?php
include ('common.php');
outputHeader('Login');
outputNavbar('Login');
?>

<!--Container to hold the modal login/signup form -->
<div class="container" style="height:100%">
  <div class="modal bs-modal-sm in" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="false">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <br>
        <div class="bs-example bs-example-tabs">
          <ul id="myTab" class="nav nav-tabs">
            <li class="active"><a href="#signin" data-toggle="tab">Sign In</a></li>
            <li class=""><a href="#signup" data-toggle="tab">Join us!</a></li>
          </ul>
        </div>
        <div class="modal-body">
          <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade active in" id="signin">
              <form class="form-horizontal">
                <fieldset>
                  <!--Sign In form -->
                  <!--Username field -->
                  <div class="control-group">
                    <label class="control-label" for="userid">Username:</label>
                    <div class="controls">
                      <input required="" id="userid" name="userid" type="text" class="form-control" placeholder="Demogorgan7712" class="input-medium" >
                    </div>
                  </div>
                  <!--Password field -->
                  <div class="control-group">
                    <label class="control-label" for="passwordinput">Password:</label>
                    <div class="controls">
                      <input required="" id="passwordinput" name="passwordinput" class="form-control" type="password" placeholder="********" class="input-medium">
                    </div>
                  </div>
                  <!--Sign in button-->
                  <div class="control-group">
                    <label class="control-label" for="signin"></label>
                    <div class="controls">
                      <button id="signin" type="button" onclick="login()" name="signin" class="btn btn-primary">Sign In</button>
                    </div>
                  </div>
                </fieldset>
                <p id="loginResult"></p>
              </form>
            </div>
            <div class="tab-pane fade" id="signup">
              <form class="form-horizontal" id="signupForm" onsubmit="register()">
                <fieldset>
                  <!-- Sign Up Form -->
                  <!--Name field -->
                  <div class="control-group">
                    <label class="control-label" for="Name">Name:</label>
                    <div class="controls">
                      <input id="Name" name="Name" class="form-control" type="text" placeholder="John Doe" class="input-large" required="">
                    </div>
                  </div>
                  <!--Email field -->
                  <div class="control-group">
                    <label class="control-label" for="Email">Email:</label>
                    <div class="controls">
                      <input id="Email" name="Email" class="form-control" type="email" placeholder="dustin@example.com" class="input-large" required="">
                    </div>
                  </div>
                  <!--Phone number field -->
                  <div class="control-group">
                    <label class="control-label" for="phoneNum">Phone Number:</label>
                    <div class="controls">
                      <input id="phoneNum" name="phoneNum" class="form-control" type="number" placeholder="0564769894" class="input-large" required="">
                    </div>
                  </div>
                  <!--Address field-->
                  <div class="control-group">
                    <label class="control-label" for="Address">Address:</label>
                    <div class="controls">
                      <input id="Address" name="Address" class="form-control" type="text" placeholder="XYZ Street , 891652" class="input-large" required="">
                    </div>
                  </div>
                  <!--Username field -->
                  <div class="control-group">
                    <label class="control-label" for="userName">Username:</label>
                    <div class="controls">
                      <input id="userName" name="userName" class="form-control" type="text" placeholder="D'art59" class="input-large" required="">
                    </div>
                  </div>
                  <!--Password field -->
                  <div class="control-group">
                    <label class="control-label" for="password">Password:</label>
                    <div class="controls">
                      <input id="password" name="password" class="form-control" type="password" placeholder="********" class="input-large" required="">
                    </div>
                  </div>
                  <!--Password verification field -->
                  <div class="control-group">
                    <label class="control-label" for="reenterpassword">Verify Password:</label>
                    <div class="controls">
                      <input id="reenterpassword" class="form-control" name="reenterpassword" type="password" placeholder="********" class="input-large" required="">
                    </div>
                  </div>
                  <!--Signup button -->
                  <div class="control-group">
                    <label class="control-label" for="confirmsignup"></label>
                    <div class="controls">
                      <button type="submit" id="confirmsignup" name="confirmsignup" class="btn btn-primary">Sign Up</button>
                    </div>
                  </div>
                </fieldset>
                <p id="registerResult"></p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  //function to take the user's details and place it in the array in the localStorage and keep the username as the key
  function register(){
    var usrObject = {};
    usrObject.name = document.getElementById('Name').value;
    usrObject.email = document.getElementById('Email').value;
    usrObject.phoneNum = document.getElementById('phoneNum').value;
    usrObject.address = document.getElementById('Address').value;
    usrObject.userName = document.getElementById('userName').value;
    usrObject.password = document.getElementById('password').value;
    usrObject.reenterpassword = document.getElementById('reenterpassword').value;
    //checks if the username is taken otherwise it saves the details
    if (usrObject.userName in localStorage) {
      document.getElementById('registerResult').innerHTML = usrObject.userName + "is taken try again";
    }else{
      localStorage[usrObject.userName] = JSON.stringify(usrObject);
      document.getElementById('registerResult').innerHTML = usrObject.userName + " Succesfully registered";
      document.getElementById('signupForm').reset();

    }
  }
  //function to login in the user into the website
  function login(){
    var username = document.getElementById('userid').value;
    //checks if the localStorage has the username otherwise it checks the password
    if(localStorage[username] === undefined){
      document.getElementById('loginResult').innerHTML = "Username not found"
      return;
    }
    else{
      var usrObj = JSON.parse(localStorage[username]);
      var password = document.getElementById('passwordinput').value;
      //checks if the password is same as the registered user
      if (password === usrObj.password) {
        window.location.assign("/home.php");
        document.getElementById('loginResult').innerHTML = usrObj.name + " is logged in";
        var loggedin = {};
        loggedin.name = usrObj.userName;
        loggedin.score = 0;
        localStorage.loggedinUsr = JSON.stringify(loggedin);
      }
      else{
        document.getElementById('loginResult').innerHTML = "Password not correct. Please try again";
      }
    }
  }
</script>

<?php
outputFooter();
?>
