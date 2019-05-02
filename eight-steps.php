<?php
/**
 * Template Name: Eight steps
 * 
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage elising
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

    <section id="promo" class="promo">
        <div class="bg-slide"  style="background-image: url(<?php the_field('promo_img'); ?>)"></div>
        <div class="container container-slider">
            <div class="slider-main">

            <?php 	if( have_rows('promo_slider') ):
                            while ( have_rows('promo_slider') ) : the_row(); ?>
                                
                    <div class="wr-slide">
                        <h1 class="title"><?php the_sub_field('slide_title'); ?></h1>
                        <hr>
                        <p class="subtitle"><?php the_sub_field('slide_text'); ?></p>
                        <a href="#" id="pop-js" class="but-top"><?php the_field('promo_btn'); ?></a>
                    </div>

            <?php 		    endwhile;
                    endif; ?>
            </div>
        </div>
    </section>
    <section id="advantage" class="advantage">
        <div class="container">
            <div class="row row-advantage">
                 <div class="adv-widget">
                    <div class="widget-row">
                        <span class="icon-timer"></span>
                        <span class="adv-text"><?php the_field('advant_3'); ?></span>
                    </div>
                </div>           
                <div class="adv-widget">
                    <div class="widget-row">
                        <span class="icon-file"></span>
                        <span class="adv-text"><?php the_field('advant_2'); ?></span>
                    </div>
                </div>
                <div class="adv-widget">
                    <div class="widget-row">
                        <span class="icon-card"></span>
                        <span class="adv-text"><?php the_field('advant_1'); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="formal" class="formal">
        <div class="container">
            <h2 class="title-section"><?php the_field('formal_title'); ?></h2>
            <div class="row row-formal">
                <div class="w-formal wf1">               
                    <div class="wr-icon"><span class="icon-car"></span></div>
                    <div class="wformal-title"><?php the_field('formal_w_1'); ?></div>
                    <div class="wformal-text"><?php the_field('formal_text_1'); ?></div>
                </div>
                <div class="w-formal wf2">
                    <div class="wr-icon"><span class="icon-search"></span></div>
                    <div class="wformal-title"><?php the_field('formal_w_2'); ?></div>
                    <div class="wformal-text"><?php the_field('formal_text_2'); ?></div>
                </div>
                <div class="w-formal wf3">
                    <div class="wr-icon"><span class="icon-pass"></span></div>
                    <div class="wformal-title"><?php the_field('formal_w_3'); ?></div>
                    <div class="wformal-text"><?php the_field('formal_text_3'); ?></div>
                </div>
            </div>
            <div id="formalEight" class="formal-eight">
                <h2 class="title-section"><?php the_field('formal_subtitle'); ?></h2>
                <div id="sliderEight" class="slider-eight">
                    <div id="sliderInner" class="slider-inner">

                        <?php 
            $slide_form = get_field('cont_form');
            echo (do_shortcode("$slide_form")); ?>

                    </div><!-- slider-inner -->

                    <div id="ctrlSlider" class="controls-slider">
        <button id="leftCtrl" class="slide-control dis" disabled><span class="icon-vector arr-left"></span></button>
        <div class="paging"><span>1</span><sup>/8</sup> </div>
        <button id="rightCtrl" class="slide-control">далее<span class="icon-vector"></span></button>
                    </div><!-- controls-slider -->

                </div><!-- slider-lch -->
            </div>
        </div>
    </section>
    <section id="conditions" class="conditions">
        <div class="container">
            <h2 class="title-section"><?php the_field('cond_title'); ?></h2>
            <div class="wr-row">
                <div class="cell">
                    <div class="cell-title"><?php the_field('cond_title_1'); ?></div>
                    <div class="cell-text"><?php the_field('cond_text_1'); ?></div>
                </div>
                <div class="cell">
                    <div class="cell-title"><?php the_field('cond_title_2'); ?></div>
                    <div class="cell-text"><?php the_field('cond_text_2'); ?></div>
                </div>
                <div class="cell">
                    <div class="cell-title"><?php the_field('cond_title_3'); ?></div>
                    <div class="cell-text"><?php the_field('cond_text_3'); ?></div>
                </div>
                <div class="cell">
                    <div class="cell-title"><?php the_field('cond_title_4'); ?></div>
                    <div class="cell-text"><?php the_field('cond_text_4'); ?></div>
                </div>
            </div>
            <p class="cond-text"><?php the_field('cond_text'); ?></p>
        </div>
    </section>

    <section id="whom" class="whom">
        <div class="container">
            <h2 class="title-section"><?php the_field('whom_title'); ?></h2>
            <p class="whom-text"><?php the_field('whom_text'); ?></p>
            <div class="wr-row">
                <div class="cell">
                    <div class="cell-text"><?php the_field('whom_text_1'); ?></div>
                </div>
                <div class="cell">
                    <div class="cell-text"><?php the_field('whom_text_2'); ?></div>
                </div>
                <div class="cell">
                    <div class="cell-text"><?php the_field('whom_text_3'); ?></div>
                </div>
                <div class="cell">
                    <div class="cell-text"><?php the_field('whom_text_4'); ?></div>
                </div>
            </div>
            <div class="decor_one"></div>
            <div>
            <?php 
                $w_form = get_field('whom_form');
                echo (do_shortcode("$w_form")); ?>
            </div>
            <div class="decor_two"></div>
        </div>
    </section>

    <section id="hww" class="hww">
        <div class="container hww-container">
            <div class="wr-img"><img class="wow slideInRight" src="<?php echo get_template_directory_uri() ?>/img/car.png" alt=""></div>
            <h2 class="title-section"><?php the_field('hww_title'); ?></h2>
            <div class="hww-widget hww-1">
                <span class="icon-call"></span>
                <p><?php the_field('hww_1'); ?></p>
            </div>
            <div class="hww-widget hww-2">
                <span class="icon-man"></span>
                <p><?php the_field('hww_2'); ?></p>
            </div>
            <div class="hww-widget hww-3">
                <span class="icon-like"></span>
                <p><?php the_field('hww_3'); ?></p>
            </div>
            <div class="hww-widget hww-4">
                <span class="icon-brief"></span>
                <p><?php the_field('hww_4'); ?></p>
            </div>
        </div>
    </section>

    <section id="faq" class="faq">
        <div class="container container-faq"> 
            <h2 class="title-section"><?php the_field('faq_title'); ?></h2>
            <div class="wr-row">
                <button class="tablink" onclick="switchTab(event, 'bidTab')"  id="defOpen"><?php the_field('btn_1'); ?></button>
                <button class="tablink" onclick="switchTab(event, 'liasingTab')"><?php the_field('btn_2'); ?></button>
                <button class="tablink" onclick="switchTab(event, 'purchaseTab')"><?php the_field('btn_3'); ?></button>
                <button class="tablink" onclick="switchTab(event, 'payTab')" data-link="payTab"><?php the_field('btn_4'); ?></button>
            </div>

            <div id="bidTab" class="tab-content">
                <div class="wr-accordion">  
                    <?php 	if( have_rows('acc_tab_1') ):
                                while ( have_rows('acc_tab_1') ) : the_row(); ?>

                <button class="accordion"><?php the_sub_field('quest_1'); ?><span class="icon-vector"></span></button>
                <div class="panel"><div class="wr-pan"><?php the_sub_field('answer_1'); ?></div></div><!-- panel -->

                    <?php 		endwhile;
                            endif;
                    ?>
                </div>
            </div>
            <div id="liasingTab" class="tab-content">
                <div class="wr-accordion">  
                    <?php 	if( have_rows('acc_tab_2') ):
                                while ( have_rows('acc_tab_2') ) : the_row(); ?>

                <button class="accordion"><?php the_sub_field('quest_2'); ?><span class="icon-vector"></span></button>
                <div class="panel"><div class="wr-pan"><?php the_sub_field('answer_2'); ?></div></div><!-- panel -->

                    <?php 		endwhile;
                            endif;
                    ?>
                </div>
            </div>
            <div id="purchaseTab" class="tab-content">
                <div class="wr-accordion">  
                    <?php 	if( have_rows('acc_tab_3') ):
                                while ( have_rows('acc_tab_3') ) : the_row(); ?>

                <button class="accordion"><?php the_sub_field('quest_3'); ?><span class="icon-vector"></span></button>
                <div class="panel"><div class="wr-pan"><?php the_sub_field('answer_3'); ?></div></div><!-- panel -->

                    <?php 		endwhile;
                            endif;
                    ?>
                </div>
            </div>
            <div id="payTab" class="tab-content">
                <div class="wr-accordion">  
                    <?php 	if( have_rows('acc_tab_4') ):
                                while ( have_rows('acc_tab_4') ) : the_row(); ?>

                <button class="accordion"><?php the_sub_field('quest_4'); ?><span class="icon-vector"></span></button>
                <div class="panel"><div class="wr-pan"><?php the_sub_field('answer_4'); ?></div></div><!-- panel -->

                    <?php 		 endwhile;
                            endif;
                    ?>
                </div>
            </div>
        </div>
    </section>
<script>
    // make tabs for section FAQ
    function switchTab(evt, elem){
      var i, tabcontent, tablink;
      tabcontent = document.getElementsByClassName("tab-content");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }
      tablink = document.getElementsByClassName("tablink");
      for (i = 0; i < tablink.length; i++) {
        tablink[i].className = tablink[i].className.replace(" active", "");
      }
      // Show the current tab, and add an "active" class to the button that opened the tab
      document.getElementById(elem).style.display = "block";
      evt.currentTarget.className += " active";
    }
    // Get the element with id="defOpen" and click on it
    document.getElementById("defOpen").click();
</script>

    <section id="about" class="about pax-1">
        <div class="container container-about"> 
            <h2 class="title-section"><?php the_field('about_title'); ?></h2>
            <p class="about-text"><?php the_field('about_text'); ?></p>
        </div>
    </section>

    <section id="consult" class="consult">
        <div class="container">
            <h2 class="title-section "><?php the_field('consult_title'); ?></h2>
            <p class="consult-descr"><?php the_field('consult_descr'); ?></p>
            <?php $c_form = get_field('consult_text'); ?>
            <div class="decor_one"></div>
            <div class="consult_text"><?php echo (do_shortcode("$c_form")); ?></div>
            <div class="decor_two"></div>
        </div>
    </section>

    <section id="mapa" class="mapa">

        <div class="container">
            <div class="widget-mapa scrollflow -slide-top -opacity">
            <span class="icon-place"></span><p class="addr-text"><?php the_field('widg_addr'); ?></p>
            <span class="icon-call"></span><p class="addr-text"><a href="tel: <?php the_field('widg_tel'); ?>"><?php the_field('widg_tel'); ?></a></p>
            <span class="icon-clock"></span><p class="addr-text"><?php the_field('widg_info'); ?></p>
            </div>            
        </div>
        <div class="block-mapa"><?php the_field('block_mapa'); ?></div>

    </section>

<?php get_footer();