<?php


get_header();
?>

<script>
(function(){
window.location.href='<?php echo get_site_url() . "/front-page";?>';
console.log("moving to front page from index.php");
}())
</script>
		<?php


get_footer();
