<?php

get_header();

if(!is_user_logged_in()){?>
  <script>
  (function(){
  window.location.href='<?php echo get_site_url() . "/front-page";?>';
}())
</script>
<?php
}elseif(GetUserCourseCode(array('debug'=>false,))== "120ACCESS"){?>
  <script>
  (function(){
  window.location.href='<?php echo get_site_url() . "/course-home";?>';
}())
</script>
<?php
}else{?>

  <div class="checkout-page">
<?php

if (have_posts()){
  while (have_posts()) : the_post();
    the_content();
  endwhile;
}
?>

</div>



<?php
}
get_footer();
