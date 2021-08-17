<?php



if(!is_user_logged_in()){
  get_header();
  echo "you are not logged in";
}elseif(GetUserCourseCode(array('debug'=>false,))!= "120ACCESS"){
  get_header();
  echo "show link to go to shop page here";?>
  <a href="<?php echo site_url('/product/120-hour-tefl') ?>">Purchase</a>
  <?php
}elseif(getEndResults(array('debug'=>false))<75){
  get_header();
?>
<h1>You need to pass the end of course test to get your certificate</h1>
  <a href="<?php echo site_url('/course-home') ?>">Course Home</a>
<?php
}else{




createPDFCert();

}
get_footer();
