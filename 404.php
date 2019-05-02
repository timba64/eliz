<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package elising
 */

get_header('page');
?>

<div class="container">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title">Ой, к сожалению такая страница не найдена!</h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p>Кажется, что здесь ничего нет, может быть попробуете ссылку внизу?</p>
					<p><a class="but-top" href="<?php echo get_home_url(); ?>">Вернуться на главную</a></p>


				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->
</div>
<?php
get_footer();
