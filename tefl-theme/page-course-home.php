<?php
get_header();


if(!is_user_logged_in()){
  ?>
  <script>
  (function(){
  window.location.href='<?php echo get_site_url() . "/front-page";?>';
}())
</script>
  <?php
}elseif(GetUserCourseCode(array('debug'=>false,))!= "120ACCESS"){?>
  <script>
  (function(){
  window.location.href='<?php echo get_site_url() . "/product-page";?>';
}())
</script>
  <?php
}else{?>
  <div class="title-strip--banner title-strip--banner__single-pic" style="background-image: url('<?php echo site_url();?>/wp-content/themes/tefl-theme/inc/images/aerial-beach-landscape-min.jpg');">
    <div class="title-strip--banner--title title-strip--banner--title__light">Course Home</div>
  </div>
<div class="course-navigation">
<div class="course-navigation--section"><a href="<?php echo site_url('/introduction')?>" class="">Section 1: Grammar</a></div>
<div class="course-navigation--section"><a href="<?php echo site_url('/the-english-language')?>" class="">Section 2: Learners</a></div>
<div class="course-navigation--section"><a href="<?php echo site_url('/plan-for-behaviour')?>" class="">Section 3: Teaching</a></div>
<div class="course-navigation--section"><a href="<?php echo site_url('/lesson-time')?>" class="">Section 4: Planning</a></div>
<div class="course-navigation--section"><a href="<?php echo site_url('/grammar')?>" class="">Section 5: Specifics</a></div>
<div class="course-navigation--section"><a href="<?php echo site_url('/foundations-of-assessments')?>" class="">Section 6: Assessments</a></div>
<div class="course-navigation--section"><a href="<?php echo site_url('/end-of-course-test')?>" class="">End of Course Test</a></div>
<?php  if(getEndResults(array('debug'=>false))>=75){?>
<div class="course-navigation--section"><a href="<?php echo site_url('/pdf-cert')?>" target="_blank" class="">Course Completion Certificate</a></div>
<?php } ?>
<div class="course-navigation--gap"></div>
</div>

<?php
}
get_footer();
