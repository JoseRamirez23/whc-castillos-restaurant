<?php

	/**
	 *	Function to build Contact Form 7
	 */

	// Contact Page Form
	function gourmand_wpcf7_contact_page()
	{
		$form_id = 0;

		if( !class_exists( 'WPCF7_ContactForm' )  )
			return 0;

		add_filter( 'wpcf7_contact_form_properties', function( $properties, $obj ){
			$properties[ 'form' ] = trim(sprintf(
				'<p>' . "\n" .
				'<label> %2$s %1$s' . "\n" .
				'[text* your-name] </label>' . "\n" .
				'</p>' . "\n\n" .

				'<p>' . "\n" .
				'<label> %3$s %1$s' . "\n" .
				'[email* your-email] </label>' . "\n" .
				'</p>' . "\n\n" .

				'<p>' . "\n" .
				'<label> %4$s' . "\n" .
				'[text your-subject] </label>' . "\n" .

				'<p>' . "\n" .
				'<label> %5$s' . "\n" .
				'[textarea your-message] </label>' . "\n" .
				'</p>' . "\n\n" .

				'<p>' . "\n" .
				'[submit \"%6$s\"]' . "\n" .
				'</p>',

				__( '(required)', 'gourmand' ),
				__( 'Your Name', 'gourmand' ),
				__( 'Your Email', 'gourmand' ),
				__( 'Subject', 'gourmand' ),
				__( 'Your Message', 'gourmand' ),
				__( 'Send Message', 'gourmand' )
			));

			$properties[ 'mail' ][ 'body' ] =

				sprintf( __( 'From: %1$s', 'gourmand' ), 		'[your-name] <[your-email]>' ) . "\n" .
				sprintf( __( 'Subject: %1$s', 'gourmand' ), 	'[your-subject]' ) . "\n\n" .

				__( 'Message Body:', 'gourmand' ) . "\n" .
				'[your-message]' . "\n\n" .

				'-- ' . "\n" .
				sprintf( __( 'This e-mail was sent from a contact form on %1$s (%2$s)', 'gourmand' ), get_bloginfo( 'name' ), esc_url( home_url() ) );

			return $properties;
		}, 10, 2 );

		$contact_form = WPCF7_ContactForm::get_template( array(
			'title' => __( 'Contact - Page', 'gourmand' )
		));

		$form_id = $contact_form -> save();

		WPCF7::update_option( 'bulk_validate', array(
			'timestamp'		=> current_time( 'timestamp' ),
			'version'		=> WPCF7_VERSION,
			'count_valid'	=> 1,
			'count_invalid' => 0,
		));

		return absint( $form_id );
	}

	// Book A Table / Reservation Section
	function gourmand_wpcf7_book_a_table()
	{
		$form_id = 0;

		if( !class_exists( 'WPCF7_ContactForm' )  )
			return 0;

		add_filter( 'wpcf7_contact_form_properties', function( $properties, $obj ){
			$properties[ 'form' ] = trim(sprintf(
				'<div class="reservation form-fields">' . "\n" .

				'<div class="row">' . "\n" .
				'<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">[text* your-name placeholder "%1$s"]</div>' . "\n" .
				'<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">[tel* your-phone placeholder "%2$s"]</div>' . "\n" .
				'</div>' . "\n\n" .

				'<div class="row">' . "\n" .
				'<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">[email* your-email placeholder "%3$s"]</div>' . "\n" .
				'<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">[number* nr-people placeholder "%4$s"]</div>' . "\n" .
				'</div>' . "\n\n" .

				'<div class="row">' . "\n" .
				'<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">[date* date placeholder "%5$s"]</div>' . "\n" .
				'<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">[select* time first_as_label "%6$s" "10:00 - am" "11:00 - am" "12:00 - am" "01:00 - pm" "02:00 - pm" "03:00 - pm" "04:00 - pm" "05:00 - pm" "06:00 - pm" "07:00 - pm" "08:00 - pm" "09:00 - pm" "10:00 - pm" "11:00 - pm" "12:00 - pm"]</div>' . "\n" .
				'</div>' . "\n\n" .

				'<div class="row">' . "\n" .
				'<div class="col-lg-12 submit-field">[submit "%7$s"]</div>' . "\n" .
				'</div>' . "\n" .
				'</div>',

				__( 'Your Name', 'gourmand' ),
				__( 'Phone Number', 'gourmand' ),
				__( 'E-Mail Address', 'gourmand' ),
				__( 'Number of People', 'gourmand' ),
				__( 'Reservation Date', 'gourmand' ),
				__( '- Reservation Time -', 'gourmand' ),
				__( 'Reserve Now', 'gourmand' )
			));

			$properties[ 'mail' ][ 'subject' ] 	= __( 'Gourmand Customer Reservation', 'gourmand' );

			$properties[ 'mail' ][ 'body' ] 	=

				__( 'Subject: Customer Reservation', 'gourmand' ) . "\n\n" .

				sprintf( __( 'From................: %1$s', 'gourmand' ), '[your-name] <[your-email]>' ) . "\n" .
				sprintf( __( 'Phone...............: %1$s', 'gourmand' ), '[your-phone]' ) . "\n\n" .

				__( 'Reservation Details.:', 'gourmand' ) . "\n" .
				sprintf( __( 'Number of Guests....: %1$s', 'gourmand' ), '[nr-people]' ) . "\n" .
				sprintf( __( 'Date................: %1$s', 'gourmand' ), '[date]' ) . "\n" .
				sprintf( __( 'Time................: %1$s', 'gourmand' ), '[time]' ) . "\n\n\n" .

				sprintf( __( 'This e-mail was sent from a contact form on %1$s (%2$s)', 'gourmand' ), get_bloginfo( 'name' ), esc_url( home_url() ) );

			return $properties;
		}, 10, 2 );

		$contact_form = WPCF7_ContactForm::get_template( array(
			'title' => __( 'Book a Table / Reservation - Section', 'gourmand' )
		));

		$form_id = $contact_form -> save();

		WPCF7::update_option( 'bulk_validate', array(
			'timestamp'		=> current_time( 'timestamp' ),
			'version'		=> WPCF7_VERSION,
			'count_valid'	=> 1,
			'count_invalid' => 0,
		));

		return absint( $form_id );
	}

	// Contact Section
	function gourmand_wpcf7_contact()
	{
		$form_id = 0;

		if( !class_exists( 'WPCF7_ContactForm' )  )
			return 0;

		add_filter( 'wpcf7_contact_form_properties', function( $properties, $obj ){
			$properties[ 'form' ] = trim(sprintf(
				'<div class="contact form-fields">' . "\n" .

				'<div class="row">' . "\n" .
				'<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">[text* your-name placeholder "%1$s"]</div>' . "\n" .
				'<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">[email* your-email placeholder "%2$s"]</div>' . "\n" .
				'</div>' . "\n\n" .

				'<div class="row">' . "\n" .
				'<div class="col-lg-12">[text your-subject placeholder "%3$s"]</div>' . "\n" .
				'</div>' . "\n\n" .

				'<div class="row">' . "\n" .
				'<div class="col-lg-12">[textarea your-message]</div>' . "\n" .
				'</div>' . "\n\n" .

				'<div class="row">' . "\n" .
				'<div class="col-lg-12 submit-field">[submit "%4$s"]</div>' . "\n" .
				'</div>' . "\n" .
				'</div>',

				__( 'Your Name', 'gourmand' ),
				__( 'E-Mail Address', 'gourmand' ),
				__( 'Subject', 'gourmand' ),
				__( 'Send Message', 'gourmand' )
			));

			return $properties;
		}, 10, 2 );

		$contact_form = WPCF7_ContactForm::get_template( array(
			'title' => __( 'Contact - Section', 'gourmand' )
		));

		$form_id = $contact_form -> save();

		WPCF7::update_option( 'bulk_validate', array(
			'timestamp'		=> current_time( 'timestamp' ),
			'version'		=> WPCF7_VERSION,
			'count_valid'	=> 1,
			'count_invalid' => 0,
		));

		return absint( $form_id );
	}
?>
