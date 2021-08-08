<?php

namespace App\Libraries;

class Template {
	protected $_ci;

		function views($template = NULL, $data = NULL) {
			if ($template != NULL) {
				// head
				$data['_meta'] 					= view('_layout/_meta', $data);
				$data['_css'] 					= view('_layout/_css', $data);
				
				// Header
				// $data['_nav'] 				= view('_layout/_nav', $data);
				$data['_header'] 				= view('_layout/_header', $data);
				
				//Sidebar
				$data['_sidebar'] 				= view('_layout/_sidebar', $data);
				
				//Content
				$data['_headerContent'] 		= view('_layout/_headerContent', $data);
				$data['_mainContent'] 			= view($template, $data);
				$data['_content'] 				= view('_layout/_content', $data);
				
				//Footer
				$data['_footer'] 				= view('_layout/_footer', $data);
				//Control sidebar
				$data['_control_sidebar'] 		= view('_layout/_control_sidebar', $data);
				$data['_sidebar'] 				= view('_layout/_sidebar', $data);
				
				//JS
				$data['_js'] 					= view('_layout/_js', $data);

				echo $data['_template'] 		= view('_layout/_template', $data);
			}
		}
	}
	?>