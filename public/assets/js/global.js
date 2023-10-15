//_____GENERAL | PROPERTY_______________________________________    
function profileTabController(tabName) {
    var i;
    var x = document.getElementsByClassName("profileTab");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";  
    }
    document.getElementById( tabName).style.display = "block";  
  }

  function publicJournalController() { 
    var closeWid = document.getElementById("closeWid"); 
    if (window.getComputedStyle(closeWid).display === "block") { 
      closeWid.style.display = "none";  
      document.getElementById("openWid").style.display = "block";
      document.getElementById("publicJournalsWrapper").style.display = "none";
      document.getElementById("publicJournalsWarn").style.display = "block";
    }else{
      closeWid.style.display = "block";  
      document.getElementById("openWid").style.display = "none";
      document.getElementById("publicJournalsWrapper").style.display = "block";
      document.getElementById("publicJournalsWarn").style.display = "none";
    }   
  }
//_____ALL Window Onload | PROPERTY_______________________________________     


 function controlPopup(sectionID){
    var activePage = document.getElementById(sectionID); 
    if (window.getComputedStyle(activePage).display === "none") { 
        activePage.style.display =  "block"; 
        toggleOff();
    }else{
        activePage.style.display =  "none";  
    }
 }

  
/*__________Tab Control | PROPERTY________________  
 * HOW I SOLVED AND BUILT THE TAB CONTROL SYSTEM: 
 * I am using the function to collect the current active tab on click (by requesting a param).
 * In line 2 of the function am getting all element with the class name "js-tab"
 * and hidding them using "display:none;", so lastly am showing the active class.  
 * 
 **/
  function tabController(tabName) {
    var i;
    var x = document.getElementsByClassName("js-sec-tabs");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";  
    }
    document.getElementById(tabName).style.display = "block"; 
    toggleOff();
  }
 
 function yyyy(){
  document.getElementById("yyB").style.display = "block"; 
    document.getElementById("yyA").style.display = "none";  
 }

 function openAndClose(widget){
    var theWidget = document.getElementById(widget);
    var SSDR_arrow_img = document.getElementById('js-SSDR-arrow-img');
    if (window.getComputedStyle(theWidget).display === "none") { 
      theWidget.style.display =  "block";
      SSDR_arrow_img.src = "http://localhost/success/ibts/public/assets/images/arrow_up.png";  
    }else{
      SSDR_arrow_img.src = "http://localhost/success/ibts/public/assets/images/arrow_down.png";  
      theWidget.style.display =  "none";  
    }
 }

 function openAndCloseDynamic(modify,record){
  var modify_TS = document.getElementById(modify);
  var record_TS = document.getElementById(record);
  var MSR_arrow_img = document.getElementById('js-MSR-arrow-img');
  if (window.getComputedStyle(modify_TS).display === "none") { 
    modify_TS.style.display =  "block";
    record_TS.style.display =  "none";
    MSR_arrow_img.src = "http://localhost/success/ibts/public/assets/images/arrow_up.png";  
  }else{
    MSR_arrow_img.src = "http://localhost/success/ibts/public/assets/images/arrow_down.png";  
    modify_TS.style.display =  "none";  
    record_TS.style.display =  "Block";  
  }
}

function getLink_NT(url) {
    window.open(url, "_blank");
}
  
/*__________Risk Management Calculator | PROPERTY______________ **/ 
function calculateRiskSize() {
  const riskPercentage = parseFloat(document.getElementById("riskPercentage").value);
  const stopLossPips = parseFloat(document.getElementById("stopLossPips").value);
  const accountBalance = parseFloat(document.getElementById("accountBalance").value);

  if (isNaN(riskPercentage) || isNaN(stopLossPips) || isNaN(accountBalance)) {
      document.getElementById("result").textContent = "Please enter valid numbers.";
      document.getElementById("amountInRisk").textContent = "";
      return;
  }

  const lotSize = (accountBalance * (riskPercentage / 100)) / (stopLossPips * 10);
  const amountInRisk = lotSize * (stopLossPips * 10); 
  document.getElementById("resultWrapper").style.display = "block";
  document.getElementById("result").textContent = 'Standard Lots:' +" "+ lotSize;
  document.getElementById("amountInRisk").textContent = 'Amount in Risk ($):' +" "+ amountInRisk;
}  
/*__________Risk Management Calculator | CLOSED______________ **/ 

