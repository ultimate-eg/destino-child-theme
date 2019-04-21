<?php add_action( 'wp_enqueue_scripts', 'ya_enqueue_styles' );
function ya_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}


 add_filter('woocommerce_currency_symbol', 'change_existing_currency_symbol', 10, 2);

function change_existing_currency_symbol( $currency_symbol, $currency ) {
	 global $sitepress;
	 $my_current_lang =  get_locale();
	 $current_wp_lang = get_locale();
	 if ($sitepress) {
   $my_current_lang = apply_filters( 'wpml_current_language', NULL );
 		}
	 $current_wp_lang = substr($current_wp_lang, 0, 2);
   if ($my_current_lang == 'en' || $current_wp_lang == 'en' ) {
       $currency_symbol = $currency. ' ';
   } else {
		   $currency_symbol = ' '.$currency_symbol;
	 }
   return $currency_symbol;
}
