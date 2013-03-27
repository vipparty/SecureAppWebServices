<?php if (!defined('BASEPATH'))   exit('No direct script access allowed');


class Twitter_bootstrap extends MX_Controller {

    const TAG = 'Twitter_bootstrap';
    
    function __construct() {
        parent::__construct();
    }

   
        function index() {

        
        echo hello;
    }
    
    function get_css_url($filename){
        
        $data['filename'] = $filename;
        
        $this->load->view('get_css_url', $data);
    }
    
    
    function get_js_url($filename){
        
        $data['filename'] = $filename;
        
        $this->load->view('get_js_url', $data);
        
        
    }
    
    function get_img_url($filename){
        
        $data['filename'] = $filename;
        
        $this->load->view('get_img_url', $data);
        
    }
    

}