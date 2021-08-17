<?php

get_header();
?>

<div class="title-strip--banner title-strip--banner__single-pic" style="background-image: url('<?php echo site_url();?>/wp-content/themes/tefl-theme/inc/images/aerial-beach-landscape.jpg');">
  <div class="title-strip--banner--title title-strip--banner--title__light">Welcome</div>
</div>

<div class="welcome">
  <div class="welcome--title">Congratulations on taking your first step towards freedom</div>
</div>
<div class="product-page">
<div class="product-page--gap"></div>
<?php
if (have_posts()){
  while (have_posts()) : the_post();
    the_content();
  endwhile;
}
?>

<div class="front-listing--title">Course Content</div>
<div class="front-listing--container">
  <div class="front-listing--topic">
    <object type="image/svg+xml" data="grammar.svg" class="front-listing--svg front-listing--svg__grammar"></object>
    <div class="front-listing--topic__headline">Teaching English Grammar</div>
  </div>
  <div class="front-listing--topic">
    <object type="image/svg+xml" data="grammar.svg" class="front-listing--svg front-listing--svg__analysis"></object>
    <div class="front-listing--topic__headline">Effective Teaching Strategies</div>
  </div>
  <div class="front-listing--topic">
    <object type="image/svg+xml" data="grammar.svg" class="front-listing--svg front-listing--svg__classroom"></object>
    <div class="front-listing--topic__headline">Classroom Management</div>
  </div>
  <div class="front-listing--topic">
    <object type="image/svg+xml" data="grammar.svg" class="front-listing--svg front-listing--svg__planning"></object>
    <div class="front-listing--topic__headline">Lesson Planning</div>
  </div>
  <div class="front-listing--topic">
    <object type="image/svg+xml" data="grammar.svg" class="front-listing--svg front-listing--svg__assesment"></object>
    <div class="front-listing--topic__headline">Assessing and Evaluating</div>
  </div>
</div>
</div>
<div class="site-footer--gap"></div>




</div>

<?php

get_footer();
