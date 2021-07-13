<!-- Footer -->
<div class="w3-row w3-center w3-padding-32 w3-text-white" style="background-color:rgb(51,63,80);">
  <div class="w3-quarter w3-section">
    <h3>Certifications</h3>
    <p><a href="choose_course" style="text-decoration:none" class="w3-hover-opacity">Python</a></p>
    <p><a href="choose_course" style="text-decoration:none" class="w3-hover-opacity">JavaScript</a></p>
    <p><a href="choose_course" style="text-decoration:none" class="w3-hover-opacity">C</a></p>
  </div>
  <div class="w3-quarter w3-section">
  <h4>Company</h4>
  <p><a href="about" style="text-decoration:none" class="w3-hover-opacity">About</a></p>
    <p><a href="#" style="text-decoration:none" class="w3-hover-opacity">Terms & Conditions</a></p>
    <p><a href="#" style="text-decoration:none" class="w3-hover-opacity">Privacy Policy</a></p>
  </div>
  <div class="w3-quarter w3-section">
  <h4>Resources</h4>
  <p><a href="blogs/index" style="text-decoration:none" class="w3-hover-opacity">Blogs</a></p>
    <p><a href="#" style="text-decoration:none" class="w3-hover-opacity">Blogs Catagory</a></p>
    <p><a href="blogs/blogs_create" style="text-decoration:none" class="w3-hover-opacity">Publish you own</a></p>
  </div>
  <div class="w3-quarter w3-section">
  <h4>Contact Us</h4>
  <p><a href="." style="text-decoration:none" class="w3-hover-opacity">softos.in</a></p>
    <p><a href="blogs/index" style="text-decoration:none" class="w3-hover-opacity">blogs.softos.in</a></p>
    <p><a href="#" style="text-decoration:none" class="w3-hover-opacity">team@softos.in</a></p>
  </div>
</div>


<footer class="w3-center w3-padding-64 w3-text-white"  style="background-color:rgb(51,63,80);">
  <div class="w3-xlarge w3-section">
    <a href="#"><i class="fa fa-facebook-official w3-hover-opacity w3-text-red"></i></a>
    <a href="https://www.instagram.com/softos.in/?hl=en"><i class="fa fa-instagram w3-hover-opacity w3-text-yellow"></i></a>
    <a href="#"><i class="fa fa-snapchat w3-hover-opacity w3-text-green"></i></a>
    <a href="#"><i class="fa fa-pinterest-p w3-hover-opacity w3-text-blue"></i></a>
    <a href="#"><i class="fa fa-twitter w3-hover-opacity w3-text-teal"></i></a>
    <a href="#"><i class="fa fa-linkedin w3-hover-opacity w3-text-purple"></i></a>
  </div>
  <a href="about.php" style="text-decoration:none;font-size:15px" class="w3-hover-text-grey w3--text-white w3-margin-right">About</a>
  <a href="#" style="text-decoration:none;font-size:15px" class="w3-hover-text-grey w3-text-white ">Terms & Conditions</a>
  
  <p class="w3-text-white">Powered by SoftOS Inc. | © SoftOS 2020</a></p>
</footer>
 

<script>

// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}

// Used to toggle the menu on small screens when clicking on the menu button
function toggleFunction() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}

// Tabbed Menu
function openMenu(evt, menuName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("menu");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" w3-dark-grey", "");
  }
  document.getElementById(menuName).style.display = "block";
  evt.currentTarget.firstElementChild.className += " w3-dark-grey";
}
document.getElementById("myLink").click();

function star(){
setTimeout(() => {
  document.getElementById("intro").style.display="block";
}, 3000);
};

function welcome_info_cut(){ 
  document.getElementById('intro').style.display='none';
}

function login_page(){
  document.getElementById('id01').style.display='block';
}

function click_on_signup(){
  window.open('signup.php','_self');
}

<!-- start Gist JS code-->
    (function(d,h,w){var gist=w.gist=w.gist||[];gist.methods=['trackPageView','identify','track','setAppId'];gist.factory=function(t){return function(){var e=Array.prototype.slice.call(arguments);e.unshift(t);gist.push(e);return gist;}};for(var i=0;i<gist.methods.length;i++){var c=gist.methods[i];gist[c]=gist.factory(c)}s=d.createElement('script'),s.src="https://widget.getgist.com",s.async=!0,e=d.getElementsByTagName(h)[0],e.appendChild(s),s.addEventListener('load',function(e){},!1),gist.setAppId("k4azwwwu"),gist.trackPageView()})(document,'head',window);
<!-- end Gist JS code-->


function chkpwd(){

var valid=document.getElementById('validation').value;
var valid_message=document.getElementById('valid_message');

if(valid.length==0)
{
valid_message.innerHTML="Enter password";
valid_message.style.color="red";
return false;
}else if(valid.length<8)
{
valid_message.innerHTML="Password is too short, must have length 8";
valid_message.style.color="red";
return false;
}else if(valid.search(/[0-9]/)==-1)
{
valid_message.innerHTML="Password must have numbers";
valid_message.style.color="red";
return false;
}
else if(valid.search(/[a-z]/)==-1)
{
valid_message.innerHTML="Password must have small alphabets";
valid_message.style.color="red";
return false;
}
else if(valid.search(/[A-Z]/)==-1)
{
valid_message.innerHTML="Password must have capital alphabets";
valid_message.style.color="red";
return false;
}
else if(valid.search(/[!\@\#\$\%\^\&\(\)\_\+\.\,\:\;]/)==-1)
{
valid_message.innerHTML="Password must have special characters";
valid_message.style.color="red";
return false;
}
else
{
return true;
}
}

function toggle_password(){
  var valider=document.getElementById('validation');
  if(valider.type=='password'){
    valider.type='text';
    document.getElementById("myimg").src = "images/admin/hide_password.png";
  }
  else{
    valider.type='password';
    document.getElementById("myimg").src = "images/admin/show_password.png";
  }
}


function profile_portal() {
  var x = document.getElementById("profile_portal");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}

function admin_portal() {
  var x = document.getElementById("admin_portal");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}

//Dashboard options
function dashFunction() {
    var x = document.getElementById("dashOpt");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>

</body>
</html>