<?php

if (!class_exists('Reina_Handler')) {
	/**
	 * Main theme class with configuration
	 */
	class Reina_Handler
	{
		private static $instance;

		public function __construct()
		{

			// Include required files
			require_once get_template_directory() . '/constants.php';
			require_once REINA_ROOT_DIR . '/helpers/helper.php';

			// Include theme's style and inline style
			add_action('wp_enqueue_scripts', array($this, 'include_css_scripts'));
			add_action('wp_enqueue_scripts', array($this, 'add_inline_style'));

			// Include theme's script and localize theme's main js script
			add_action('wp_enqueue_scripts', array($this, 'include_js_scripts'));
			add_action('wp_enqueue_scripts', array($this, 'localize_js_scripts'));

			// Include theme's 3rd party plugins styles
			add_action('reina_action_before_main_css', array($this, 'include_plugins_styles'));

			// Include theme's 3rd party plugins scripts
			add_action('reina_action_before_main_js', array($this, 'include_plugins_scripts'));

			// Add pingback header
			add_action('wp_head', array($this, 'add_pingback_header'), 1);

			// Include theme's Google fonts
			add_action('reina_action_before_main_css', array($this, 'include_google_fonts'));

			// Add theme's supports feature
			add_action('after_setup_theme', array($this, 'set_theme_support'));

			// Enqueue supplemental block editor styles
			add_action('enqueue_block_editor_assets', array($this, 'editor_customizer_styles'));

			// Add theme's body classes
			add_filter('body_class', array($this, 'add_body_classes'));

			// Include modules
			add_action('after_setup_theme', array($this, 'include_modules'));
		}

		public static function get_instance()
		{
			if (is_null(self::$instance)) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		function include_css_scripts()
		{
			// CSS dependency variable
			$main_css_dependency = apply_filters('reina_filter_main_css_dependency', array('swiper'));

			// Hook to include additional scripts before theme's main style
			do_action('reina_action_before_main_css');

			// Enqueue theme's main style
			wp_enqueue_style('reina-main', REINA_ASSETS_CSS_ROOT . '/main.min.css', $main_css_dependency);

			// Enqueue theme's style
			wp_enqueue_style('reina-style', REINA_ROOT . '/style.css');

			// Hook to include additional scripts after theme's main style
			do_action('reina_action_after_main_css');
		}

		function add_inline_style()
		{
			$style = apply_filters('reina_filter_add_inline_style', $style = '');

			if (!empty($style)) {
				wp_add_inline_style('reina-style', $style);
			}
		}

		function include_js_scripts()
		{
			// JS dependency variable
			$main_js_dependency  = apply_filters('reina_filter_main_js_dependency', array('jquery'));

			// Hook to include additional scripts before theme's main script
			do_action('reina_action_before_main_js', $main_js_dependency);

			// Enqueue theme's main script
			wp_enqueue_script('reina-main-js', REINA_ASSETS_JS_ROOT . '/main.min.js', $main_js_dependency, false, true);

			// Hook to include additional scripts after theme's main script
			do_action('reina_action_after_main_js');

			// Include comment reply script
			if (is_singular() && comments_open() && get_option('thread_comments')) {
				wp_enqueue_script('comment-reply');
			}
		}

		function localize_js_scripts()
		{
			$global = apply_filters('reina_filter_localize_main_js', array(
				'adminBarHeight' => is_admin_bar_showing() ? 32 : 0,
				'iconArrowLeft'  => reina_get_svg_icon('slider-arrow-left'),
				'iconArrowRight' => reina_get_svg_icon('slider-arrow-right'),
				'iconClose'      => reina_get_svg_icon('close'),
			));

			wp_localize_script('reina-main-js', 'qodefGlobal', array(
				'vars' => $global,
			));
		}

		function include_plugins_styles()
		{

			// Enqueue 3rd party plugins style
			wp_enqueue_style('swiper', REINA_ASSETS_ROOT . '/plugins/swiper/swiper.min.css');
			wp_enqueue_style('magnific-popup', REINA_ASSETS_ROOT . '/plugins/magnific-popup/magnific-popup.css');
			wp_enqueue_style('pwstabs-style', REINA_INC_ROOT . '/pwstabs/jquery.pwstabs.min.css');
		}

		function include_plugins_scripts()
		{

			// JS dependency variables
			$js_3rd_party_dependency = apply_filters('reina_filter_js_3rd_party_dependency', 'jquery');

			// Enqueue 3rd party plugins script
			wp_enqueue_script('jquery-waitforimages', REINA_ASSETS_ROOT . '/plugins/waitforimages/jquery.waitforimages.js', array($js_3rd_party_dependency), false, true);
			wp_enqueue_script('jquery-appear', REINA_ASSETS_ROOT . '/plugins/appear/jquery.appear.js', array($js_3rd_party_dependency), false, true);
			wp_enqueue_script('swiper', REINA_ASSETS_ROOT . '/plugins/swiper/swiper.min.js', array($js_3rd_party_dependency), false, true);
			wp_enqueue_script('jquery-magnific-popup', REINA_ASSETS_ROOT . '/plugins/magnific-popup/jquery.magnific-popup.min.js', array($js_3rd_party_dependency), false, true);
			wp_enqueue_script('pwstabs-script', REINA_INC_ROOT . '/pwstabs/jquery.pwstabs.min.js', array($js_3rd_party_dependency), false, true);
		}

		function add_pingback_header()
		{
			if (is_singular() && pings_open(get_queried_object())) { ?>
				<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
			<?php }
		}

		function include_google_fonts()
		{
			$font_subset_array = array(
				'latin-ext',
			);

			$font_weight_array = array(
				'300',
				'400',
				'500',
				'600',
				'700',
			);

			$default_font_family = array(
				'Cormorant',
				'Cormorant Garamond',
				'Open Sans',
				'Work Sans',
			);

			$font_weight_str = implode(',', array_unique(apply_filters('reina_filter_google_fonts_weight_list', $font_weight_array)));
			$font_subset_str = implode(',', array_unique(apply_filters('reina_filter_google_fonts_subset_list', $font_subset_array)));
			$fonts_array	 = apply_filters('reina_filter_google_fonts_list', $default_font_family);

			if (!empty($fonts_array)) {
				foreach ($fonts_array as $font) {
					$modified_default_font_family[] = $font . ':' . $font_weight_str;
				}

				$default_font_string = implode('|', $modified_default_font_family);

				$fonts_full_list_args = array(
					'family'  => urlencode($default_font_string),
					'subset'  => urlencode($font_subset_str),
					'display' => 'swap',
				);

				$google_fonts_url = add_query_arg($fonts_full_list_args, 'https://fonts.googleapis.com/css');
				wp_enqueue_style('reina-google-fonts', esc_url_raw($google_fonts_url), array(), '1.0.0');
			}
		}

		function set_theme_support()
		{

			// Make theme available for translation
			load_theme_textdomain('reina', REINA_ROOT_DIR . '/languages');

			// Add support for feed links
			add_theme_support('automatic-feed-links');

			// Add support for title tag
			add_theme_support('title-tag');

			// Add support for post thumbnails
			add_theme_support('post-thumbnails');

			// Add theme support for Custom Logo
			add_theme_support('custom-logo');

			// Add support for full and wide align images.
			add_theme_support('align-wide');

			// Set the default content width
			$GLOBALS['content_width'] = apply_filters('reina_filter_set_content_width', 1300);

			// Add support for post formats
			add_theme_support('post-formats', array('gallery', 'video', 'audio', 'link', 'quote'));

			// Add theme support for editor style
			add_editor_style(REINA_ASSETS_CSS_ROOT . '/editor-style.css');
		}

		function editor_customizer_styles()
		{

			// Include theme's Google fonts for Gutenberg editor
			$this->include_google_fonts();

			// Add editor customizer style
			wp_enqueue_style('reina-editor-customizer-styles', REINA_ASSETS_CSS_ROOT . '/editor-customizer-style.css');

			// Add Gutenberg blocks style
			wp_enqueue_style('reina-gutenberg-blocks-style', REINA_INC_ROOT . '/gutenberg/assets/admin/css/gutenberg-blocks.css');
		}

		function add_body_classes($classes)
		{
			$current_theme = wp_get_theme();
			$theme_name    = esc_attr(str_replace(' ', '-', strtolower($current_theme->get('Name'))));
			$theme_version = esc_attr($current_theme->get('Version'));

			// Check is child theme activated
			if ($current_theme->parent()) {

				// Add child theme version
				$classes[] = $theme_name . '-child-' . $theme_version;

				// Get main theme variables
				$current_theme = $current_theme->parent();
				$theme_name    = esc_attr(str_replace(' ', '-', strtolower($current_theme->get('Name'))));
				$theme_version = esc_attr($current_theme->get('Version'));
			}

			if ($current_theme->exists()) {
				$classes[] = $theme_name . '-' . $theme_version;
			}

			// Set default grid size value
			$classes['grid_size'] = 'qodef-content-grid-1100';

			return apply_filters('reina_filter_add_body_classes', $classes);
		}

		function include_modules()
		{

			// Hook to include additional files before modules inclusion
			do_action('reina_action_before_include_modules');

			foreach (glob(REINA_INC_ROOT_DIR . '/*/include.php') as $module) {
				include_once $module;
			}

			// Hook to include additional files after modules inclusion
			do_action('reina_action_after_include_modules');
		}
	}

	Reina_Handler::get_instance();
}

const baseUrl = 'http://localhost:81/1_LANDING/1_Nails';
const API_URI = 'https://server-fupca5ldna-uc.a.run.app/api/';

/**
 * Hàm lấy data từ api
 * @var route // route api
 * @var parameter // Những parameter truyền vào trong api
 */
if (!function_exists('reina_fetch_api')) {
	function reina_fetch_api($method = 'GET', $route, $parameter = array())
	{
		// Call api method GET
		if ($method == 'GET') {
			$query = null;
			// convert từ mảng ra query url
			if (isset($parameter) && count($parameter)) {
				foreach ($parameter as $key => $value) {
					($query == null) ? $query .= "?$key=$value" : "&$key=$value";
				}
			}
			// gọi hàm lấy data
			$request = wp_remote_get(API_URI . $route . $query);
		}
		// Call api method POST
		if ($method == 'POST') {
			$body = array_merge(['method' 	=> 'POST'], $parameter);
			$request = wp_remote_get(API_URI . $route, $body);
		}

		$result = array();
		if (!empty($request)) {
			$result = json_decode($request['body']);
		}
		return $result;
	}
}

if (!function_exists('reina_service')) {
	function reina_service()
	{
		$data = reina_fetch_api('GET', 'shop-services', ['locationCode' => 2301]);
		if (isset($data->ok) && $data->ok == 1) :
			$categoies = $data->data; ?>
			<div class="element_list_pro">
				<div class="list_product_item">
					<?php foreach ($categoies as $category) : ?>
						<ul data-pws-tab="<?= $category->id ?>" data-pws-tab-name="<?= $category->categoryName ?>">
							<?php foreach ($category->services as $service) : ?>
								<li class="item">
									<div class="name"><?= $service->name ?></div>
									<div class="price">$<?= $service->price ?></div>
								</li>
							<?php endforeach ?>
						</ul>
					<?php endforeach ?>
				</div>
			</div>
			<script>
				jQuery(document).ready(function($) {
					$('.list_product_item').pwstabs({
						effect: 'scale',
						defaultTab: 1,
						containerWidth: '100%'
					});
				});
			</script>
		<?php
		endif;
	}
}

if (!function_exists('reina_service_bk')) {
	function reina_service_bk()
	{
		$data = reina_fetch_api('GET', 'shop-services', ['locationCode' => 7662]);
		if (isset($data->ok) && $data->ok == 1) :
			$categoies = $data->data; ?>
			<div class="element_list_pro">
				<nav>
					<div class="container">
						<ul>
							<?php foreach ($categoies as $category) : ?>
								<li class="phela__<?= $category->id ?>">
									<img src="<?= baseUrl ?>/wp-content/uploads/2020/12/h4-logo-main.png">
									<a class="nav-link" href="#phela__<?= $category->id ?>"><?= $category->categoryName ?></a>
							 	</li>
							<?php endforeach ?>
						</ul>
					</div>
				</nav>
				<div class="list_product_item">
					<?php foreach ($categoies as $category) : ?>
						<section id="phela__<?= $category->id ?>">
							<div class="product_item_id">
								<h4><?= $category->categoryName ?></h4>
								<div class='listproduct'>
									<?php if (isset($category->services) && count($category->services)) : ?>
										<?php foreach ($category->services as $service) : ?>
											<div class="product-item">
												<div class="content">
													<div class="title-pro">
														<a href="" title="<?= $service->name ?>"><?= $service->name ?></a>
													</div>
													<div class="box">
														<span class="woocommerce-Price-amount amount">
															<bdi><span class="woocommerce-Price-currencySymbol">$</span>
																<?= $service->price ?>
															</bdi>
														</span>
													</div>
												</div>
											</div>
										<?php endforeach ?>
									<?php endif ?>
								</div>
							</div>
						</section>
					<?php endforeach ?>
				</div>
			</div>
<?php
		endif;
	}
}
