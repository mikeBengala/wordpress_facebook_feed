<?php
function gfn_fb_embed_icomoon(){
    ?>
        <style>
            @font-face {
              font-family: 'icomoon_gfn_fb';
              src:  url('<?=plugins_url( '/fonts/icomoon_gfn_fb.eot?do5cem', __FILE__ )?>');
              src:  url('<?=plugins_url( '/fonts/icomoon_gfn_fb.eot?do5cem#iefix', __FILE__ )?>') format('embedded-opentype'),
                url('<?=plugins_url( '/fonts/icomoon_gfn_fb.ttf?do5cem', __FILE__ )?>') format('truetype'),
                url('<?=plugins_url( '/fonts/icomoon_gfn_fb.woff?do5cem', __FILE__ )?>') format('woff'),
                url('<?=plugins_url( '/fonts/icomoon_gfn_fb.svg?do5cem#icomoon_gfn_fb', __FILE__ )?>') format('svg');
              font-weight: normal;
              font-style: normal;
            }

            [class^="icon-"], [class*=" icon-"] {
              /* use !important to prevent issues with browser extensions that change fonts */
              font-family: 'icomoon_gfn_fb' !important;
              speak: none;
              font-style: normal;
              font-weight: normal;
              font-variant: normal;
              text-transform: none;
              line-height: 1;

              /* Better Font Rendering =========== */
              -webkit-font-smoothing: antialiased;
              -moz-osx-font-smoothing: grayscale;
            }

            .icon-arrow-right:before {
              content: "\ea34";
            }
            .icon-arrow-left:before {
              content: "\ea38";
            }

            .icon-bubbles:before {
              content: "\e96c";
            }
            .icon-heart:before {
              content: "\e9da";
            }
            .icon-share:before {
              content: "\ea7d";
            }
        </style>
    <?php
}
add_action('wp_head', 'gfn_fb_embed_icomoon');
?>
