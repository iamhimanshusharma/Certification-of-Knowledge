<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.alert {
  padding: 20px;
  background-color: white;
  color: black;
}

.closebtn {
  margin-left: 15px;
  color: black;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: grey;
}
</style>

<body onload="star()" >

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-card" id="myNavbar">
    <a class="w3-bar-item w3-hide-medium w3-hide-large w3-right" href="javascript:void(0);" onclick="toggleFunction()" title="Toggle Navigation Menu" style="margin-top:8px">
      <img src="images/admin/softos_bar.png" width="50px" alt="">
    </a>
    <img src="images/admin/softos2.png" class="w3-left w3-margin-left" alt="" width="144px" height="81px">
      <a onclick="window.open('login','_self')"><img src="images/admin/login_logo.png" alt="login" width="50px" height="50px" class="w3-card w3-margin-top w3-circle w3-right w3-margin-right w3-border w3-hover-opacity"></a>
    <button onclick="window.open('signup','_self')" class="w3-card w3-button w3-blue w3-hide-small w3-large w3-margin-top w3-right w3-margin-right w3-round-large">SignUp</button>
    
      <a href="community" class="w3-bar-item w3-hover-white w3-button w3-round-large w3-hover-shadow w3-hide-small w3-right w3-margin-top w3-margin-right  w3-text-grey"><i class="fa fa-group"></i> COMMUNITY</a>
      <a href="." class="w3-bar-item w3-button w3-hide-small w3-hover-white  w3-round-large w3-hover-shadow  w3-right w3-margin-top w3-text-grey w3-margin-right"><i class="fa fa-home"></i> HOME</a>
    </div>
   
    <!-- Navbar on small screens -->

      <div class="w3-container">
      <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-right w3-card w3-round  w3-animate-right"> 
      <a href="." class="w3-bar-item w3-button w3-round w3-margin w3-text-grey w3-hover-text-white"  style="width:150px;margin-top:5px">Home</a>
    <a href="community" class="w3-bar-item w3-button w3-round w3-margin w3-text-grey  w3-hover-text-white" style="width:150px;margin-top:5px">Community</a>
     </div>
     </div>
  </div>
  