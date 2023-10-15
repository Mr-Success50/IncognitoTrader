<?php $this->view('includes/header',$data) ?>
</head> 
<body style="height: 100vh;">

<main class="pd-left20px pd-right20px pd-bottom41px"> 
 
    <section class="defaultSec mg-top41px" style="padding: 5% 5%;" > 
        <div class="txtAli-center"> 
            <a id="brand-logo" href="<?=ROOT?>">
               <p class="logoText" style="text-align:center;">IBT Society</p>
            </a> 
            <p style="text-align:center;" class="pd-sqr20px">If you're new here, welcome aboard! We're thrilled to have you join our community. For our existing users, we're delighted to see you return. Your loyalty means the world to us.</p>
        </div>
           
        <div class="mg-bottom20px">
            <form method="post">
                <h2 class="mg-bottom10px">Please enter your credentials to access your account.</h2>
                
                 
                 <?php if(message()):?> 
                   <div class="msg-success"><?=message('',true)?></div>
                <?php endif;?>
                 
                <?php if(!empty($errors['email'])):?>
                   <small class="brand-cl-red msg-warning"><?= $errors['email'];?></small> <br> 
                <?php endif;?><br>
                <span>Email</span><br>
                <input class="wd90pc ht40px" name="email" type="text"><br><br>
                <span>Password</span><br>
                <input id="password-input" class="wd90pc ht40px" type="password" name="password"><br>
                <input style="margin-top:5px;" type="checkbox" onclick="showPasword()"> <span>Show password</span><br><br>

                <button>Send</button>
            </form>
            <p class="pd-top10px">New to IBT Society? <a href="<?=ROOT?>/signup">sign up</a> straight away!</p>    
        </div>     
    </section> 
</main>

<script>
    function showPasword() {
  var pass = document.getElementById("password-input");
  if (pass.type === "password") {
    pass.type = "text";
  } else {
    pass.type = "password";
  }
}
</script>
</body> 
</html>