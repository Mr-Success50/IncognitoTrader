<?php $this->view('includes/header',$data) ?>
</head> 
<body style="height: 100vh;">
<?php $this->view('includes/nav',$data) ?>

<main id="main" > 
   <section id="journalPopUp" class="generalPopUp"> 
      <div class="generalPopUp-child">
      <p>Sorry, but you must create an acount to use the Journal</p>
         <button><a style="color:white;" href="<?=ROOT?>/login">Proceed</a></button>
         <button onclick="controlPopup('journalPopUp')">Cancel</button>
      </div>
   </section>
      
   <section id="unvailablePopUp" class="generalPopUp"> 
      <div class="generalPopUp-child">
      <p>This Tool is currently unavailable at the moment, 
         keep an eye on our Telegram group for anouncement when ready.</p>
         <button><a style="color:white;" href="https://t.me/+vbD1QTXgje8zMjc0">Join</a></button> 
         <button onclick="controlPopup('unvailablePopUp')">Okay</button>
      </div>
   </section>

   <section class="section1">
     <div style="padding-top:30px;">
      <h1 class="intro-head">Incognito Billionaire Trader Society</h1>
      <p class="intro-sub-head">
          We provide premium trading tools, ICT based daily market analysis, indicators, expert advisor, e-books and community help.
      </p>
     </div>
     <div class="sec1_div2">
      <h2 style="font-size:22px;font-weight:bold;">Our Tools</h2>
      <p onclick="controlPopup('journalPopUp')">Trading Journal</p>
      <p><a style="color: inherit;" href="<?=ROOT?>/riskManagementCalculator">Risk Management Calculator</a></p>
      <p onclick="controlPopup('unvailablePopUp')">Compound Interest Calculator</p>
     </div>
   </section>
</main><!-- End #main --> 
   
     
   <?php $this->view('includes/footer') ?>