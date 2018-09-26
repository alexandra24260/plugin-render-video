<?php
	/**
	 * @package Render Video
	 * @version 1.0
	 */
	/*
	Plugin Name: Render Video
	Description: Render Video
	Author: Alexandra Vecher
	*/
	define( "VIMEO_LINK", 'https://player.vimeo.com/video/' );
	define( "YOUTUBE_LINK", 'https://www.youtube.com/embed/' );
	define( "PROVIDER_VIMEO", 'vimeo' );
	define( "PROVIDER_YOUTUBE", 'youtube' );

	function completeLink( $resource, $identifier ) {

		return '<iframe src="' . $resource . $identifier
		       . '"height="240" width="320" allowfullscreen=""></iframe>';

	}

	function render_video_shortcode( $atts ) {

		$data_video = shortcode_atts( [
			'identifier' => '',
			'resource'   => '',
		], $atts );

		$identifier = $data_video['identifier'];
		$resource   = $data_video['resource'];
		switch ( $resource ) {
			case PROVIDER_VIMEO:
				$resource = VIMEO_LINK;
				break;

			case PROVIDER_YOUTUBE:
				$resource = YOUTUBE_LINK;
				break;

		}

		return completeLink( $resource, $identifier );

	}

	add_shortcode( 'render-video', 'render_video_shortcode' );


