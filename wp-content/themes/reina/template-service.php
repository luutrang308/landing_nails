<?php



/**

 * Created by luutrangk10@gmail.com.

 * User: luutrang

 * Date: 7/4/2020

 * Time: 9:54 AM

 * Template Name: Page Service

 */





    get_header();

   



    ?>



    <div id="list_product_category" class="list_product_category">
    
                <div class="element_list_pro">
                    <nav>
                        <div class="container">
                            <ul>
                            <?php
                                    $args = array(
                                        /*'orderby'   => 'title',
                                        'order'     => 'RAND',*/
                                    );
                                    $product_categories = get_terms( 'product_cat', $args );
                                    $count = count($product_categories);
                                    if ( $count > 0 ){
                                        $number = 0;
                                        foreach ( $product_categories as $key => $product_category ) {
                                            $number++;
                                            echo '<li class="phela' . $number . '">';
                                            ?>
                                                <img src="http://localhost:81/1_LANDING/1_Nails/wp-content/uploads/2020/12/h4-logo-main.png">
                                            <?php
                                            echo '<a class="nav-link" href="#phela' . $number . '">' . $product_category->name . '</a>';
                                            echo '</li>';
                                        }
                                    }
                                ?>
                            </ul>
                        </div>
                    </nav>
                    <div class="list_product_item">

                                    <?php



                                        if ( $count > 0 ){




                                            $number = 0;
                                           foreach ( $product_categories as $product_category ) {
                                            $number++;
                                            ?>
                                                <?php
                                                   echo '<section id="phela' . $number . '">';

                                                   echo '<div class="product_item_id">';

                                                   echo '<h4>' . $product_category->name . '</h4>';
                                                   



                                                    $args = array(



                                                       'posts_per_page' => -1,



                                                       'tax_query' => array(



                                                           'relation' => 'AND',



                                                           array(



                                                               'taxonomy' => 'product_cat',



                                                               'field' => 'slug',



                                                               // 'terms' => 'white-wines'



                                                               'terms' => $product_category->slug



                                                           )



                                                       ),



                                                        'post_type' => 'product',



                                                       'orderby' => 'title,'



                                                   );



                                                   $products = new WP_Query( $args );



                                                   echo "<div class='listproduct'>";



                                                   while ( $products->have_posts() ) {



                                                       $products->the_post();



                                                       ?>



                                                           <div class="product-item">

                                                                <!-- <div class="img">

                                                                    <a href="<?php the_permalink(); ?>" title="">

                                                                        <img src="<?= wp_get_attachment_image_url($product->get_image_id(), array(238, 200)) ?>"

                                                                             alt="<?= $product->get_name() ?>">

                                                                    </a>

                                                                </div> -->

                                                                <div class="content">
                                                                    <div class="title-pro">

                                                                        <a href="<?= get_permalink($product->get_id()) ?>"

                                                                           title="<?= $product->get_name() ?>"><?= $product->get_name() ?></a>

                                                                    </div>

                                                                    <div class="box">

                                                                        <?php if($product->get_regular_price() != 0)

                                                                            echo $product->get_price_html();
                                                                        ?>

                                                                    </div>
                                                            </div>

                                                            

                                                        </div>



                                                       <?php



                                                   }


                                                   echo "</div>";

                                                   echo "</div>";

                                                   echo "</section>";



                                                ?>

                                            <?php

                                           }



                                        }

                                        ?>

                                    </div>            
                </div>

    </div>
    

