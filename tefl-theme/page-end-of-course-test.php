<?php
get_header();


if(!is_user_logged_in()){
  echo "you must create an account first";
}elseif(GetUserCourseCode(array('debug'=>false))!= "120ACCESS"){
  echo "show link to go to shop page here";?>
  <a href="<?php echo site_url('/product/120-hour-tefl') ?>">Purchase</a>
  <?php
}else{?>

<?php
$score = getEndResults(array('debug'=>false));
if($score ==0){?>

  <div class="test-page">
      <?php
the_content();
wp_reset_postdata();
?>
</div><?php
}elseif($score > 0 && $score<75){
  //score not high enough
    ?>
    <div class="quizz--message">
    <h3>Your current score: <?php echo $score;?>%</h3>
    <h3>You need 75% to pass<h3>
    </div>
      <br>      
        <div class="test-page">
            <?php
      the_content();
      wp_reset_postdata();
      ?>
      </div><?php
}elseif($score >= 75){
  //passing score achieved
?>
<div class="quizz--message">
<h1>You have passed the end of course test. Congratulations</h1>
<h3>You can now download your certificate here:<li><a href="<?php echo site_url('/pdf-cert')?>" target="_blank" class="">Course Completion Certificate</a></li></h3>
</div>
<?php
};

?>



<?php
}
get_footer();
