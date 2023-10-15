function toggleOn(){   
  document.getElementById("navIcon1").style.display = "none"; 
  document.getElementById("navIcon2").style.display = "block"; 
  document.getElementById("navLinkWrapper").style.display = "block"; 
  document.getElementById("navMenu").style.width = "50%";    

}

function toggleOff(){
document.getElementById("navLinkWrapper").style.display = "none"; 
document.getElementById("navMenu").style.width = "0";  
document.getElementById("navIcon1").style.display = "block"; 
  document.getElementById("navIcon2").style.display = "none"; 
}

function openNavChild(activeDiv){
var i;
var x = document.getElementsByClassName("js-navChildTabs");
for (i = 0; i < x.length; i++) {
x[i].style.display = "none";  
}

var child_nav = document.getElementById(activeDiv);  
if (window.getComputedStyle(child_nav).display === "none") { 
child_nav.style.display = "block";   
}else{
child_nav.style.display = "none"; 
}
} 