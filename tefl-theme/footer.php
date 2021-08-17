<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package tefl-theme
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<a href="<?php echo site_url('/accreditation')?>">Accreditation</a>
		<a href="<?php echo site_url('/contact-us')?>">Contact Us</a>
		<a href="<?php echo site_url('/privacy-policy')?>">Privacy Policy</a>
		<a href="<?php echo site_url('/faq')?>">FAQ</a>
		<a href="<?php echo site_url('/terms-and-conditions')?>">Terms & Conditions</a>
		<div class="site-footer--copywright">© 2019 TEFL EDUCATION INSTITUTE</div>

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
