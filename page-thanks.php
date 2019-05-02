<?php
/**
* Template Name: Спасибо
*
* @package fitnway
 *
 * @package bmaster
 */
get_header('page');
?>

<div class="container">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title">Спасибо!</h1>
				</header><!-- .page-header -->

				<div class="page-content">
                    <p>Ваше сообщение было отправлено успешно. В ближайшее время с Вами свяжется наш специалист.</p>
					<p><a class="but-top" href="<?php echo get_home_url(); ?>">Вернуться на главную</a></p>


				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->
</div>
<?php
get_footer();