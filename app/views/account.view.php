<?php $this->view('includes/header',$data) ?>
 
</head> 
<body style="height: 100vh;"> 
<?php $this->view('includes/nav',$data) ?>

<main id="userAccount" class="userAccount"> 
    <section id="dashboard" class="defaultSec ds-none js-sec-tabs pd-sqr20px">
      <!--All Success Messages Displayer-->
      <?php if(message()):?> 
        <div class="msg-success"><?=message('',true)?></div>
      <?php endif;?> 

      <!--All Error Messages Displayer-->
      <?php if(!empty($errMsg)):?> 
        <div class="msg-warning"><?=$errMsg?></div>
      <?php endif;?> 
      <div class="ds-flex">
        <div class="wd80pc">
          <h1 class="bottom10px">Public Journals</h1>
          <p id="publicJournalsWarn" class="ds-none">You have closed viewing the public Journal, kindly click "open" to continue viewing.</p> 
        </div>
        <div class="wd20pc">
          <p id="openWid" onclick="publicJournalController()" class="ds-none txtAli-right">OPEN &#11022;</p> 
          <p id="closeWid" onclick="publicJournalController()" class="ds-block txtAli-right">CLOSE &#11025;</p>
        </div>
      </div>

      <div id="publicJournalsWrapper">
      <?php if(mysqli_num_rows($journalPublicViewer) > 0):?> 
          <div class="mg-top10px mg-bottom41px" style="overflow-x: auto; max-height:300px">
            <table class="journalTable"> 
             <thead>
               <tr>
                <th class="tableHead">No.</th> 
                <th class="tableHead">TimeFrame</th>  
                <th class="tableHead">Strategy</th> 
                <th class="tableHead">Type Of Order</th>  
                <th class="tableHead">Pair</th>  
                <th class="tableHead">Volume</th>  
                <th class="tableHead">Stop Loss</th>  
                <th class="tableHead">Take Profit</th>  
                <th class="tableHead">Entry Price</th>  
                <th class="tableHead">Profit/Loss</th>  
                <th class="tableHead">R:R R</th>  
                <th class="tableHead">WIN/LOSE</th>
                <th class="tableHead">INITIAL BALANCE</th>
                <th class="tableHead">CURRENT BALANCE</th>
                <th class="tableHead">G/L%</th>  
                <th class="tableHead">COMMENT-ON-TRADE</th>  
                <th class="tableHead">DATE</th>     
              </tr>
            </thead>
            <?php while($row = mysqli_fetch_assoc($journalPublicViewer)):?>
            <tbody>
               <tr>
                <td class="pd-sqr10px"><?=$row['id']?></td>
                <td class="pd-sqr10px"><?=$row['timeframe']?></td> 
                <td class="pd-sqr10px"><?=$row['strategy']?></td> 
                <td class="pd-sqr10px"><?=$row['typeoforder']?></td>   
                <td class="pd-sqr10px"><?=$row['pair']?></td>   
                <td class="pd-sqr10px"><?=$row['volume']?></td>   
                <td class="pd-sqr10px"><?=$row['stoploss']?></td>   
                <td class="pd-sqr10px"><?=$row['takeprofit']?></td>   
                <td class="pd-sqr10px"><?=$row['entryprice']?></td>   
                <td class="pd-sqr10px"><?=$row['profit_loss']?></td>   
                <td class="pd-sqr10px"><?=$row['r_r_r']?></td>   
                <td class="pd-sqr10px"><?=$row['win_lose']?></td>   
                <td class="pd-sqr10px"><?=$row['initial_balance']?></td>
                <td class="pd-sqr10px"><?=$row['current_balance']?></td>
                <td class="pd-sqr10px"><?=$row['growth_lose']?></td>   
                <td class="pd-sqr10px"><?=$row['comment']?></td>   
                <td class="pd-sqr10px"><?=$row['date']?></td>     
               </tr>  
            </tbody>
            <?php endwhile;?> 
          </table>
          </div>  
      <?php else:?> 
        <div class="txtAli-center">
            <p class="ft-size18px brand-cl-blue pd-sqr5px" style="font-weight:bold;">Public Journals</p> 
          <p class="pd-bottom31px">Oops! No record found.
             Please check back later or request a friend to share their Trading Journals. Thank you!</p>
        </div>
      <?php endif;?>
      </div>
    </section>

    <section id="journeyJournal" class="defaultSec ds-none js-sec-tabs pd-sqr20px">
       <h2 class="mg-bottom20px ft-size25px">Journal Today's Trade</h2><br>

        <div id="js-recordDeviceReg" class="mg-bottom20px">
          <?php if(!empty($errMSG)):?> 
                   <div class="mg-top20px mg-bottom20px msg-warning"><?=$errMSG?></div>
                <?php endif;?>
            <form method="post">
              <div style="background-color: rgba(36, 14, 125, 0.128); padding:10px 20px;"> 
                <p class="mg-bottom5px">TimeFrame</p> 
                <input class="wd90pc ht30px" name="timeframe" type="text"><br><br>
                <p class="mg-bottom5px">Strategy</p> 
                <input class="wd90pc ht30px" name="strategy" type="text"><br><br>
                <p class="mg-bottom5px">Currency Pair</p> 
                <input class="wd90pc ht30px" name="pair" type="text"><br><br> 
                <p class="mg-bottom5px">Volume</p> 
                <input class="wd90pc ht30px" name="volume" type="text"><br><br>
                <p class="mg-bottom5px">Stop Loss</p> 
                <input class="wd90pc ht30px" name="stoploss" type="text"><br><br>
                <p class="mg-bottom5px">Take Profit</p> 
                <input class="wd90pc ht30px" name="takeprofit" type="text"><br><br> 
                  <p class="mg-bottom5px">Type Of Order</p> 
                  <select name="typeoforder" class="brand-cl-realGray ft-size15px ff-body pd-sqr5px br5 mg-right10px">
                    <option value="none">-Select-</option>
                    <option value="buy">Buy</option>
                    <option value="sell">Sell</option> 
                  </select> <br><br> 
                <p class="mg-bottom5px">Profit/Loss</p> 
                <input class="wd90pc ht30px" name="profit_loss" type="text"><br><br>  
                <p class="mg-bottom5px">Entry Price</p> 
                <input class="wd90pc ht30px" name="entryprice" type="text"><br><br>
                <p class="mg-bottom5px">Risk:Reward Ratio</p> 
                <input class="wd90pc ht30px" name="r_r_r" type="text"><br><br>
                <p class="mg-bottom5px">Win/Lose</p> 
                <input class="wd90pc ht30px" name="win_lose" type="text"><br><br>
                <p class="mg-bottom5px">Initial Balance</p>
                <input class="wd90pc ht30px" name="initial_balance" type="text"><br><br>
                <p class="mg-bottom5px">Current Balance</p>
                <input class="wd90pc ht30px" name="current_balance" type="text"><br><br>
                <p class="mg-bottom5px">Growth/Lose</p> 
                <input class="wd90pc ht30px" name="growth_lose" type="text"><br><br>
                <p class="mg-bottom5px">Comment</p> 
                <input class="wd90pc ht30px" name="comment" type="text"><br><br>
                
               <!-- The code snipet enables image upload... not needed yet
                <div> 
                  <div id="ssss" class="txtAli-left">
                      <img class="js-image-preview wd100px br10 ds-none" src=""  alt="" style="width:200px;max-width:200px;height:200px;object-fit: cover;"> 
                  </div>  
                  <div class="ds-flex">
                    <input onchange="load_image(this.files[0])" class="bd-zero" type="file" name="image"> 
                  </div>
                </div><br>
                -->
                
               <input type="text" name="sig" value="journalToday" hidden>
               <button>Send</button>
              </div> 
            </form> 
        </div>
    </section>

    <section id="performMatrics" class="defaultSec ds-none js-sec-tabs pd-sqr20px"> 
     <div>
       <!-- Code for modifying single Journal record-->      
      <?php if($activeSignal == "EditingSingleJournal"):?>  
        <div id="js-recordDeviceReg" class="mg-bottom20px">
          <h2>Modify Journal Record</h2> 
         <?php if(mysqli_num_rows($getModifyJournal) > 0):?>
           <?php while($row = mysqli_fetch_assoc($getModifyJournal)):?> 
            <form method="post">
              <div style="background-color: rgba(36, 14, 125, 0.128); padding:10px 20px;"> 
                <p class="mg-bottom5px">TimeFrame</p> 
                <input class="wd90pc ht30px" name="timeframe" type="text" value="<?=$row['timeframe']?>"><br><br>
                <p class="mg-bottom5px">Strategy</p> 
                <input class="wd90pc ht30px" name="strategy" type="text" value="<?=$row['strategy']?>"><br><br>
                <p class="mg-bottom5px">Currency Pair</p> 
                <input class="wd90pc ht30px" name="pair" type="text" value="<?=$row['pair']?>"><br><br> 
                <p class="mg-bottom5px">Volume</p> 
                <input class="wd90pc ht30px" name="volume" type="text" value="<?=$row['volume']?>"><br><br>
                <p class="mg-bottom5px">Stop Loss</p> 
                <input class="wd90pc ht30px" name="stoploss" type="text" value="<?=$row['stoploss']?>"><br><br>
                <p class="mg-bottom5px">Take Profit</p> 
                <input class="wd90pc ht30px" name="takeprofit" type="text" value="<?=$row['takeprofit']?>"><br><br> 
                  <p class="mg-bottom5px">Type Of Order</p> 
                  <select name="typeoforder" class="brand-cl-realGray ft-size15px ff-body pd-sqr5px br5 mg-right10px">
                    <option value="<?=$row['typeoforder']?>"><?=$row['typeoforder']?></option>
                    <option value="buy">Buy</option>
                    <option value="sell">Sell</option> 
                  </select> <br><br> 
                <p class="mg-bottom5px">Profit/Loss</p> 
                <input class="wd90pc ht30px" name="profit_loss" type="text" value="<?=$row['profit_loss']?>"><br><br> 
                <p class="mg-bottom5px">Entry Price</p> 
                <input class="wd90pc ht30px" name="entryprice" type="text" value="<?=$row['entryprice']?>"><br><br>
                <p class="mg-bottom5px">Risk:Reward Ratio</p> 
                <input class="wd90pc ht30px" name="r_r_r" type="text" value="<?=$row['r_r_r']?>"><br><br>
                <p class="mg-bottom5px">Win/Lose</p>
                <input class="wd90pc ht30px" name="win_lose" type="text" value="<?=$row['win_lose']?>"><br><br>
                <p class="mg-bottom5px">Initial Balance</p> 
                <input class="wd90pc ht30px" name="initial_balance" type="text" value="<?=$row['initial_balance']?>"><br><br>
                <p class="mg-bottom5px">Current Balance</p> 
                <input class="wd90pc ht30px" name="current_balance" type="text" value="<?=$row['current_balance']?>"><br><br>
                <p class="mg-bottom5px">Growth/Lose</p> 
                <input class="wd90pc ht30px" name="growth_lose" type="text" value="<?=$row['growth_lose']?>"><br><br>
                <p class="mg-bottom5px">Comment</p> 
                <input class="wd90pc ht30px" name="comment" type="text" value="<?=$row['comment']?>"><br><br>
                
               <!-- The code snipet enables image upload... not needed yet
                <div> 
                  <div id="ssss" class="txtAli-left">
                      <img class="js-image-preview wd100px br10 ds-none" src=""  alt="" style="width:200px;max-width:200px;height:200px;object-fit: cover;"> 
                  </div>  
                  <div class="ds-flex">
                    <input onchange="load_image(this.files[0])" class="bd-zero" type="file" name="image"> 
                  </div>
                </div><br>
                -->
                <input type="text" name="postID" value="<?=$row['id']?>" hidden>
               <input type="text" name="sig" value="editSingleJournal_action" hidden>
               <button>Send</button>
              </div> 
            </form> 
            <?php endwhile;?> 
           <?php else:?> 
            <div class="txtAli-center">
             <p class="pd-bottom31px">Oops! No record found, seems something went wrong!
             </p>
            </div>
         <?php endif;?> 
        </div> 
      <?php else:?>
        <!-- Code for filtering search for a specific date record-->     
        <h2><?=$journalViewerHeader?></h2> 
        <div class="mg-bottom41px brand-bg-skyblue br10 pd-sqr10px ">
          <div onclick="openAndClose('js-SSDR')">
            <span class="ft-size20px brand-cl-blue">Search Specific Date Record</span>
            <img id="js-SSDR-arrow-img" style="float:right;" class="wd30px br50 brand-color2" src="<?=ROOT?>/assets/images/arrow_down.png" alt="arrow_down">
          </div> 
         <div id="js-SSDR" class="ds-none mg-top21px">
          <form method="POST">
            <span class="brand-cl-blue">Start Date</span><br>
            <input class="wd90pc ht40px"  type="date" name="startDate"><br><br>
            <span class="brand-cl-blue">End Date</span><br>
            <input class="wd90pc ht40px"  type="date" name="endDate"><br><br>

            <input type="text" name="sig" value="journalViewerSSDR" hidden>
            <button>Summit</button>
          </form>
         </div>
        </div>
      
        <!-- Code for displaying all journal record-->           
       <?php if(mysqli_num_rows($journalViewer) > 0):?>
        <div>
         <div class="ds-flex brand-bg-blue br5" style="font-weight:bold;">
            <p class="wd40pc brand-cl-skyblue ft-size16px pd-sqr5px">Journal Owner:</p>
            <p class="wd60pc brand-cl-skyblue ft-size16px pd-sqr5px txtAli-left"><?=$userInfo['firstname']?> <?=$userInfo['lastname']?></p>
         </div>
         <div class="ds-flex brand-bg-skyblue br5" style="font-weight:bold;">
             <div class="wd40pc ds-flex">
                 <p class="ft-size16px brand-cl-blue pd-sqr5px">Role:</p> 
                 <p class="ft-size16px brand-cl-blue pd-sqr5px"><?=$userInfo['role']?></p>
             </div> 
             <?php if(Auth::is_admin()):?>
             <div class="wd60pc ds-flex">
                 <form method="post">
                     <input type="text" name="status" value="public" hidden>
                     <input type="text" name="sig" value="hideShowJournal" hidden>
                     <button class="ft-size12px wd70px ht25px mg-top5px mg-right15px">Show</button>
                 </form>
                 <form method="post">
                     <input type="text" name="status" value="private" hidden>
                     <input type="text" name="sig" value="hideShowJournal" hidden>
                     <button class="ft-size12px wd70px ht25px mg-top5px">Hide</button>
                 </form>
             </div>
             <?php endif;?>
         </div>
        </div>
          <div class="mg-top3t1px mg-bottom416px" style="overflow-x: auto;">
            <table class="journalTable"> 
             <thead>
               <tr>
                <th class="tableHead">No.</th> 
                <th class="tableHead">TimeFrame</th>  
                <th class="tableHead">Strategy</th> 
                <th class="tableHead">Type Of Order</th>  
                <th class="tableHead">Pair</th>  
                <th class="tableHead">Volume</th>  
                <th class="tableHead">Stop Loss</th>  
                <th class="tableHead">Take Profit</th>  
                <th class="tableHead">Entry Price</th>  
                <th class="tableHead">Profit/Loss</th>  
                <th class="tableHead">R:R R</th>  
                <th class="tableHead">WIN/LOSE</th> 
                <th class="tableHead">INITIAL BALANCE</th> 
                <th class="tableHead">CURRENT BALANCE</th> 
                <th class="tableHead">GROWTH/LOSE%</th>  
                <th class="tableHead">COMMENT</th>  
                <th class="tableHead">DATE</th>   
                <th class="tableHead">Action</th>
              </tr>
             </thead>
             <?php while($row = mysqli_fetch_assoc($journalViewer)):?>
             <tbody>
              <tr>
                <td class="pd-sqr10px"><?=$row['id']?></td>
                <td class="pd-sqr10px"><?=$row['timeframe']?></td> 
                <td class="pd-sqr10px"><?=$row['strategy']?></td> 
                <td class="pd-sqr10px"><?=$row['typeoforder']?></td>   
                <td class="pd-sqr10px"><?=$row['pair']?></td>   
                <td class="pd-sqr10px"><?=$row['volume']?></td>   
                <td class="pd-sqr10px"><?=$row['stoploss']?></td>   
                <td class="pd-sqr10px"><?=$row['takeprofit']?></td>   
                <td class="pd-sqr10px"><?=$row['entryprice']?></td>   
                <td class="pd-sqr10px"><?=$row['profit_loss']?></td>   
                <td class="pd-sqr10px"><?=$row['r_r_r']?></td>   
                <td class="pd-sqr10px"><?=$row['win_lose']?></td>   
                <td class="pd-sqr10px"><?=$row['initial_balance']?></td>   
                <td class="pd-sqr10px"><?=$row['current_balance']?></td>
                <td class="pd-sqr10px"><?=$row['growth_lose']?></td>   
                <td class="pd-sqr10px"><?=$row['comment']?></td>   
                <td class="pd-sqr10px"><?=$row['date']?></td>
                <form method="POST">
                  <input type="text" name="postID" value="<?=$row['id']?>" hidden>
                  <input type="text" name="sig" value="editSingleJournal" hidden>
                  <td class="pd-sqr5px"><button class="wd50px">Edit</button></td>
                </form>
              </tr>  
             </tbody>
             <?php endwhile;?> 
            </table>
          </div>  
        <?php else:?> 
         <div class="txtAli-center">
          <p class="pd-bottom31px">Oops! No record found for the desired days.
             please check for other days, thank you!
          </p>
         </div>
       <?php endif;?>
      <?php endif;?> 
     </div>
    </section> 

    <?php if(Auth::is_admin()):?>
    <section id="manageUsers" class="defaultSec ds-none js-sec-tabs">
     <div style="padding:10px 20px">
      <h2><?=$manageUserHeader?></h2>
     <?php if($activeTab == "manageUsers"):?>  
      <div class="mg-top31px mg-bottom41px">
        <form method="POST">
          <select class="brand-cl-realGray ft-size15px ff-body pd-sqr5px br5 mg-right10px"  name="role">
            <option disabled>Select Action</option>
            <option value="admin">Promote To Admin</option>
            <option value="user">Demote To User</option>
          </select><br><br>
          <input type="text" name="userID" value="<?=$specificUserID?>" hidden>
          <input type="text" name="sig" value="editUserDetails_action" hidden>
          <button>Update</button>
        </form>
      </div>  
     <?php else:?> 
      <div class="mg-top31px mg-bottom41px">
       <?php if(mysqli_num_rows($allUsersInfo) > 0):?>
       <div style="overflow-x: auto;">
        <table>
          <tr>
            <th class="tableHead">ID</th> 
            <th class="tableHead">Full Name</th>  
            <th class="tableHead">Email</th>  
            <th class="tableHead">Role</th> 
            <th class="tableHead">Action</th> 
          </tr>
         <?php while($row = mysqli_fetch_assoc($allUsersInfo)):?> 
          <tr>
            <td class="pd-sqr10px"><?=$row['id']?></td>
            <td class="pd-sqr10px"><?=$row['firstname']?> <?=$row['lastname']?></td>
            <td class="pd-sqr10px"><?=$row['email']?></td>
            <td class="pd-sqr10px"><?=$row['role']?></td>
            <form method="POST">
              <input type="text" name="userID" value="<?=$row['id']?>" hidden>
              <input type="text" name="sig" value="editUserDetails" hidden>
              <td class="pd-sqr5px"><button class="wd50px">Edit</button></td>
            </form>
          </tr>
         <?php endwhile;?> 
        </table>
        </div>
       <?php else:?> 
          <div class="txtAli-center">
            <p class="pd-bottom31px">Oops! No user fund in the database
            </p>
          </div>
       <?php endif;?> 
      </div>
      <?php endif;?> 
     </div>
    </section>
    <?php endif;?>

    <section id="profile" class="js-sec-tabs ds-none defaultSec pd-sqr20px">  
        <div>
            <?php if(file_exists($userInfo['image'])):?> 
             <div class="txtAli-center"> 
                <img class="wd100px br10" src="<?=$userInfo['image']?>" alt="">
             </div>
            <?php else:?> 
             <div class="txtAli-center">
                <img class="wd100px br10" src="<?=ROOT?>/assets/images/dummyAvatar.png" alt="">
             </div>
            <?php endif;?> 
            <h2 class="txtAli-center pd-none pd-top10px"><?=$userInfo['firstname']?> <?=$userInfo['lastname']?></h2>
        </div>

        <hr class="mg-tb10px ht3px bd-zero brand-bg-realGray"> 

        <!-- _____Profile - Navigation________________ -->  
        <div>
            <div class="ds-flex">
                <p onclick="profileTabController('adminProfile-overview')" class="boldText cs-pointer pd-lr10px pd-bottom39px" ><button class="wd70px ft-size10px">Overview</button></p>     
                <p onclick="profileTabController('adminProfile-edit')" class="boldText cs-pointer pd-lr10px"><button  class="wd70px ft-size10px">Edit Profile</button></p>     
                <p onclick="profileTabController('adminProfile-changePass')" class="boldText cs-pointer pd-lr10px"><button class="wd70px ft-size10px">Password</button></p>        
            </div>
        </div> 

        <!-- _____Profile - overview________________ -->  
        <div id="adminProfile-overview" class="profileTab pd-top20px"> 
        <?php if(!empty($errors['image'])):?>
                   <small class="brand-cl-red msg-warning"><?= $errors['image'];?></small> <br> 
                <?php endif;?><br>
            <div>
               <h2>Bio</h2>
               <p> 
                 <?=$userInfo['bio']?>
               </p>
            </div>  
            <div class="pd-top20px">
               <h2  >Details</h2>
               <div class="pd-bottom15px">
                   <p class="pd-bottom5px boldText brand-cl-skyblue">Full name</p>
                   <p><?=$userInfo['firstname']?> <?=$userInfo['lastname']?></p>
               </div> 
               <div class="pd-bottom15px">
                   <p class="pd-bottom5px boldText brand-cl-skyblue">Position/Role</p>
                   <?php if($userInfo['role']=='user'):?> 
                     <p>Kit Operator</p>
                   <?php else:?> 
                     <p>Kit Operator</p>
                  <?php endif;?> 
               </div>
               <div class="pd-bottom15px">
                   <p class="pd-bottom5px boldText brand-cl-skyblue">Email</p>
                   <p><?=$userInfo['email']?> </p>
               </div>
            </div>      
        </div>

        <!-- _____Profile - Edit________________ -->  
        <div id="adminProfile-edit" class="profileTab ds-none pd-top20px">  
            <div class="pd-top20px">
             <form method="post" enctype="multipart/form-data"> 
                
               <div class="pd-bottom15px">
                   <p class="pd-bottom5px boldText brand-cl-skyblue">Update Profile Image</p>
                   <div> 
                        <div id="ssss" class="txtAli-left">
                          <img class="js-image-preview wd100px br10 ds-none" src=""  alt="" style="width:200px;max-width:200px;height:200px;object-fit: cover;"> 
                        </div>  
                       <div class="ds-flex">
                          <input onchange="load_image(this.files[0])" class="bd-zero" type="file" name="image"> 
                       </div>
                    </div>
               </div>
               <div class="pd-bottom15px">
                   <p class="pd-bottom5px boldText brand-cl-skyblue">Bio</p>
                   <textarea class="defaultInput" type="text" name="bio" ><?=$userInfo['bio']?></textarea>
               </div>    
               <input type="text" name="sig" value="edit-profile" hidden>
               <button>Update</button>
             </form> 
            </div>      
        </div>

        <!-- _____Profile - changePassword________________ -->  
        <div id="adminProfile-changePass" class="profileTab ds-none pd-top20px">  
            <div class="pd-top20px">
              <h2>Change Your Password</h2>
             <form >    
               <div class="pd-bottom15px">
                   <p class="pd-bottom5px boldText brand-cl-skyblue">Current Password</p>
                   <input class="defaultInput" type="text" name="tt">
               </div>
               <div class="pd-bottom15px">
                   <p class="pd-bottom5px boldText brand-cl-skyblue">New Password</p>
                   <input class="defaultInput" type="text" name="tt">
               </div> 
               <div class="pd-bottom15px">
                   <p class="pd-bottom5px boldText brand-cl-skyblue">Confirm New Password</p>
                   <input class="defaultInput" type="text" name="t">
               </div> 
               <button>Proceed</button>
             </form> 
            </div>      
        </div>
    </section>
</main><!-- End #main -->   
 
<script>
  var active_tab = '<?= $activeTab?>';
  document.getElementById(active_tab).style.display = "block"; 
</script>

<?php $this->view('includes/footer') ?>