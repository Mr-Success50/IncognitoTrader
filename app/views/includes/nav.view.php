
<header>  
 
<?php if(!Auth::signed_in()):?>
 <!--For Non-Logged in user -->
 <div>
  <nav class="ds-flex pd-left20px pd-right20px pd-top10px">
    <div class="wd50pc">
        <a id="brand-logo" href="<?=ROOT?>">
          <p class="logoText">IBT Society</p>
        </a>
    </div>
    <div class="pd-top10px txtAli-right wd50pc">
      <span class="pd-right10px">Visitor</span>
      <span><a href="<?=ROOT?>/login" >Login</a> </span>
    </div>
  </nav> 
 </div>

 <?php else:?>  
     <!--For Logged in user--> 
 <div>
  <div class="ds-flex pd-left20px pd-right20px pd-top10px">
    <div class="wd20pc"> 
      <p id="sig" class="ds-none"></p>
      <img onclick="toggleOn()" id="navIcon1" class="navIcon" src="<?=ROOT?>/assets/images/hamburger.png" alt=""> 
      <img onclick="toggleOff()" id="navIcon2" class="ds-none navIcon" src="<?=ROOT?>/assets/images/close-nav-menu.png" alt=""> 
    </div>
    <div class="wd60pc">
       <p class="logoText txtAli-center">IBT Society</p>
    </div>
    <div class="txtAli-right wd20pc">
     <?php if(file_exists($userInfo['image'])):?> 
      <img class="userImg" src="<?=$userInfo['image']?>" alt="avatar">
     <?php else:?> 
      <img class="userImg" src="<?=ROOT?>/assets/images/avatar.png" alt="avatar">
     <?php endif;?> 
    </div>
  </div>

  <nav id="navMenu" class="navMenu">
    <ul id="navLinkWrapper" class="ds-none pd-left20px pd-right10px pd-top21px"> 
      <div class="br10 pd-sqr10px mg-bottom10px" style="background-color:skyblue;">
        <li onclick="tabController('dashboard')" class="navLink">Dashboard</li> 
      </div>

      <div class="br10 pd-sqr10px mg-bottom10px" style="background-color:skyblue;">
        <li onclick="openNavChild('navchild1')" class="navLink">FX Journal</li>
        <div id="navchild1" class="js-navChildTabs ds-none">
          <li onclick="tabController('journeyJournal')" class="childNavLink">Journey Journal</li> 
          <li onclick="tabController('performMatrics')" class="childNavLink">Performance Metrics</li> 
        </div> 
      </div> 
      
      <?php if(Auth::is_admin()):?>
      <div class="br10 pd-sqr10px mg-bottom10px" style="background-color:skyblue;">
        <li onclick="tabController('manageUsers')" class="navLink">Manage Users</li> 
      </div>
      <?php endif;?>
      
      <div class="br10 pd-sqr10px mg-bottom10px" style="background-color:skyblue;">
        <li onclick="tabController('profile')" class="navLink">Profile</li> 
      </div>

      <div class="br10 pd-sqr10px mg-bottom10px" style="background-color:skyblue;">
        <li class="navLink"><a href="<?=ROOT?>/logout">Logout</a></li> 
        </div> 
      </div>
    </ul>
  </nav> 
 </div> 
<?php endif;?>
  
</header>   