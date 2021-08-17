<?php
get_header();
 ?>

<?php
$current_user = wp_get_current_user();
if ( $current_user->exists() ) {?>
  <script>
  (function(){
  window.location.href='<?php echo get_site_url() . "/course-home";?>';
}())
</script>
<?php
 }
?>

<div class="registration">


 <div class="registration--box">
   <div class="registration--title">Register</div>
   <form method="POST" action="" id="registration-form">
     <div class="registration--field">
       <i class="fas fa-user"></i>
       <input type="textbox" id="username" name="username" max="50" placeholder="Username"/>
     </div>
     <div class="registration--field">
       <i class="fas fa-envelope"></i>
       <input type="email" id="email" name="user_email" min="4" max="50" placeholder="Email" />
     </div>

     <div class="registration--field">
       <i class="fas fa-key"></i>
       <input type="password" id="new_pass" name ="new_pass" min="3" max="50" placeholder="Password"/>
     </div>

     <div class="registration--field">
       <i class="fas fa-key"></i>
       <input type="password" id="rep_pass" name ="rep_pass" min="3" max="50" placeholder="Repeat Password"/>
     </div>

     <hr>
     <div class="registration--text"><p>Please enter your first and last names as you would like them to appear on your certificate.</p></div>
     <div class="registration--field registration--field__no-i">
       <input type="textbox" id="first_name" name="first_name" min="1" max="50"placeholder="First Name"/>
     </div>

     <div class="registration--field registration--field__no-i">
       <input type="textbox" id="last_name" name="last_name"min="1" max="50" placeholder="Last Name"/>
     </div>

         <button type="submit">Sign Up</button>
    </form>
    <div class="registration__update-alert registration__update-alert--failure" id="pass-not-match">Passwords do not match!</div>
    <div class="registration__update-alert registration__update-alert--failure" id="username-taken">That username has already been taken!</div>
    <div class="registration__update-alert registration__update-alert--failure" id="email-taken">An account with that email already exits!</div>
    <div class="registration__update-alert registration__update-alert--failure" id="email-invalid">Email address is invalid!</div>
    <div class="registration__update-alert registration__update-alert--failure" id="pass-invalid">Password Invalid!</div>
    <div class="registration__update-alert registration__update-alert--failure" id="username-invalid">Username Invalid. Only letters and numbers allowed</div>
    <div class="registration__update-alert registration__update-alert--failure" id="first-name-invalid">First Name Invalid!</div>
    <div class="registration__update-alert registration__update-alert--failure" id="last-name-invalid">Last Name Invalid!</div>
    <div class="registration__update-alert registration__update-alert--failure" id="failed">Regsitration Failed!</div>
    <div class="registration__update-alert registration__update-alert--success" id="success">Registration Success!</div>
 </div>
 <div class="registration--gap"></div>

</div>

 <?php
 get_footer();
