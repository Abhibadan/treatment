<?php
if(!isset($_SESSION['email'])){
    $holder_name=NULL;
    $holder_email=NULL;
    $holder_profile=NULL;
    $password2=NULL;
    if(isset($_POST['button_submit'])){
      $err='';
      $check='';   
      $name=filter_var($_POST['name'],FILTER_SANITIZE_STRING);
      $email=filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
      $type=filter_var($_POST['type'],FILTER_SANITIZE_NUMBER_INT);
      $password1=filter_var($_POST['password1'],FILTER_SANITIZE_STRING);
      $password2=filter_var($_POST['password2'],FILTER_SANITIZE_STRING);
      if($password2==NULL)
      {
        $profile=$db->checkDetails($type,$email);
  
        if($profile!=NULL)
        {
          if($profile->user==$name &&  $profile->email==$email)
          {
            if(password_verify($password1,$profile->password))
            {
              $_SESSION['email']=$email;
              $_SESSION['type']=$type;
              header('location:http://localhost/treatment/public/home.php');
            }
            else
            {
              $err="Password Error !";
            }
          }
          else
          {
            $err="Account not found";
          }
        }
        else
        {
          $err="Account not found";
        }
      }
      else
      {
        if($password1!=$password2)
        {
          $err="Passwords are not same!";
        }
        else
          {
            if($type==1)
            {
              $check=$db->userDetails($email);
            }
            elseif($type==2)
            {
              $check=$db->doctorDetails($email);
            }
            elseif($type==3)
            {
              $check=$db->dispensaryDetails($email);
            }
            if(empty($check))
            {
              if(@$db->registerusers($type,$name,$email,$password1))
              {
              $_SESSION['email']=$email;
              $_SESSION['type']=$type;
              header('location:http://localhost/treatment/public/home.php');
              }
            }
            else{
              $err="Account with same email exist!";
            }
            
          }
      }
    }
  }
  else{
    $profile=$db->checkDetails($_SESSION['type'],$_SESSION['email']);
    $holder_name=$profile->user;
    $holder_email=$profile->email;
    $holder_profile=$profile->profile;
    if(isset($_POST['button_submit'])){
      if($_SESSION['type']==1)
      {
        header('location:http://localhost/treatment/public/profile1.php');
      }
      elseif($_SESSION['type']==2)
      {
        header('location:http://localhost/treatment/public/profile2.php');
      }
      elseif($_SESSION['type']==3)
      {
        header('location:http://localhost/treatment/public/profile3.php');
      }
    }
  }  
  if(isset($_POST['logout']))
  {
    session_destroy();
    header('location:http://localhost/treatment/public/home.php');
  }
  if(!empty($err)){
    ?>
      <script>
      alert("<?php echo $err; ?>");
      </script>
    <?php
  }
?>
<span class="profile">
  <?php if(isset($_SESSION['email'])) : ?>
     <button
       type="button"
       id="profile_image"
       name="profileimage"
       data-bs-toggle="modal"
       data-bs-target="#popup"
       data-bs-whatever="@getbootstrap"
       onclick="modal_manage1()"
     >
      <?php if($holder_profile==NULL):?>
       <img src="image/profile.jpg" />
      <?php else:?>
       <img src="image/<?php echo $holder_profile; ?>" />
      <?php endif;?>
     </button>
     <?php else: ?>
     <button
       type="submit"
       id="login"
       name="log_in"
       data-bs-toggle="modal"
       data-bs-target="#popup"
       data-bs-whatever="@getbootstrap"
       onclick="modal_manage2()"
     >
       LOG IN
     </button>
     <a href="{{route('sign_up')}}"><button
       id="signin"
       name="sign_in"
     >
       SIGN IN
     </button></a>
     <?php endif; ?>
   </span>
   <div
   class="modal fade"
   id="popup"
   tabindex="-1"
   aria-labelledby="exampleModalLabel"
   aria-hidden="true"
   style="overflow: scroll" align="center"
 >
   <div class="modal-dialog" style="width: 350px" align="left">
     <div class="modal-content">
       <div
         class="modal-header"
         style="background-color: rgb(47, 50, 73); color: white"
       >
         <h5 class="modal-title" id="popupLabel">asda</h5>
         <button
           type="button"
           class="btn-close"
           data-bs-dismiss="modal"
           aria-label="Close"
           style="background-color: white"
         ></button>
       </div>
       
       <div class="modal-body">
       <?php if(!empty($err)):?>
         <div
           class="mb-3" id="err_msg"
           style="
             background-color: rgba(255, 0, 0, 0.1);
             text-align: center;
             color: red;
             border-radius: 3px;
           "
         >
          <?php echo $err?>
         </div>
         <?php endif;?>
         <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
         <div class="mb-3">
             <label class="col-form-label"
               >User type: <i class="fas fa-user-circle"></i
             ></label>
             <?php if(!isset($_SESSION['email'])):?>
             <select name="type" class="form-control">
              <option value="">--select--</option>
              <option value="1">user</option>
              <option value="2">doctor</option>
              <option value="3">dispensary</option>
              </select>
              <?php else:?>
               <select name="type" class="form-control">
                 <?php if($_SESSION['type']==1):?>
                   <option value="">user</option>
                 <?php elseif($_SESSION['type']==2):?>
                   <option value="">doctor</option>
                 <?php elseif($_SESSION['type']==3):?>
                   <option value="">dispensary</option>
                 <?php endif;?>
               </select>
               <?php endif;?>
           </div>
           <div class="mb-3">
             <label for="name" class="col-form-label"
               >Name: <i class="fas fa-user-circle"></i
             ></label>
             <input
               type="text"
               class="form-control"
               id="name"
               name="name"
               placeholder="enter your name"
               value="<?php echo $holder_name;?>"
             />
           </div>
           <div class="mb-3">
             <label for="email" class="col-form-label">E-mail:</label>
             <input
               type="text"
               class="form-control"
               id="email"
               name="email"
               placeholder="enter your email"
               value="<?php echo $holder_email;?>"
             />
           </div>
           <div class="mb-3" id="one_pass" style="visibility: visible; height: auto">
             <label for="password1" class="col-form-label"
               >Enter password:</label
             >
             <input
               type="password"
               class="form-control"
               id="password1"
               name="password1"
               placeholder="enter password"
             />
           </div>
           <div class="mb-3" id="sec_pass" style="visibility: visible; height: auto">
             <label for="password2" class="col-form-label"
               >Re-Enter password:</label
             >
             <input
               type="password"
               class="form-control"
               id="password2"
               name="password2"
               placeholder="re-enter password"
             />
           </div>
           <div class="modal-footer">
         <button
           type="button"
           class="btn btn-secondary"
           data-bs-dismiss="modal"
         >
           Close
         </button>
         <button
           type="submit"
           name="button_submit"
           id="submit_button"
           class="btn btn-primary"
           style="background-color: rgb(58, 62, 124); border: none"
         >
         </button>
       </div>
         </form>
       </div>
     </div>
   </div>
 </div>
