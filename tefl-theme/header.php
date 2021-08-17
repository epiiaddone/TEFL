<?php

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="International 120 Hour TEFL Course available online. Simple certificate verification for employers.">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	<?php wp_head(); ?>
</head>

<body id="body" <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'tefl-theme' ); ?></a>
	<header class="site-header">
		<a href="<?php echo get_site_url();?>/course-home">
			<div class="site-header__logo"><span>t</span>efl <span>E</span>ducation <span>I</span>nstitute</div>
	</a>
		<div class="site-header__access-buttons">
			<?php if(is_user_logged_in()){?>
				<a href="<?php echo wp_logout_url()?>" class="">Log Out</a>
			<?php }else{?>
				<a href="<?php echo wp_login_url()?>" class="">Log In</a>
			<?php }?>
	</div>
	<?php if(!is_user_logged_in()){?>
	<div class="site-header__verify">
		<a href="<?php echo site_url('/verify')?>" class="">Employers Verify Certificate Here</a>
	</div>
<?php } ?>
</header>

	<div id="content" class="site-content">
