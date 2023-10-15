<?php $this->view('includes/header',$data) ?>
</head> 
<body style="height: 100vh;">
<?php $this->view('includes/nav',$data) ?>

<main id="main" > 

    <section>
        <div class="mainSec">
            <h2 class="brand-cl-blue">Risk Management Calculator</h2>
            <p class="headerP">Inprove your confidence in your trade set-up by understanding your risk before opening a position.
            </p>
        </div> 
        
      <div class="container">
        <p class="warningTag">Make sure your inputs are correct!</p>
        <label for="riskPercentage">Risk Percentage (%):</label>
        <input type="number" id="riskPercentage" step="0.01" min="0" required>

        <label for="stopLossPips">Stop Loss (Pips):</label>
        <input type="number" id="stopLossPips" min="0" required>

        <label for="accountBalance">Account Balance ($):</label>
        <input type="number" id="accountBalance" min="0" required>

        <button class="mg-bottom20px" onclick="calculateRiskSize()">Calculate</button>
        <p style="padding-bottom: 10px;">NOTE: This tool is for FX pairs only (eg GBP/USD), not commodities like gold (XAU/USD) </p>

        <hr> 
        <div id="resultWrapper" style="padding-top: 10px;">
           <h2 class="brand-cl-blue">Result</h2>
           <div id="result"></div>
           <div id="amountInRisk"></div>
        </div>
      </div>
    </section>

</main><!-- End #main --> 

   <?php $this->view('includes/footer') ?>