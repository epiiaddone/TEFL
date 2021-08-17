<?php







$category_slug = get_the_category(get_the_id())[0]->slug;
$this_post_id  = get_the_id();


$links_query = new WP_Query(array(
  'category_name' => $category_slug,
  'posts_per_page' => -1,
  'order_by' => 'post_date',
  'order' => 'asc'
));

?><ol><?php
while ($links_query->have_posts()) : $links_query->the_post(); ?>
  <li>
  <a
  class="single--table__link <?php if(get_the_id()==$this_post_id){echo "single--table__link--active";}?>"
  href="<?php echo get_the_permalink(); ?>"
  ><?php echo get_the_title(); ?>
</a>
</li>
<?php endwhile;
?></ol><?


wp_reset_postdata();
