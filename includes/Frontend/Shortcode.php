<?php

namespace CC\CRUD\Frontend;

/**
 * Shortcode Handler Class
 */
class Shortcode{
    
    /**
     * Initializes the class
     */
    function __construct() {
        add_shortcode( 'cc-curd', array( $this, 'render_shortcode')  );
    }

    /**
     * shortcode handler class
     *
     * @param array $atts
     * @param string $content
     * @return string
     */
    public function render_shortcode( $atts, $content = '') {
        return "Hello From Shortcode";
    }
}