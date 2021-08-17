<?php
get_header();
 //get_template_part('template-parts/thanos-portal');
 ?>


<div class="diss--after diss--after__disabled">
<div class="front-page" style="background-image: url('<?php print_r(get_field('background_banner')['url'])?>');">
  <div class="front-page--title">Explore the World through Teaching</div>
  <div class="front-page--subtitle">International Online 120 Hour TEFL Course</div>
  <a href='<?php echo wp_registration_url();?>'>Get Started</a>
</div>

<div class="front-articles">
  <div class="front-articles--container">
    <div class="front-articles--section">
      <div class="front-articles--section__title">Begin a Journey of Adventure and Travel</div>
      <div class="front-articles--section__subtitle">
        With a TEFL certificate from TEFL Education Institute you can explore the world whilst teaching English.
        You will gain the ability to live and work in the most exotic and exciting parts of the world.
        Discover new cultures and experience new climates and countries.
      </div>
    </div>
    <div class="front-articles--section">
      <div class="front-articles--section__title">Become a Teaching Professional</div>
      <div class="front-articles--section__subtitle">
        Our 120 Hour TEFL Course meets the requirements of English teaching jobs across the globe.
        A TEFL Education Institute certificate demonstrates to employers that you have all the relevant knowledge to successfully teach in a classroom environment.
      </div>
    </div>
    <div class="front-articles--section">
      <div class="front-articles--section__title">Excel in the Classroom</div>
      <div class="front-articles--section__subtitle">
        During our Professional Course you will learn advanced teaching techniques and gain comprehensive understanding of the specifics of teaching English as a foreign language.
      </div>
    </div>
  </div>
</div>

<div class="front-listing">
  <div class="front-listing--title">Our Syllabus</div>
  <div class="front-listing--container">
    <div class="front-listing--topic">
      <object type="image/svg+xml"  class="front-listing--svg front-listing--svg__grammar"></object>
      <div class="front-listing--topic__headline">Teaching English Grammar</div>
    </div>
    <div class="front-listing--topic">
      <object type="image/svg+xml"  class="front-listing--svg front-listing--svg__analysis"></object>
      <div class="front-listing--topic__headline">Effective Teaching Strategies</div>
    </div>
    <div class="front-listing--topic">
      <object type="image/svg+xml" class="front-listing--svg front-listing--svg__classroom"></object>
      <div class="front-listing--topic__headline">Classroom Management</div>
    </div>
    <div class="front-listing--topic">
      <object type="image/svg+xml"  class="front-listing--svg front-listing--svg__planning"></object>
      <div class="front-listing--topic__headline">Lesson Planning</div>
    </div>
    <div class="front-listing--topic">
      <object type="image/svg+xml"  class="front-listing--svg front-listing--svg__assesment"></object>
      <div class="front-listing--topic__headline">Assessing and Evaluating</div>
    </div>
  </div>
</div>

<div class="front-steps">
  <div class="front-steps__title">Course Process</div>
<div class="front-steps__container">
  <div class="front-steps__container--box">
    <div class="front-steps__container--number">Step 1</div>
    <div class="front-steps__container--title">Register</div>
    <div class="front-steps__container--text">Enter a few simple details to create an account.</div>
  </div>
  <div class="front-steps__container--box">
    <div class="front-steps__container--number">Step 2</div>
    <div class="front-steps__container--title">Study</div>
    <div class="front-steps__container--text">Review the course material at your own pace.</div>
  </div>
  <div class="front-steps__container--box">
    <div class="front-steps__container--number">Step 3</div>
    <div class="front-steps__container--title">Exam</div>
    <div class="front-steps__container--text">When you are ready, take the end of course exam. You need to score 75% and you are able to retake if you are unsuccessful.</div>
  </div>
  <div class="front-steps__container--box">
    <div class="front-steps__container--number">Step 4</div>
    <div class="front-steps__container--title">Get your Certificate</div>
    <div class="front-steps__container--text">You will receive a certificate that will unlock thousands of jobs in dozens of countries all around the world.</div>
  </div>
</div>
</div>

<div class="front-price">
  International Online 120 Hour TEFL Course<br>
  <div class="front-price__container">
  <span class="front-price__sale">Summer Sale</span>
  <span class="front-price__discount">85% Off</span>
  <br>
  <span class="front-price__old"> £179</span>
  <span class="front-price__new">£27</span>
</div>
<span class="front-price__regular">£179</span>
</div>

<div class="front-faq">
  <div class="front-faq--title">Frequently Asked Questions</div>
  <div class="front-faq--container">
    <div class="front-faq--section">
      <div class="front-faq--question">Who can take the TEFL Course?</div>
      <div class="front-faq--answer">Anyone can take the course and achieve the qualification.</div>
    </div>
    <div class="front-faq--section">
      <div class="front-faq--question">Do I need a TEFL Certificate?</div>
      <div class="front-faq--answer">Most countries do require teachers to have a TEFL qualification to teach English.</div>
    </div>
    <div class="front-faq--section">
      <div class="front-faq--question">Do I need to be good at grammar?</div>
      <div class="front-faq--answer">No, we will teach you all the grammar that you will need in the classroom.</div>
    </div>
  </div>
  <div class="front-faq--button"><a href="<?php echo site_url("/faq")?>">Visit FAQ Page</a></div>
</div>

<div class="front-testimonials">
  <?php
  echo the_content();
  ?>
</div>

<div class="front-end">
  <div class="front-end--title">Are you ready?</div>
  <div class="front-end--subtitle">Begin a lifetime of adventure</div>
  <a href='<?php echo wp_registration_url();?>'>Get Started</a>
</div>

</div>

 <?php
 get_footer();
