<?php

	/**
	 *  ..
	 *
	 *  @creaded    october 11, 2017
	 *  @updated    october 11, 2017
	 *
	 *  @package 	Gourmand
	 *  @since      Gourmand 0.0.2
	 *  @version    0.0.1
	 */

	if( !class_exists( 'gourmand_html_input' ) ){

		/*
		 * 	$args = array(
		 * 		...
		 *
		 * 		'id'		=> 'HTML DOM Attribute'
		 * 		'class' 	=> 'HTML DOM Attribute',
		 * 		'format' 	=> [ 'across' | 'linear' ],
		 * 		'input' 	=> array(
		 * 			'id'		=> 'HTML DOM Attribute "id"',
		 *			'type'		=> 'HTML DOM Attribute "type" OR custom name defined in this class',
		 * 			'name' 		=> 'HTML DOM Attribute "name"',
		 * 			'class' 	=> 'HTML DOM Attribute "class"',
		 * 			'min' 		=> 'HTML DOM Attribute "min"',
		 * 			'max' 		=> 'HTML DOM Attribute "max"',
		 * 			'step' 		=> 'HTML DOM Attribute "step"',
		 * 			'unit' 		=> 'HTML DOM Attribute ( custom ) "data-unit"',
		 * 			'default' 	=> 'HTML DOM Attribute ( custom ) "data-default"',
		 * 			'value' 	=> 'HTML DOM Attribute OR Content',
		 * 			'values' 	=> array(
		 *				'xx'	=> 'Current value',
		 *				'en'	=> 'English language value',
		 *				'fr'	=> 'French WordPress language value',
		 *				'de'	=> 'Dutch WordPress language value',
		 * 				...
		 * 			),
		 * 			'actions' 	=> 'HTML DOM Attribute ( + custom ) "onclick|onchange|onkeypress|onkeyup|data-action"',
		 * 			'ajax' 		=> 'HTML DOM Attribute ( + custom ) "onclick|onchange|onkeypress|onkeyup|data-action"',
		 * 			'options' 	=> array(
		 *				'group' 	=> array(
		 *					'value1' 	=> [ 'label1' | 'image1' | 'icon1' ],
		 *					'value1' 	=> [ 'label2' | 'image2' | 'icon2' ],
		 *					'value1' 	=> [ 'label3' | 'image3' | 'icon3' ],
		 *					...
		 * 				),
		 *				...
		 *			),
		 *		),
		 * 		...
		 * 	);
		 *
		 ****/

		class gourmand_html_input
		{
			private $attr;

			function __construct()
			{
				$this -> attr = new gourmand_html_attr();
			}

			function get( $args )
			{
				if( isset( $args[ 'type' ] ) && method_exists( $this, $args[ 'type' ] ) ){
					$rett = call_user_func_array( array( $this, $args[ 'type' ] ), array( $args ) );
				}
				else{
					ob_start();
		            print_r( $args );
		            $data = ob_get_clean();

		            $bt = debug_backtrace();
		            $caller = array_shift( $bt );

		            $rett  	= '<pre>' . $caller[ 'file' ] . ' : ' . $caller[ 'line' ];
		            $rett  .= '<br>Field not exist : [ ' . esc_attr( $this -> attr -> name( $args ) ) . ' ]';
		            $rett  .= '<br>' . $data .'</pre>';
				}

				return $rett;
			}

			//- INT -//
		    function int( $args )
		    {
		        return '<input type="number" '
		                . $this -> attr -> get( 'id', 			$args ) . ' '
		                . $this -> attr -> get( 'class', 		$args ) . ' '
		                . $this -> attr -> get( 'name', 		$args ) . ' '
		                . $this -> attr -> get( 'value', 		$args ) . ' '
						. $this -> attr -> get( 'style', 		$args ) . ' '
		                . $this -> attr -> get( 'min', 			$args ) . ' '
		                . $this -> attr -> get( 'max', 			$args ) . ' '
		                . $this -> attr -> get( 'step', 		$args ) . ' '
		                . $this -> attr -> get( 'data-unit', 	$args ) . ' '
		                . $this -> attr -> get( 'data-default', $args ) . ' '
		                . '/>';
		    }

		    //- NUMBER -//
		    function number( $args )
		    {
		        return '<input type="number" '
		                . $this -> attr -> get( 'id', 			$args ) . ' '
		                . $this -> attr -> get( 'class', 		$args ) . ' '
		                . $this -> attr -> get( 'name', 		$args ) . ' '
		                . $this -> attr -> get( 'value', 		$args ) . ' '
						. $this -> attr -> get( 'style', 		$args ) . ' '
		                . $this -> attr -> get( 'min', 			$args ) . ' '
		                . $this -> attr -> get( 'max', 			$args ) . ' '
		                . $this -> attr -> get( 'step', 		$args ) . ' '
		                . $this -> attr -> get( 'data-unit', 	$args ) . ' '
		                . $this -> attr -> get( 'data-default', $args ) . ' '
		                . '/>';
		    }

		    //- RANGE -//
		    function range( $args )
		    {
		        return '<input type="range" '
		                . $this -> attr -> get( 'id', 			$args ) . ' '
		                . $this -> attr -> get( 'class', 		$args ) . ' '
		                . $this -> attr -> get( 'name', 		$args ) . ' '
		                . $this -> attr -> get( 'value', 		$args ) . ' '
						. $this -> attr -> get( 'style', 		$args ) . ' '
		                . $this -> attr -> get( 'min', 			$args ) . ' '
		                . $this -> attr -> get( 'max', 			$args ) . ' '
		                . $this -> attr -> get( 'step', 		$args ) . ' '
		                . $this -> attr -> get( 'data-unit', 	$args ) . ' '
		                . $this -> attr -> get( 'data-default', $args ) . ' '
		                . '/>';
		    }

		    function percent( $args )
		    {
		        return $this -> range( wp_parse_args( (array)$args,
		        	array(
		    			'min' 	=> 1,
		    			'max' 	=> 100,
		    			'unit' 	=> '%'
		    		)
		    	));
		    }

		    //- EMAIL -//
		    function email( $args )
		    {
		        return '<input type="email" '
		                . $this -> attr -> get( 'id', 			$args ) . ' '
		                . $this -> attr -> get( 'class', 		$args ) . ' '
		                . $this -> attr -> get( 'name', 		$args ) . ' '
		                . $this -> attr -> get( 'value', 		$args ) . ' '
						. $this -> attr -> get( 'style', 		$args ) . ' '
		                . $this -> attr -> get( 'data-default', $args ) . ' '
		                . '/>';
		    }

		    //- URL -//
		    function url( $args )
		    {
		        return '<input type="url" '
		                . $this -> attr -> get( 'id', 			$args ) . ' '
		                . $this -> attr -> get( 'class', 		$args ) . ' '
		                . $this -> attr -> get( 'name', 		$args ) . ' '
		                . $this -> attr -> get( 'value', 		$args ) . ' '
						. $this -> attr -> get( 'style', 		$args ) . ' '
		                . $this -> attr -> get( 'data-default', $args ) . ' '
		                . '/>';
		    }

		    //- TEXT -//
		    function text( $args )
		    {

		        return '<input type="text" '
		                . $this -> attr -> get( 'id', 			$args ) . ' '
		                . $this -> attr -> get( 'class', 		$args ) . ' '
		                . $this -> attr -> get( 'name', 		$args ) . ' '
		                . $this -> attr -> get( 'value', 		$args ) . ' '
						. $this -> attr -> get( 'style', 		$args ) . ' '
		                . $this -> attr -> get( 'data-default', $args ) . ' '
		                . '/>';
		    }

		    //- TEXTAREA -//
		    function textarea( $args )
		    {
		        return '<textarea '
		                . $this -> attr -> get( 'id', 			$args ) . ' '
		                . $this -> attr -> get( 'class', 		$args ) . ' '
		                . $this -> attr -> get( 'name', 		$args ) . ' '
						. $this -> attr -> get( 'style', 		$args ) . ' '
		                . $this -> attr -> get( 'data-default', $args ) . ' '
		                .'>'
		                . $this -> attr -> get( 'value', 		$args, true )
		                . '</textarea>';
		    }

		    //- SELECT -//
		    function select( $args )
		    {
		    	//- ACTION -//
		    	$actions = null;

	    		if( isset( $args[ 'actions' ] ) ){
	    			$actions = "onchange='javascript:gourmand_html.is_selected( this , " . json_encode( $args[ 'actions' ] ) . ");'";
		    		}

	    		if( isset( $args[ 'ajax' ] ) ){
	        		$actions = "onchange='javascript:" . $args[ 'ajax' ] . "'";
	        	}

		    	//- OPTGROUP / OPTIONS -//
		    	$value 		= $this -> attr -> get( 'value', $args, true );
		        $options 	= '';

		        if( isset( $args[ 'options' ] ) ){
		            foreach( $args[ 'options' ] as $domain => $options_ ){

		                if( is_array( $options_ ) ){
		                    $options .= '<optgroup ' . esc_attr( $domain ) . '>';

		                    foreach( $options_ as $v => $opt ){
		                        $options .= '<option value="' . esc_attr( $v ) . '" ' . selected( $value , $v , false ) . '>' . esc_html( $opt ) . '</option>';
		                    }

		                    $options .= '</optgroup>';
		                }
		                else{
		                    $v  	= $domain;
		                    $opt    = $options_;

		                    $options .= '<option value="' . esc_attr( $v ) . '" ' . selected( $value , $v , false ) . '>' . esc_html( $opt ) . '</option>';
		                }
		            }
		        }

		        //- INPUT -//
		        return '<select '
		                . $this -> attr -> get( 'id', 			$args ) . ' '
		                . $this -> attr -> get( 'class', 		$args ) . ' '
		                . $this -> attr -> get( 'name', 		$args ) . ' '
						. $this -> attr -> get( 'style', 		$args ) . ' '
		                . $this -> attr -> get( 'data-default', $args ) . ' '
		                . $actions
		                . '>'
		                . $options
		                . '</select>';
		    }

		    //- HIDDEN -//
		    function hidden( $args )
		    {
		    	return '<input type="hidden" '
		    			. $this -> attr -> get( 'id', 			$args ) . ' '
		                . $this -> attr -> get( 'class', 		$args ) . ' '
		                . $this -> attr -> get( 'name', 		$args ) . ' '
		                . $this -> attr -> get( 'value', 		$args ) . ' '
		                . $this -> attr -> get( 'data-default', $args ) . ' '
		                . '/>';
		    }

		    //- LOGIC -//
		    function logic( $args )
		    {
		    	//- ACTION -//
		        $action = isset( $args[ 'action' ] ) ? 'data-action="' . $args[ 'action' ] . '"' : null;

		    	$classes = 'mythemes-input-logic';

		        if( $this -> attr -> get( 'value', $args, true ) ){
		        	$classes .= ' is-on';
		        }
		        else{
		        	$classes .= ' is-off';
		        }

		        //- INPUT -//
		        return '<div class="' . esc_attr( $classes ) . '"'
		                . $action
		                . '>'

		                . '<span class="mythemes-state">'
		                . '</span>'

		                . $this -> hidden( $args )
		                . '</div>';
		    }

		    //- COLOR -//
		    function color( $args )
		    {
		    	$args = apply_filters( 'gourmand_html_attr__class', $args, 'mythemes-pickcolor' );

		        return '<input type="text" '
		            . $this -> attr -> get( 'id',					$args ) . ' '
		            . $this -> attr -> get( 'class', 				$args ) . ' '
		            . $this -> attr -> get( 'name', 				$args ) . ' '
		            . $this -> attr -> get( 'value', 				$args ) . ' '
		            . $this -> attr -> get( 'data-default-color', 	$args ) . ' '
		            . '/>';
		    }

		    //- UPLOAD -//
		    function upload( $args )
		    {
		        /*$callback = isset( $args[ 'callback' ] ) ? '"' . esc_attr( $args[ 'callback' ] ) . '"' : '"input"';
		        $js_args  = isset( $args[ 'args' ] ) ? json_encode( $args[ 'args' ], JSON_FORCE_OBJECT ) : json_encode( array( ), JSON_FORCE_OBJECT );
		        $function = 'javascript:gourmand_uploader.run( this, ' . $js_args . ', ' . $callback . ' );';*/

		        //- UPLOAD URL / FILE PATH -//
		        return '<input type="url" '
		            . $this -> attr -> get( 'id', 			$args ) . ' '
		            . $this -> attr -> get( 'class', 		$args ) . ' '
		            . $this -> attr -> get( 'name', 		$args ) . ' '
		            . $this -> attr -> get( 'value', 		$args ) . ' '
					. $this -> attr -> get( 'style', 		$args ) . ' '
		            . $this -> attr -> get( 'data-default', $args ) . ' '
		            . '>'

		            //- UPLOAD BUTTON -//
		            . '<input type="button" class="mythemes-button" '
		            . ' value="' . __( 'Choose File' , 'gourmand' ) . '"/>';
		    }

		    //- ICON SELECT -//
		    function icon_select( $args )
		    {
		    	$args 		= apply_filters( 'gourmand_html_attr__class', $args, 'mythemes-input-icon-select' );
		    	$value 		= $this -> attr -> get( 'value', $args, true );

		    	if( empty( $value ) ){
		    		$value 	= reset( $args[ 'options' ] );
		    	}

		    	$icon 		= '<i class="' . esc_attr( $value ) . '" data-value="' . esc_attr( $value ) . '"></i>';
		        $options 	= '';

		        if( isset( $args[ 'options' ] ) && !empty( $args[ 'options' ] ) ){
		            foreach( $args[ 'options' ] as $option ){

		                $action = isset( $args[ 'action' ] ) && isset( $args[ 'action' ][ $opt ] ) ? 'data-action="' . esc_attr( $args[ 'action' ][ $opt ] ) . '"' : null;

		                if( $value == $option ){
		                    $options .= '<div class="mythemes-icon-select-option selected">';
		                    $options .= '<i class="' . esc_attr( $option ) . '" data-value="' . esc_attr( $option ) . '" ' . $action . '></i>';
		                    $options .= '</div>';
		                }

		                else{
		                    $options .= '<div class="mythemes-icon-select-option">';
		                    $options .= '<i class="' . esc_attr( $option ) . '" data-value="' . esc_attr( $option ) . '" ' . $action . '></i>';
		                    $options .= '</div>';
		                }
		            }
		        }

		        //- INPUT -//
		        return '<div '
		            	. $this -> attr -> get( 'id', 			$args ) . ' '
						. $this -> attr -> get( 'style', 		$args ) . ' '
		            	. $this -> attr -> get( 'class', 		$args ) . '>'

		            	. '<input type="hidden" '
		            	. $this -> attr -> get( 'name', 		$args ) . ' '
		            	. $this -> attr -> get( 'value', 		$args ) . ' '
		                . $this -> attr -> get( 'data-default', $args ) . ' '
		                . '/>'

		            	. '<div class="mythemes-icon-select-value" onclick="javascript:gourmand_input_icon_select(this);">'
		            	. $icon
		            	. '</div>'

		            	. '<div class="mythemes-icon-select-options">'
		            	. '<div class="mythemes-icon-select-options-header">'

		            	. '<span class="mythemes-icon-search">'
		            	. '<input type="text" class="mythemes-icon-search-input"/>'
		            	. '</span>'

		            	. '<span class="mythemes-icon-options-cancel">'
		            	. '<a href="javascript:void(null);"><i class="mythemes-icon-cancel-circled-2"></i></a>'
		            	. '</span>'

		            	. '<span class="mythemes-icon-search-hint">'
		            	. sprintf( __( 'type icon name eg: %1$s' , 'gourmand' ), '<b>paper-plane</b>' )
		            	. '</span>'

		            	. '</div>'

		            	. '<div class="mythemes-icon-select-options-content">'
		            	. $options
		            	. '</div>'

		            	. '</div>'
		            	. '</div>';
		    }
		}
	}
?>
