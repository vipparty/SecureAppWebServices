<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Log extends MX_Controller {

    
    
    
    function __construct() {
        parent::__construct();
    }

    
    
    function to_apache($tag, $statement){
        
        file_put_contents('php://stderr', print_r("$tag: $statement\n", TRUE));
    }
    
    
    // Database functions
    
    function get($order_by) {
        $this->log( "db get: orderby = $order_by");
        $this->load->model('mdl_perfectcontroller');
        $query = $this->mdl_perfectcontroller->get($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by) {
        $this->log( "db get_with_limit: limit = $limit".
                        "offset = $offset, order_by = $order_by");
        $this->load->model('mdl_perfectcontroller');
        $query = $this->mdl_perfectcontroller->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id) {
        $this->log("db get_where: id = $id");
        $this->load->model('mdl_perfectcontroller');
        $query = $this->mdl_perfectcontroller->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value) {
        $this->log("db get_where_custom: col = $col, value = $value");
        $this->load->model('mdl_perfectcontroller');
        $query = $this->mdl_perfectcontroller->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data) {
        $this->log("db _insert: data = $data");
        $this->load->model('mdl_perfectcontroller');
        $this->mdl_perfectcontroller->_insert($data);
    }

    function _update($id, $data) {
        $this->log("db _update: id = $id, data = $data");
        $this->load->model('mdl_perfectcontroller');
        $this->mdl_perfectcontroller->_update($id, $data);
    }

    function _delete($id) {
        $this->log("db _delete: id = $id");
        $this->load->model('mdl_perfectcontroller');
        $this->mdl_perfectcontroller->_delete($id);
    }

    function count_where($column, $value) {
        $this->log("db count_where: column = $column, value = $value");
        $this->load->model('mdl_perfectcontroller');
        $count = $this->mdl_perfectcontroller->count_where($column, $value);
        return $count;
    }

    function get_max() {
        $this->log("db get_max:"); 
        $this->load->model('mdl_perfectcontroller');
        $max_id = $this->mdl_perfectcontroller->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query) {
        $this->log("db _custom_query: mysql_query = $mysql_query");
        $this->load->model('mdl_perfectcontroller');
        $query = $this->mdl_perfectcontroller->_custom_query($mysql_query);
        return $query;
    }

}