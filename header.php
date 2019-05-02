<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package elising
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo get_template_directory_uri() ?>/img/favicon.ico" />
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-127304249-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-127304249-1');
</script>

</head>

<body <?php body_class(); ?>>

<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter50692243 = new Ya.Metrika2({
                    id:50692243,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/tag.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks2");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/50692243" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

<div id="page" class="site">

	<header id="masthead" class="site-header">
		<div class="container container-head">
			<div class="row row-header">
				<div class="w-logo"><a href="/"><img src="<?php echo get_template_directory_uri() ?>/img/elizing-logo.svg" alt=""></a></div>
				<div class="w-info">
					<span class="icon-clock"></span> ПН-ПТ: с 9.00 до 18.00
				</div>
				<div class="w-tel">
					<span class="icon-phone"></span><a href="tel:+375 (17) 388-28-66">+375 (17) 388-28-66</a>
				</div>
				<div class="w-mbut">
                    <div class="wr-m-button"><div class="m-button"><span></span></div></div>
                </div>
			</div>
		</div><!-- .container-head -->

		<div class="nav-holder">
            <div class="container">

				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
					'container'      => 'nav',
					'container_class' => 'top-nav',
					'container_id'    => 'top_nav'
				) );
				?>

            </div>
        </div>

	</header><!-- #masthead -->

	<div id="content" class="site-content">
