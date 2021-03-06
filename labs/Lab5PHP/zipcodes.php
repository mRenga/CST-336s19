<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <link href="zipcodes.css" rel="stylesheet" type="text/css" />

  <title>AJAX: Sign Up Page</title>

</head>

<body>
    
  <h1>Sign Up Form </h1>

  <form name="from" onsubmit="return check()" action="register.php" method="POST">
    <fieldset>
      <legend>Sign Up</legend>
      <div><label><span  id = "fname">First Name:</span></label><input type="text"></div>
      <div><label><span  id = "lname">Last Name:</span></label><input type="text"></div>
      <div><label><span  id = "email">Email:</span></label><input type="text"></div>
      <div><label><span  id = "number">Phone Number:</span></label><input type="text"></div>
      <div><label><span  id = "code">Zip Code:</span></label><input type="text" id="zip"></div>
      <div><label><span  id = "sity">City: </span><span id="city"></span></label></div>
      <div><label><span  id = "lat">Latitude: </span><span id="latitude"></span></label></div>
      <div><label><span  id = "long">Longitude: </span><span id="longitude"></span></label></div>
      <div><label><span  id = "stat">State:</span></label><input type="text" id="state"></div>
      <div><label><span  id = "county">Select a County:</span></label><select id="counties"></select></div>
      <div><label><span  id = "uname">Desired Username:</span></label><input name="username" type="text" id="name"><span id="checkSucc"></span> <span id="checkFail"></span></div>
      <div>
      <?php
        $options = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z', '1','2','3','4','5','6','7','8','9','0');
        $password = array();
        for($i =0; $i < 8; $i++){
          $password[$i] = $options[rand(0, 36)];
        }
      ?>
      </div>
      <div><label><span  id = "pass1">Password:</span></label><input name="password[]" type="password" id="p1"> <span id = "suggested"></span></div>
      <div><label><span  id = "pass2">Type Password Again:</span></label><input type="password" id="p2"> </div>
      <div><input type="submit" value="Sign up!"></div>
    </fieldset>

  </form>

  <script>
    //function callers
    $("#zip").change(getZip);
    $("#state").change(getCounty);
    $("#name").change(checkName);

    $name1 = "MLPmaxxipad";
    $name2 = "zizco";

  
    function getZip() {
      $.ajax({
        type: "get",
        url: "http://itcdland.csumb.edu/~milara/ajax/cityInfoByZip.php?",
        dataType: "json",
        data: {
          "zip": $("#zip").val(),
          "longitude": $("#longitude").val(),
          "latitude": $("#latitude").val()
        },
        success: function(data, status) {
          if (!data.zip) {
            $('#longitude').html("");
            $('#latitude').html("");
            $('#city').html("This zip code does not exist");
          }
          else {
            $('#longitude').html(data.longitude);
            $('#latitude').html(data.latitude);
            $('#city').html(data.city);
          }
        },
        complete: function(data, status) { //optional, used for debugging purposes
          //console.log(status);
        }
      });
    }

    function getCounty() {
      $.ajax({
        type: "get",
        url: "http://itcdland.csumb.edu/~milara/ajax/countyList.php?",
        dataType: "json",
        data: {
          "state": $("#state").val()
        },
        success: function(data, status) {
          $('#counties').html("");
          for (var i = 0; i < data.length; i++) {
            $('#counties').append(new Option(data[i]["county"], "value"));
          }
        },
        complete: function(data, status) { //optional, used for debugging purposes
          //console.log(status);
        }
      });
    }

    function checkName() {
      if ($('#name').val() == $name1 || $('#name').val() == $name2) {
        $('#checkSucc').html("");
        $('#checkFail').html("This username is unavailable!");
        return false;
      }
      else {
        $('#checkFail').html("");
        $('#checkSucc').html("Username available");
        $('#suggested').html("Suggested password: <?php for($i =0; $i < 8; $i++){echo $password[$i];} ?>")
        return true;
      }
    }

    function check() {
      if (!checkName()) {
        alert("Username is taken");
        return false;
      }
      if ($('#p1').val() != $('#p2').val()) {
        alert("Passwords do not match");
        return false;
      }
      var username = document.getElementById("name").value
      var passWord = document.getElementById("p1").value
      if (passWord.indexOf(username) > -1 ) {
        alert("Password cannot contain username");
        return false;
      }
    }
    
    
  </script>

</body>

<footer>
  <hr>CST 336. 2019&copy; Renga <br/>
  <strong>Disclaimer:</strong> The information in this website is fictitious. <br/> It is used for academic purposes only.
</footer>

</html>