<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Image Gallery</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- Import PhotoSwipe Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.0/photoswipe.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.0/default-skin/default-skin.css">

    <!-- A touch of fanciness 💄 -->
    <link href='https://fonts.googleapis.com/css?family=Bitter:400,700,400italic' rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url() ?>assets/css/font.css" rel="stylesheet">
    <style>
    body {
        font-family: 'tumbledry';
        background: #F5F5DB;

    }




    .row-eq-height {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
    }

    h1 {
        margin: 1em;
        vertical-align: middle;
    }

    .pswp__caption__center {
        text-align: center;
    }


    .pswp__img {
        height: auto !important;
    }

    figure {
        position: relative;
        display: inline-block;
        width: 25%;
        /* float: left; */
        padding: 10px;
        ;
    }



    @media only screen and (min-device-width : 320px) and (max-device-width : 480px) {
        figure {
            width: 100%;
        }

        figure p {

            font-size: 35px !important;
        }

        img.logo-tumble {
            width: 75%;
        }

        h1.order_no {
            text-align: right !important;
        }

        h1.mobile_logo {
            text-align: left !important;
        }

        .fluid {
            width: 100% !important;
        }
    }


    img {
        width: 100%;
    }

    .spacer {
        height: 5em;
    }

    .badge {
        position: absolute;
        bottom: 20px;
        left: 15px;
        padding: 5px;
        color: #FFF;
        background: rgba(0, 0, 0, 0.5);
        line-height: 1;
        transition: opacity 100ms linear;
    }

    .badge--hidden {
        opacity: 0;
    }

    figure p {
        text-align: center;
        padding: 15px;
        font-weight: 700;
        font-size: 15px;
    }
    </style>
</head>

<body>
    <?php if(!empty($pictures)) {?>
    <section style="background:#fff;">
        <div class="container fluid">
            <div class="row">
                <div class="col-md-3 col-xs-6">
                    <h1 class="text-center mobile_logo">
                        <img class="logo-tumble" src="<?php echo base_url() ?>assets/images/logo-email.png"
                            alt="homepage" />
                    </h1>
                </div>
                <div class="col-md-9 col-xs-6">
                    <h1 class="text-right order_no">
                        Order # <?php echo $order_no?><br />
                        <?php echo $storeData->Store_Name;?>
                    </h1>
                </div>

            </div>

        </div>
    </section>
    <section style="background-color:#D79D95;height:20px; margin-bottom:16px;"></section>
    <div class="container">

        <div class="row">
            <div class="col-sm-12 text-center">



                <!-- Galley wrapper that contains all items -->
                <div id="gallery" class="gallery" itemscope itemtype="http://schema.org/ImageGallery">

                    <!-- Use figure for a more semantic html -->

                    <?php foreach ($pictures as $p){ ?>
                    <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                        <!-- Link to the big image, not mandatory, but usefull when there is no JS -->
                        <a href="https://thelawtimes.in/upload/<?php echo $p['picture'];?>"
                            data-caption="<?php echo $p['Sub_Garment']?> (<?php echo $p['remarks']?>) <br><em class='text-muted'><?php echo $p['Store_Name']?></em>"
                            data-width="0" data-height="0" itemprop="contentUrl">
                            <!-- Thumbnail -->
                            <img src="https://thelawtimes.in/upload/<?php echo $p['picture'];?>" itemprop="thumbnail"
                                alt="Image description">

                        </a>
                        <p><?php echo $p['Sub_Garment']?> (<?php echo $p['remarks']?>)
                        </p>
                    </figure>

                    <?php } ?>
                </div>

            </div>
        </div>

    </div>




    <!-- Some spacing 😉 -->
    <div class="spacer"></div>


    <!-- Root element of PhotoSwipe. Must have class pswp. -->
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
        <!-- Background of PhotoSwipe. 
           It's a separate element as animating opacity is faster than rgba(). -->
        <div class="pswp__bg"></div>
        <!-- Slides wrapper with overflow:hidden. -->
        <div class="pswp__scroll-wrap">
            <!-- Container that holds slides. 
              PhotoSwipe keeps only 3 of them in the DOM to save memory.
              Don't modify these 3 pswp__item elements, data is added later on. -->
            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>
            <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
            <div class="pswp__ui pswp__ui--hidden">
                <div class="pswp__top-bar">
                    <!--  Controls are self-explanatory. Order can be changed. -->
                    <div class="pswp__counter"></div>
                    <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                    <button class="pswp__button pswp__button--share" title="Share"></button>
                    <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                    <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                    <!-- Preloader demo https://codepen.io/dimsemenov/pen/yyBWoR -->
                    <!-- element will get class pswp__preloader--active when preloader is running -->
                    <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                            <div class="pswp__preloader__cut">
                                <div class="pswp__preloader__donut"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div>
                </div>
                <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
                </button>
                <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
                </button>
                <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Import jQuery and PhotoSwipe Scripts -->
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.0/photoswipe.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.0/photoswipe-ui-default.min.js"></script>

    <script>
    'use strict';

    /* global jQuery, PhotoSwipe, PhotoSwipeUI_Default, console */

    (function($) {

        // Init empty gallery array
        var container = [];

        // Loop over gallery items and push it to the array
        $('#gallery').find('figure').each(function() {
            var $link = $(this).find('a'),
                item = {
                    src: $link.attr('href'),
                    w: $link.data('width'),
                    h: $link.data('height'),
                    title: $link.data('caption')
                };
            container.push(item);
        });

        // Define click event on gallery item
        $('a').click(function(event) {

            // Prevent location change
            event.preventDefault();

            // Define object and gallery options
            var $pswp = $('.pswp')[0],
                options = {
                    shareButtons: [{
                        id: 'download',
                        label: 'Download image',
                        url: '{{raw_image_url}}',
                        download: true
                    }],
                    index: $(this).parent('figure').index(),
                    bgOpacity: 0.85,
                    showHideOpacity: true
                };

            // Initialize PhotoSwipe
            var gallery = new PhotoSwipe($pswp, PhotoSwipeUI_Default, container, options);

            gallery.listen('gettingData', function(index, item) {
                if (item.w < 1 || item.h < 1) { // unknown size
                    var img = new Image();
                    img.onload = function() { // will get size after load
                        item.w = this.width; // set image width
                        item.h = this.height; // set image height
                        gallery.invalidateCurrItems(); // reinit Items
                        gallery.updateSize(true); // reinit Items
                    }
                    img.src = item.src; // let's download image
                }
            });
            gallery.init();
        });

    }(jQuery));
    </script>
</body>
<?php }?>

</html>