<style>
    .page-template-template-service .qodef-page-title {
        display: none;
    }
    .page-template-template-service #qodef-page-inner {
        padding:  30px 0;
    }
    .page-template-template-service.qodef-content-grid-1300 .qodef-content-grid {
        width: 95% !important;
    }
    .list_product_item section:nth-child(1) .product_item_id {
        padding-top: 0 !important;
    }
    .element_list_pro nav .container ul li {
      display: inline-block;
      width: 100%;
      text-align: left;
    }
    .element_list_pro nav .container ul li img {
        width: 15px;
        opacity: 0;
        display: none;
    }
    .element_list_pro nav .container ul li a {
      display: inline-block;
      text-decoration: none;
      padding: 10px 20px 10px 0;
      color: black;
    }
    .element_list_pro nav.active {
        position: fixed;
        top:  0;
        left: 0;background: #fff;
        z-index: 1000;
    }
    .element_list_pro nav.active .container ul li a {
        padding:  40px 0;
    }
    .element_list_pro nav .container ul li.active {
      background-color: transparent;
      transition: 0.3s ease background-color;
      border-bottom: 5px solid #415962;
    }
    nav .container ul li.active a {
      color: #222;
      font-weight: bold;
      padding: 10px 20px;
    }
    .element_list_pro nav .container ul li.active img {
        opacity: 1;
        display: inline-block;
        margin-right: 15px;
    }
    .element_list_pro nav.active .container {
        background: #fff;
        max-width: 100%;
    }
    .element_list_pro nav.active {
        display: flex;
        justify-content: center;
        width: 100%;
    }
   .element_list_pro nav {
            position: inherit;
            width: 100%;
            background: transparent;
        }
        .element_list_pro nav .container {
            width: 100%;
            display: block;
            overflow-y: hidden;
            overflow-x: auto;
            white-space: nowrap;
            margin-top: 0;
        }
        .element_list_pro nav .container ul {
            list-style: none;
            padding: 0px 30px;
            width: 100%;
            display: flex;
            margin-bottom: 0;
            border-bottom: 1px solid #73858c;
        }
        .list_product_item {
            width: 100%;
        }
        .element_list_pro nav.active .container {
            position: inherit;
            top: inherit;
            width: 100%;
        }
        .list_product_category {
            padding: 20px 0 60px 0;
        }

    @media screen and (max-width: 576px) {
        .list_product_category {
            padding: 0px 0 60px 0;
        }
        .element_list_pro nav .container ul li {
            margin:  0 15px;
        }
        .element_list_pro nav .container ul {
            border-bottom: none;
            padding:  0;
        }
        .element_list_pro nav .container ul li.active {
            border-bottom: none;
        }
        .element_list_pro nav .container ul li a {
            padding:  30px 0;
        }
        .element_list_pro nav.active .container {
            background: #4c9d94;
        }
        .element_list_pro nav.active .container ul li a, .element_list_pro nav.active .container ul li a {
            color:  #fff;
        }
        .listproduct .product-item {
            width: 100% !important;
        }
        .list_product_item section {
            padding-top:  145px;
        }
    }

    .list_product_item section {
        width: 100%;
        float: left;
        padding-top:  150px;
    }
    .list_product_item section:last-child {
        margin-bottom: 150px;
    }
    .listproduct .product-item {
        width: 50%;
        float: left;
    }
    .listproduct .product-item .img {
        width: 40%;
        float: left;
    }
    .listproduct .product-item .content {
        display: inline-block;
        width: 100%;
        margin: 15px;
    }
    .listproduct .product-item .content .title-pro {
        width: 75%;
        float: left;
    }
    .listproduct .product-item .content .title-pro a {
        font-weight: bold;
        color:  #405861;
    }
    .listproduct .product-item .content .box {
        width: 25%;
        float: right;
        font-weight: bold;
        color:  #405861;
    }


</style>

    <script>
        var $ = jQuery;

        $('a[href*="#"]').on('click', function (e) {
            e.preventDefault();

            $('html, body').animate({
                scrollTop: $($(this).attr('href')).offset().top
            }, 500, 'linear');
        });
        

    const sections = document.querySelectorAll("section");
    const navLi = document.querySelectorAll("nav .container ul li");
    window.addEventListener("scroll", () => {
      let current = "";
      sections.forEach((section) => {
        const sectionTop = section.offsetTop;
        const sectionHeight = section.clientHeight;
        if (pageYOffset >= sectionTop - sectionHeight / 3) {
          current = section.getAttribute("id");
        }
      });

      navLi.forEach((li) => {
        li.classList.remove("active");
        if (li.classList.contains(current)) {
          li.classList.add("active");
        }
      });

    });

    /*var width_window = jQuery(window).width();
    if(width_window > 1100) {
      
    }
    */
   
   jQuery(window).scroll(function () {

          if (jQuery(this).scrollTop() > 10) {
            jQuery('nav').addClass('active');
          } else {
            jQuery('nav').removeClass('active');
          }

      });




    </script>




<?php 

get_footer();