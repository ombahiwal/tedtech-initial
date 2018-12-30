<?php 
if(isset($_SESSION['ted_user'])){
    header('location:../../index.html');
}
?>
<!DOCTYPE HTML>
<html>
<head>
       <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <title> TedTech.in | Developer Registration.</title>
    <meta name="description" content="Register as a Developer to Tedtech.in"/>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="apple-touch-icon" sizes="57x57" href="../../favi/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="../../favi/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="../../favi/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="../../favi/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="../../favi/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="../../favi/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="../../favi/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="../../favi/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="../../favi/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="../../favi/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="../../favi/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="../../favi/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="../../favi/favicon-16x16.png">
<link rel="manifest" href="../../favi/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="../../favi/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    
    <style>

  
    </style>
<body>

    <link rel="stylesheet" href="../../styles/style_temp.css" type="text/css">
<div class="container">
    
  <form id="contact" action="./register_init.php" method="post" enctype="multipart/form-data">
      <center><img height="120vmin" src="../../images/logos/logo2.png">
          <br>
    <h3>Developer Registration</h3>
    <h4></h4></center>
    <fieldset>
      <input placeholder="Your name" type="text" tabindex="1" name="name" value="" autofocus required>
      <span class="error"></span>
    </fieldset>
    <fieldset>
      <input placeholder="Your Email Address" type="email" name="email" value="" tabindex="2" required>
      <span class="error"><?php if(isset($_GET['exists'])){
    echo "User already exists!";
} ?></span>
    </fieldset>
      
      
      
      <fieldset>
            
  <select id="getFname" onchange="admSelectCheck(this);" onchange="" style="" name="status" required>
             <option disabled selected>-- Select Status -- </option>
             <option value="1">Student</option>
             <option value="2">Professional</option>
             <option id="admOption1" value="4">Freelancer</option>
             <option id="admOption2" value="3">Other</option>
        </select>
          <div style="position: relative;
  overflow: hidden; float:right; width:40%" class="file btn" data-toggle="tooltip" data-placement="right" title="Please Upload Your Resume in PDF format Max. 5MB" >
							Upload Resumé
							<input  style="position: absolute;
  font-size: 50px;
  opacity: 0; 
  right: 0;
  top: 0;" type="file" name="fileToUpload" id="fileToUpload" accept="application/pdf"/>
						</div>
      </fieldset>
      <fieldset style="display:none" id="institution">
      <input  type="text" name="institution"  Placeholder="Institution or Company" data-toggle="tooltip" data-placement="right" title="Enter Your Institution or Company Name.">    
      </fieldset>
       <fieldset style="display:none" id="qualification">
      <input   class="disp" type="text" name="qualification"  Placeholder="Your Qualification, eg. B.Tech 2020" data-toggle="tooltip" data-placement="right" title="Enter Degree and Year of Passing, eg. B.Tech 2020.">    
      </fieldset>
        <fieldset>
      <textarea placeholder="Your Domains of Expertise. Eg. Java, Web Development, Machine Learning, Embedded Systems..." pattern="^([a-zA-Z0-9]+,?\s*)+$" type="text" name="domains" value="" tabindex="5" data-toggle="tooltip" data-placement="right" title="Enter your domains of expertise, seperated with commas" required></textarea>
    </fieldset>
      
      <fieldset>
      <input placeholder="Create New Password" name="password" id="password" type="password" onkeyup='check();' data-toggle="tooltip" data-placement="right" title=" Password must contain at least one digit/lowercase/uppercase letter and be at least six characters long " pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" required />
          <span class="error" id='message'></span> <span class="error" id="success"> </span>
      </fieldset>
     
      <fieldset>
      <input type="password" placeholder="Confirm Password" name="confirm_password" id="confirm_password" title="Confirm Password"  onkeyup='check();' required /> 
      </fieldset>
     <fieldset style="color:white;">
     <label class="customcheck">I agree to the <a href="#">terms and conditions</a> and <a target="_blank" href="../../docs/privacy-policy.txt">privacy policy</a>
          <input name="agreement" id="agreement" type="checkbox" title="please accept the terms to proceed" required>
          <span class="checkmark"></span>
        </label>
      </fieldset>
      
    <fieldset>
      <button id="submit" name="send" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
    </fieldset>
  </form>
</div>

    </body>
    <footer>
    &#9400; 2018 - TedTech.in
    </footer>
    <script>
    
  function checkPassword(str){
    // at least one number, one lowercase and one uppercase letter
    // at least six characters that are letters, numbers or the underscore
    //var re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])\w{6,}$/;
      var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;
    return re.test(str);
  }
        
    var check = function() {
      if (document.getElementById('password').value ==
          document.getElementById('confirm_password').value && document.getElementById('password').value !="") {
          document.getElementById('message').style.color = 'green';
          document.getElementById('message').innerHTML = 'Matched /';
          
      if(checkPassword(document.getElementById('password').value)){
      		document.getElementById('success').style.color = 'green';
          document.getElementById('success').innerHTML = 'Password Valid';
      }else{
      		document.getElementById('success').style.color = 'red';
             document.getElementById('success').innerHTML = 'Invalid Password'; 
          }
          
      } else {
      		document.getElementById('message').style.color = 'red';
          document.getElementById('message').innerHTML = 'Not Matched /';
          if(checkPassword(document.getElementById('password').value)){
      		document.getElementById('success').style.color = 'green';
          document.getElementById('success').innerHTML = 'Password Valid';}else{
      		document.getElementById('success').style.color = 'red';
             document.getElementById('success').innerHTML = 'Invalid Password'; 
          }
      }
  }
    $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
       function admSelectCheck(nameSelect)
{
    if(nameSelect){
        admOptionValue1 = document.getElementById("admOption1").value;
        admOptionValue2 = document.getElementById("admOption2").value;
        
    
        if(!(admOptionValue1 == nameSelect.value || admOptionValue2 == nameSelect.value)){
            document.getElementById("institution").style.display = "block";
            document.getElementById("qualification").style.display = "block";
            
        }
        else{
            document.getElementById("institution").style.display = "none";
            document.getElementById("qualification").style.display = "none";
            
        }
    }
    else{
            document.getElementById("qualification").style.display = "none";
        document.getElementById("institution").style.display = "none";
        document.getElementById("submit").disabled = true;        
    }
}

        
    </script>

</html>