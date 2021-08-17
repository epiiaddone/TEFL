<?php


get_header();
if(!is_user_logged_in()){
  echo "you must create an account first";
}elseif(GetUserCourseCode(array('debug'=>false,))!= "120ACCESS"){?>
  <script>
  (function(){
  window.location.href='<?php echo get_site_url() . "/product-page";?>';
}())
</script>
  <?php
}else{?>


	<div class="single">


<div class="single--return">
  <a class href="<?php echo site_url('/course-home')?>">Return to Course Home</a>
</div>


<div class="single--wrapper">
  <div class="single--container">
    <div class="single--title"><?php	echo get_the_title();?></div>
    <div class="single--content"><?php echo get_the_content();?></div>
  </div>

  <div class="single--table">
    <div class="single--table__title">Section Contents</div>
  <?php
  get_template_part('template-parts/course-side-menu');
  ?>
  </div>

</div>
<div class="single--gap"></div>

	</div>

<?php
}
get_footer();
