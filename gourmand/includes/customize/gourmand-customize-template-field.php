<?php

	/**
	 *  Remder Customize fields Settings.
	 *
	 *  @creaded    october 11, 2017
	 *  @updated    october 11, 2017
	 *
	 *  @package 	Gourmand
	 *  @since      Gourmand 0.0.2
	 *  @version    0.0.1
	 */

	if( !class_exists( 'gourmand_customize_template_field' ) ){

		class gourmand_customize_template_field
		{
			public static function render( $id, $args, $obj )
			{
				if( !is_array( $args ) || isset( $args[ 'type' ] ) &&  $args[ 'type' ] == 'render' )
					return;


				if( isset( $args[ 'type' ] ) && method_exists( 'gourmand_customize_template_field', $args[ 'type' ] ) ){
					?>
						<li id="customize-control-<?php echo esc_attr( $id ); ?>" class="customize-control customize-control-<?php echo esc_attr( $args[ 'type' ] ); ?>" style="display: list-item;">
							<?php call_user_func_array( array( 'gourmand_customize_template_field', $args[ 'type' ] ), array( $id, $args, $obj ) ); ?>
						</li>
					<?php
				}
			}

			/**
			 *	Fields Settings Templates:
			 *
			 *	child_tab
			 *	checkbox
			 *	logic
			 *	url
			 *	int
			 *	number
			 *	range
			 *	percent
			 *	text
			 *	textarea
			 *	copyright
			 *	select
			 *	upload
			 *	color
			 *	rgba
			 *	gmap
			 *	font
			 *	icon
			 *	slide
			 */

			public static function child_tab( $id, $args, $obj )
			{
				if ( !isset( $args[ 'fields' ] ) || empty( $args[ 'fields' ] ) || !is_array( $args[ 'fields' ] ) )
					return;
				?>
					<div class="gourmand-tab child-tab collapsed">

						<div class="gourmand-tab-head">
							<?php if( isset( $args[ 'title' ] ) && !empty( $args[ 'title' ] ) ) { ?>
								<span class="customize-control-title"><?php echo esc_html( $args[ 'title' ] ); ?></span>
							<?php } ?>
						</div>

						<div class="gourmand-tab-content" style="display: none;">

							<?php if( isset( $args[ 'description' ] ) && !empty( $args[ 'description' ] ) ) { ?>
								<span class="customize-control-description"><?php echo gourmand_esc::desc( $args[ 'description' ] ); ?></span>
							<?php } ?>

							<ul>
								<?php
									$old_fields = $obj -> fields;
									$obj -> fields = $args[ 'fields' ];

									foreach( $args[ 'fields' ] as $id => $_args ){
										self::render( $id, $_args, $obj );
									}

									$obj -> fields = $old_fields;
								?>
							</ul>
							<div class="clear clearfix"></div>
						</div>

						<div class="clear clearfix"></div>
					</div>
				<?php
			}

			public static function checkbox( $id, $args, $obj )
			{
				?>
					<label>

						<input type="checkbox" value="<?php echo absint( $obj -> value( $id ) ); ?>" <?php $obj -> link( $id ); ?> <?php checked( gourmand_sanitize_logic( $obj -> value( $id ) ) ); ?>/>

						<?php
							if( isset( $args[ 'label' ] ) && !empty( $args[ 'label' ] ) ) {
								echo esc_html( $args[ 'label' ] );
							}
						?>

						<?php if( isset( $args[ 'description' ] ) && !empty( $args[ 'description' ] ) ) { ?>
							<span class="description customize-control-description"><?php echo gourmand_esc::desc( $args[ 'description' ] ); ?></span>
						<?php } ?>
					</label>
				<?php
			}

			public static function logic( $id, $args, $obj )
			{
				?>
					<label>

						<input type="checkbox" value="<?php echo absint( $obj -> value( $id ) ); ?>" <?php $obj -> link( $id ); ?> <?php checked( gourmand_sanitize_logic( $obj -> value( $id ) ) ); ?>/>

						<?php
							if( isset( $args[ 'label' ] ) && !empty( $args[ 'label' ] ) ) {
								echo esc_html( $args[ 'label' ] );
							}
						?>

						<?php if( isset( $args[ 'description' ] ) && !empty( $args[ 'description' ] ) ) { ?>
							<span class="description customize-control-description"><?php echo gourmand_esc::desc( $args[ 'description' ] ); ?></span>
						<?php } ?>
					</label>
				<?php
			}

			public static function email( $id, $args, $obj )
			{
				?>
					<label>

						<?php if( isset( $args[ 'label' ] ) && !empty( $args[ 'label' ] ) ) { ?>
							<span class="customize-control-title"><?php echo esc_html( $args[ 'label' ] ); ?></span>
						<?php } ?>
						<?php if( isset( $args[ 'description' ] ) && !empty( $args[ 'description' ] ) ) { ?>
							<span class="description customize-control-description"><?php echo gourmand_esc::desc( $args[ 'description' ] ); ?></span>
						<?php } ?>

						<input type="email" value="<?php echo gourmand_esc::email( $obj -> value( $id ) ); ?>" <?php echo $obj -> get_input_attrs( $id ); ?> <?php $obj -> link( $id ); ?> />

					</label>

				<?php
			}

			public static function url( $id, $args, $obj )
			{
				?>
					<label>

						<?php if( isset( $args[ 'label' ] ) && !empty( $args[ 'label' ] ) ) { ?>
							<span class="customize-control-title"><?php echo esc_html( $args[ 'label' ] ); ?></span>
						<?php } ?>
						<?php if( isset( $args[ 'description' ] ) && !empty( $args[ 'description' ] ) ) { ?>
							<span class="description customize-control-description"><?php echo gourmand_esc::desc( $args[ 'description' ] ); ?></span>
						<?php } ?>

						<input type="url" value="<?php echo esc_url( $obj -> value( $id ) ); ?>" <?php echo $obj -> get_input_attrs( $id ); ?> <?php $obj -> link( $id ); ?> />

					</label>

				<?php
			}

			public static function number( $id, $args, $obj )
			{
				$value = is_null( $id ) ? $obj -> value() : $obj -> value( $id );

				?>
					<label>

						<?php if( isset( $args[ 'label' ] ) && !empty( $args[ 'label' ] ) ) { ?>
							<span class="customize-control-title"><?php echo esc_html( $args[ 'label' ] ); ?></span>
						<?php } ?>
						<?php if( isset( $args[ 'description' ] ) && !empty( $args[ 'description' ] ) ) { ?>
							<span class="description customize-control-description"><?php echo gourmand_esc::desc( $args[ 'description' ] ); ?></span>
						<?php } ?>

						<div class="customize-control-wrapper gourmand-field-wrapper">
							<span class="gourmand-field-reset">
								<a href="javascript:void(null);" onclick=""><?php esc_html_e( 'Reset to Default', 'gourmand' ); ?></a>
							</sapn>
							<span class="gourmand-field-tools">
								<input type="number" value="<?php echo gourmand_mm_sanitize( $value, 'gourmand_sanitize_numeric', $args ); ?>" <?php echo $obj -> get_input_attrs( $id ); ?> <?php is_null( $id ) ? $obj -> link() : $obj -> link( $id ); ?> />
								<?php if( isset( $args[ 'input_attrs' ][ 'data-unit' ] ) && !empty( $args[ 'input_attrs' ][ 'data-unit' ] ) ){  ?>
									<span class="gourmand-field-unit"><?php echo esc_attr( $args[ 'input_attrs' ][ 'data-unit' ] ); ?></span>
								<?php } ?>
							</span>
						</div>
					</label>

				<?php
			}

			public static function integer( $id, $args, $obj )
			{
				$value = is_null( $id ) ? $obj -> value() : $obj -> value( $id );

				?>
					<label>

						<?php if( isset( $args[ 'label' ] ) && !empty( $args[ 'label' ] ) ) { ?>
							<span class="customize-control-title"><?php echo esc_html( $args[ 'label' ] ); ?></span>
						<?php } ?>
						<?php if( isset( $args[ 'description' ] ) && !empty( $args[ 'description' ] ) ) { ?>
							<span class="description customize-control-description"><?php echo gourmand_esc::desc( $args[ 'description' ] ); ?></span>
						<?php } ?>

						<div class="customize-control-wrapper gourmand-field-wrapper">
							<span class="gourmand-field-reset">
								<a href="javascript:void(null);" onclick=""><?php esc_html_e( 'Reset to Default', 'gourmand' ); ?></a>
							</sapn>
							<span class="gourmand-field-tools">
								<input type="number" value="<?php echo gourmand_mm_sanitize( $value, 'intval', $args ); ?>" <?php echo $obj -> get_input_attrs( $id ); ?> <?php is_null( $id ) ? $obj -> link() : $obj -> link( $id ); ?> />
								<?php if( isset( $args[ 'input_attrs' ][ 'data-unit' ] ) && !empty( $args[ 'input_attrs' ][ 'data-unit' ] ) ){  ?>
									<span class="gourmand-field-unit"><?php echo esc_attr( $args[ 'input_attrs' ][ 'data-unit' ] ); ?></span>
								<?php } ?>
							</span>
						</div>

					</label>
				<?php
			}

			public static function natural( $id, $args, $obj )
			{
				$value = is_null( $id ) ? $obj -> value() : $obj -> value( $id );

				?>
					<label>

						<?php if( isset( $args[ 'label' ] ) && !empty( $args[ 'label' ] ) ) { ?>
							<span class="customize-control-title"><?php echo esc_html( $args[ 'label' ] ); ?></span>
						<?php } ?>
						<?php if( isset( $args[ 'description' ] ) && !empty( $args[ 'description' ] ) ) { ?>
							<span class="description customize-control-description"><?php echo gourmand_esc::desc( $args[ 'description' ] ); ?></span>
						<?php } ?>

						<div class="customize-control-wrapper gourmand-field-wrapper">
							<span class="gourmand-field-reset">
								<a href="javascript:void(null);" onclick=""><?php esc_html_e( 'Reset to Default', 'gourmand' ); ?></a>
							</sapn>
							<span class="gourmand-field-tools">
								<input type="number" value="<?php echo gourmand_mm_sanitize( $value, 'absint', $args ); ?>" <?php echo $obj -> get_input_attrs( $id ); ?> <?php is_null( $id ) ? $obj -> link() : $obj -> link( $id ); ?> />
								<?php if( isset( $args[ 'input_attrs' ][ 'data-unit' ] ) && !empty( $args[ 'input_attrs' ][ 'data-unit' ] ) ){  ?>
									<span class="gourmand-field-unit"><?php echo esc_attr( $args[ 'input_attrs' ][ 'data-unit' ] ); ?></span>
								<?php } ?>
							</span>
						</div>

					</label>
				<?php
			}

			public static function range( $id, $args, $obj )
			{
				$value = is_null( $id ) ? $obj -> value() : $obj -> value( $id );

				?>
					<label>

						<?php if( isset( $args[ 'label' ] ) && !empty( $args[ 'label' ] ) ) { ?>
							<span class="customize-control-title"><?php echo esc_html( $args[ 'label' ] ); ?></span>
						<?php } ?>
						<?php if( isset( $args[ 'description' ] ) && !empty( $args[ 'description' ] ) ) { ?>
							<span class="description customize-control-description"><?php echo gourmand_esc::desc( $args[ 'description' ] ); ?></span>
						<?php } ?>

						<div class="customize-control-wrapper gourmand-field-wrapper">
							<span class="gourmand-field-reset">
								<a href="javascript:void(null);" onclick=""><?php esc_html_e( 'Reset to Default', 'gourmand' ); ?></a>
							</sapn>
							<span class="gourmand-field-tools">
								<input type="number" value="<?php echo gourmand_mm_sanitize( $value, 'gourmand_sanitize_numeric', $args ); ?>" <?php echo $obj -> get_input_attrs( $id ); ?>/>
								<?php if( isset( $args[ 'input_attrs' ][ 'data-unit' ] ) && !empty( $args[ 'input_attrs' ][ 'data-unit' ] ) ){  ?>
									<span class="gourmand-field-unit"><?php echo esc_attr( $args[ 'input_attrs' ][ 'data-unit' ] ); ?></span>
								<?php } ?>
							</span>

							<input type="range" value="<?php echo gourmand_mm_sanitize( $value, 'gourmand_sanitize_numeric', $args ); ?>" <?php echo $obj -> get_input_attrs( $id ); ?> <?php is_null( $id ) ? $obj -> link() : $obj -> link( $id ); ?> />
						</div>

					</label>
				<?php
			}

			public static function percent( $id, $args, $obj )
			{
				$value = is_null( $id ) ? $obj -> value() : $obj -> value( $id );
				?>
					<label>

						<?php if( isset( $args[ 'label' ] ) && !empty( $args[ 'label' ] ) ) { ?>
							<span class="customize-control-title"><?php echo esc_html( $args[ 'label' ] ); ?></span>
						<?php } ?>
						<?php if( isset( $args[ 'description' ] ) && !empty( $args[ 'description' ] ) ) { ?>
							<span class="description customize-control-description"><?php echo gourmand_esc::desc( $args[ 'description' ] ); ?></span>
						<?php } ?>

						<div class="customize-control-wrapper gourmand-field-wrapper">
							<span class="gourmand-field-reset"><a href="javascript:void(null);" onclick=""><?php esc_html_e( 'Reset to Default', 'gourmand' ); ?></a></sapn>
							<span class="gourmand-field-tools">
								<input type="number" value="<?php echo gourmand_mm_sanitize( $value, 'gourmand_sanitize_percent', $args ); ?>" <?php echo $obj -> get_input_attrs( $id ); ?>/>
								<?php if( isset( $args[ 'input_attrs' ][ 'data-unit' ] ) && !empty( $args[ 'input_attrs' ][ 'data-unit' ] ) ){  ?>
									<span class="gourmand-field-unit"><?php echo esc_attr( $args[ 'input_attrs' ][ 'data-unit' ] ); ?></span>
								<?php } ?>
							</span>

							<input type="range" value="<?php echo gourmand_mm_sanitize( $value, 'gourmand_sanitize_percent', $args ); ?>" <?php echo $obj -> get_input_attrs( $id ); ?> <?php is_null( $id ) ? $obj -> link() : $obj -> link( $id ); ?> />
						</div>

					</label>
				<?php
			}

			public static function text( $id, $args, $obj )
			{
				?>
					<label>

						<?php if( isset( $args[ 'label' ] ) && !empty( $args[ 'label' ] ) ) { ?>
							<span class="customize-control-title"><?php echo esc_html( $args[ 'label' ] ); ?></span>
						<?php } ?>
						<?php if( isset( $args[ 'description' ] ) && !empty( $args[ 'description' ] ) ) { ?>
							<span class="description customize-control-description"><?php echo gourmand_esc::desc( $args[ 'description' ] ); ?></span>
						<?php } ?>

						<input type="text" value="<?php echo gourmand_sanitize( $obj -> value( $id ), 'sanitize_text_field', $args ); ?>" <?php echo $obj -> get_input_attrs( $id ); ?> <?php $obj -> link( $id ); ?> />

					</label>
				<?php
			}

			public static function textarea( $id, $args, $obj )
			{
				?>
					<label>

						<?php if( isset( $args[ 'label' ] ) && !empty( $args[ 'label' ] ) ) { ?>
							<span class="customize-control-title"><?php echo esc_html( $args[ 'label' ] ); ?></span>
						<?php } ?>
						<?php if( isset( $args[ 'description' ] ) && !empty( $args[ 'description' ] ) ) { ?>
							<span class="description customize-control-description"><?php echo gourmand_esc::desc( $args[ 'description' ] ); ?></span>
						<?php } ?>

						<textarea rows="5" <?php echo $obj -> get_input_attrs( $id ) ?> <?php $obj -> link( $id ); ?>><?php echo gourmand_sanitize( $obj -> value( $id ), 'esc_textarea', $args ); ?></textarea>

					</label>
				<?php
			}

			public static function copyright( $id, $args, $obj )
			{
				?>
					<label>

						<?php if( isset( $args[ 'label' ] ) && !empty( $args[ 'label' ] ) ) { ?>
							<span class="customize-control-title"><?php echo esc_html( $args[ 'label' ] ); ?></span>
						<?php } ?>
						<?php if( isset( $args[ 'description' ] ) && !empty( $args[ 'description' ] ) ) { ?>
							<span class="description customize-control-description"><?php echo gourmand_esc::desc( $args[ 'description' ] ); ?></span>
						<?php } ?>

						<textarea rows="5" <?php echo $obj -> get_input_attrs( $id ) ?> <?php $obj -> link( $id ); ?>><?php echo gourmand_sanitize( $obj -> value( $id ), 'gourmand_sanitize_copyright', $args ); ?></textarea>

					</label>
				<?php
			}

			public static function editor( $id, $args, $obj )
			{
				?>
					<label>
						<?php if( isset( $args[ 'label' ] ) && !empty( $args[ 'label' ] ) ) { ?>
							<span class="customize-control-title"><?php echo esc_html( $args[ 'label' ] ); ?></span>
						<?php } ?>
						<?php if( isset( $args[ 'description' ] ) && !empty( $args[ 'description' ] ) ) { ?>
							<span class="description customize-control-description"><?php echo gourmand_esc::desc( $args[ 'description' ] ); ?></span>
						<?php } ?>

						<textarea id="<?php echo esc_attr( $id ); ?>" rows="5" <?php echo $obj -> get_input_attrs( $id ) ?> <?php $obj -> link( $id ); ?>><?php echo $obj -> value( $id ); ?></textarea>

					</label>

					<?php
						$valid_elements 	= '';
						$plugins 			= '';
						$toolbar1			= '';
						$content_style 		= "body, p { font-family: 'Open Sans', sans-serif; font-size: 14px; line-height: 24px; color: #555555; }";

						if( $args[ 'attrs' ][ 'style' ] == 1 ){
							$content_style 	= "body { font-family: Montez, sans-serif; font-size: 42px; line-height: 52px; font-weight: bold; color: #233141; }";
						}

						if( $args[ 'attrs' ][ 'aligns' ] ){
							$toolbar1 		= ' alignleft aligncenter alignright alignjustify |';
						}

						if( $args[ 'attrs' ][ 'accent' ] ){
							$plugins		= 'accent_color';
							$toolbar1 	   .= ' accent_color |';
							$content_style .= ' span.accent-color{ color: ' . gourmand_mod::get( 'accent-color' ) . ';}';
						}

						if( $args[ 'attrs' ][ 'break' ] ){
							$valid_elements.= 'p,span[class],strong/b,em/i';
						}

						else{
							$content_style .= ' br{ display: none; }';
							$valid_elements.= 'span[class],strong/b,em/i';
						}
					?>

					<script type="text/text/javascript">
						tinymce.init({
							selector: 'textarea#<?php echo esc_attr( $id ); ?>',
							height: 200,
							menubar: false,
							valid_elements : '<?php echo $valid_elements; ?>',
							<?php if( !$args[ 'attrs' ][ 'break' ] ) : ?>
							forced_root_block : "",
							<?php endif; ?>
							content_style: "<?php echo $content_style; ?>",
							branding: false,
							theme: 'modern',
							plugins: '<?php echo esc_attr( $plugins ); ?>',
							toolbar1: 'bold italic strikethrough | <?php echo $toolbar1; ?> removeformat',
							setup: function (editor) {

								editor.on( 'focusout', function(){
									editor.save();
									jQuery( 'textarea#<?php echo esc_attr( $id ); ?>' ).change();
								});

								editor.on( 'change', function(){
									jQuery( 'textarea#<?php echo esc_attr( $id ); ?>' ).change();
								});
							}
						});
					</script>
					<style type="text/css">
						.mce-btn button i.mce-ico.mce-i-accent_color{
							background-color: <?php echo gourmand_mod::get( 'accent-color' ); ?>;
							-webkit-border-radius: 3px;
							-moz-border-radius: 3px;
							border-radius: 3px;
						}
					</style>
				<?php

			}

			public static function select( $id, $args, $obj )
			{
				if ( !isset( $args[ 'options' ] ) || empty( $args[ 'options' ] ) )
					return;
				?>
					<label>
						<?php if( isset( $args[ 'label' ] ) && !empty( $args[ 'label' ] ) ) { ?>
							<span class="customize-control-title"><?php echo esc_html( $args[ 'label' ] ); ?></span>
						<?php } ?>
						<?php if( isset( $args[ 'description' ] ) && !empty( $args[ 'description' ] ) ) { ?>
							<span class="description customize-control-description"><?php echo gourmand_esc::desc( $args[ 'description' ] ); ?></span>
						<?php } ?>

						<select <?php $obj -> link( $id ); ?>>

						<?php foreach( $args[ 'options' ] as $key => $value ){ ?>
							<option value="<?php echo gourmand_sanitize( $key, 'esc_attr', $args ); ?>" <?php selected( gourmand_sanitize( $obj -> value( $id ), 'esc_attr', $args ), gourmand_sanitize( $key, 'esc_attr', $args ) ); ?>><?php echo esc_html( $value ); ?></option>
						<?php } ?>

						</select>

					</label>
				<?php
			}

			public static function uploader( $id, $args, $obj )
			{
				?>
					<label>
						<?php if( !empty( $args[ 'label' ] ) ) { ?>
							<span class="customize-control-title"><?php echo esc_html( $args[ 'label' ] ); ?></span>
						<?php } ?>
						<?php if( !empty( $args[ 'description' ] ) ) { ?>
							<span class="description customize-control-description"><?php echo gourmand_esc::desc( $args[ 'description' ] ); ?></span>
						<?php } ?>
					</label>

					<?php
						$uploader_src_key 	= $id;
						$uploader_id_key	= "{$id}-id";

						$uploader_src 		= esc_url( $obj -> value( $uploader_src_key ) );
						$uploader_id		= absint( $obj -> value( $uploader_id_key ) );

						$media 				= null;
						$is_media_image		= true;
						$is_media_video		= false;

						if( $uploader_id ){
							$uploader_src 		= esc_url( wp_get_attachment_url( $uploader_id ) );
							$media          	= get_post( absint( $uploader_id ) );
							$is_media_image 	= isset( $media -> ID ) && wp_attachment_is( 'image', $media );
							$is_media_video 	= isset( $media -> ID ) && wp_attachment_is( 'video', $media );
						}

						$classes 			= '';
						$hidden_classes 	= 'hidden';

						if( empty( $uploader_src ) ){
							$classes 		= 'hidden';
							$hidden_classes = '';
						}

						$media_classes_image = 'hidden';
						$media_classes_video = 'hidden';

						if( $is_media_image )
							$media_classes_image = '';

						if( $is_media_video )
							$media_classes_video = '';
					?>

					<div class="gourmand-attachment-view">
						<input type="hidden" value="<?php echo esc_url( $obj -> value( $uploader_src_key ) ); ?>" <?php $obj -> link( $uploader_src_key ); ?>/>
						<input type="hidden" value="<?php echo absint( $obj -> value( $uploader_id_key ) ); ?>" <?php $obj -> link( $uploader_id_key ); ?>/>

						<div id="<?php echo esc_attr( "gourmand-preview-{$uploader_src_key}" ); ?>" class="gourmand-preview image <?php echo esc_attr( $classes ); ?>">

							<?php if( $is_media_image ) : ?>
								<img src="<?php echo esc_url( $uploader_src ); ?>" class="image-preview <?php echo esc_attr( $media_classes_image ); ?>" style="max-width: 100%; width: auto;"/>
							<?php else : ?>
								<img src="" class="image-preview <?php echo esc_attr( $media_classes_image ); ?>" style="max-width: 100%; width: auto;"/>
							<?php endif; ?>

							<?php if( $is_media_video ) : ?>
								<video class="gourmand-video-embed video-preview <?php echo esc_attr( $media_classes_video ); ?>" controls="" style="max-width: 100%; width: auto;">
	    							<source src="<?php echo esc_url( $uploader_src ); ?>" type="<?php echo esc_attr( get_post_mime_type( $media ) ); ?>">
	    						</video>
							<?php else : ?>
								<video class="gourmand-video-embed video-preview <?php echo esc_attr( $media_classes_video ); ?>" controls="" style="max-width: 100%; width: auto;">
	    							<source src="" type="">
	    						</video>
							<?php endif; ?>
						</div>

						<div id="<?php echo esc_attr( "gourmand-place-holder-{$uploader_src_key}" ); ?>" class="gourmand-place-holder <?php echo esc_attr( $hidden_classes ); ?>" style="width: 100%; position: relative; text-align: center; cursor: default; border: 1px dashed #b4b9be; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; padding: 9px 0; line-height: 20px; font-size: 13px; line-height: 20px;">
							<span><?php esc_html_e( 'No file selected', 'gourmand' ); ?></span>
						</div>

						<div class="actions">
							<button type="button" class="button upload-button gourmand-upload-button" id="<?php echo esc_attr( $id ); ?>-upload-button" data-uploader-src="<?php echo esc_attr( $uploader_src_key ); ?>" data-uploader-id="<?php echo esc_attr( $uploader_id_key ); ?>">
								<span class="select-file <?php echo esc_attr( $hidden_classes ); ?>"><?php esc_html_e( 'Select File', 'gourmand' ); ?></span>
								<span class="change-file <?php echo esc_attr( $classes ); ?>"><?php esc_html_e( 'Change File', 'gourmand' ); ?></span>
							</button>
							<button type="button" class="button upload-button gourmand-remove-button <?php echo esc_attr( $classes ); ?>" id="<?php echo esc_attr( $id ); ?>-remove-button" data-uploader-src="<?php echo esc_attr( $uploader_src_key ); ?>" data-uploader-id="<?php echo esc_attr( $uploader_id_key ); ?>">
								<?php esc_html_e( 'Remove', 'gourmand' ); ?>
							</button>
						</div>
					</div>
				<?php
			}

			public static function color( $id, $args, $obj )
			{
				$value		= is_null( $id ) ? $obj -> value() : $obj -> value( $id );
				$default	= isset( $args[ 'default' ] ) ? sanitize_hex_color( $args[ 'default' ] ) : '#ffffff';
				?>
					<label>
						<?php if( !empty( $args[ 'label' ] ) ) { ?>
							<span class="customize-control-title"><?php echo esc_html( $args[ 'label' ] ); ?></span>
						<?php } ?>
						<?php if( !empty( $args[ 'description' ] ) ) { ?>
							<span class="description customize-control-description"><?php echo gourmand_esc::desc( $args[ 'description' ] ); ?></span>
						<?php } ?>
					</label>

					<label class="gourmand-color-picker-hex-wrapper">
						<input class="gourmand-color-picker-hex" type="text" value="<?php echo gourmand_mm_sanitize( $value, 'sanitize_hex_color', $args ); ?>" data-default-color="<?php echo sanitize_hex_color( $default ) ?>" <?php $obj -> link( $id ); ?>/>
					</label>

				<?php
			}

			public static function rgba( $id, $args, $obj )
			{

			}

			public static function gmap( $id, $args, $obj )
			{

			}

			public static function font( $id, $args, $obj )
			{

			}

			public static function icon( $id, $args, $obj )
			{
				if ( !isset( $args[ 'icons' ] ) || empty( $args[ 'icons' ] ) )
					$args['icons'] = gourmand_config::get( 'icons' );

				$value = gourmand_sanitize( $obj -> value( $id ), 'esc_attr', $args );

				?>
					<label>

						<div class="customize-icon-wrapper">
							<input type="hidden" value="<?php echo gourmand_sanitize( $obj -> value( $id ), 'esc_attr', $args ); ?>" <?php $obj -> link( $id ); ?>>
							<span class="selected-icon">
								<i class="<?php echo gourmand_sanitize( $obj -> value( $id ), 'esc_attr', $args ); ?>"></i>
							</span>
							<div class="icons-wrapper">
								<div class="header">
									<input type="search" class="search-icon" placeholder="<?php esc_html_e( 'Search Icon..', 'gourmand' ); ?>"/> <span class="hint"><?php esc_html_e( 'eg: paper-plane', 'gourmand' ); ?></span>
									<a href="javascript:void(null);" data-action="close" class="gourmand-icon-cancel"></a>
								</div>
								<div class="content">
									<?php
										foreach( $args[ 'icons' ] as $icon ){
											if( $value == $icon ) :
												?>
													<span class="icon-wrapper selected">
														<i class="<?php echo esc_attr( $icon ); ?>"></i>
													</span>
												<?php
											else :
												?>
													<span class="icon-wrapper">
														<i class="<?php echo esc_attr( $icon ); ?>"></i>
													</span>
												<?php
											endif;
										}
									?>
								</div>
							</div>
						</div>

						<?php if( isset( $args[ 'label' ] ) && !empty( $args[ 'label' ] ) ) { ?>
							<span class="customize-control-title"><?php echo esc_html( $args[ 'label' ] ); ?></span>
						<?php } ?>
						<?php if( isset( $args[ 'description' ] ) && !empty( $args[ 'description' ] ) ) { ?>
							<span class="description customize-control-description"><?php echo gourmand_esc::desc( $args[ 'description' ] ); ?></span>
						<?php } ?>

						<div class="clear clearfix"></div>

					</label>
				<?php
			}

			public static function slide( $id, $args, $obj )
			{

			}
		}
	}
?>
