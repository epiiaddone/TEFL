<?php
get_header();



?>

<div class="title-strip--banner title-strip--banner__single-pic" style="background-image: url('<?php echo site_url();?>/wp-content/themes/tefl-theme/inc/images/aerial-beach-landscape-min.jpg');">
  <div class="title-strip--banner--title title-strip--banner--title__light">Contact Us</div>
</div>

<div class="contact-us">
  <?php
wp_reset_postdata();
the_content();
?>
</div>
<div class="contact-us--gap"></div>

<?php
 get_footer();
