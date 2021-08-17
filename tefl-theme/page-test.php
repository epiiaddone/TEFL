<?php


get_header();
if(!is_user_logged_in()){
  echo "you must create an account first";
  ?>
  <script>
  let username = "Uuiuiu8908098FDSAF()*)_";
  let match = username.match(/([A-Z]|[a-z]|[0-9])+/);
  console.log(match);
  </script>
  <?php
}elseif(GetUserCourseCode()!= "120ACCESS"){
  echo "show link to go to shop page here";?>
  <a href="<?php echo site_url('/product/120-hour-tefl') ?>">Purchase</a>
  <?php
}else{?>
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
    $query = new WP_Query(array(
      'posts_per_page' =>1,
      'category_name' =>'module1',
      'order_by' => 'date',
      'order' => 'asc'
    ));

		while ( $query->have_posts() ) :
			$query->the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			the_post_navigation();


		endwhile; // End of the loop.
    wp_reset_postdata();
		?>

		</main><!-- #main -->
	</div><!-- #primary -->



<?php
}
get_footer();
