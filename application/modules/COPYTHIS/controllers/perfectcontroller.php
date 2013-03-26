<?php if (!defined('BASEPATH'))   exit('No direct script access allowed');


class Perfectcontroller extends MX_Controller {

    const TAG = 'Perfectcontroller';
    
    function __construct() {
        parent::__construct();
    }

    function get($order_by) {
        Modules::run('log/to_apache', self::TAG,"db get: orderby = $order_by");
        $this->load->model('mdl_perfectcontroller');
        $query = $this->mdl_perfectcontroller->get($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by) {
        Modules::run('log/to_apache', self::TAG, "db get_with_limit: limit = $limit".
                        "offset = $offset, order_by = $order_by");
        $this->load->model('mdl_perfectcontroller');
        $query = $this->mdl_perfectcontroller->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id) {
        Modules::run('log/to_apache', self::TAG, "db get_where: id = $id");
        $this->load->model('mdl_perfectcontroller');
        $query = $this->mdl_perfectcontroller->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value) {
        Modules::run('log/to_apache', self::TAG, "db get_where_custom: col = $col, value = $value");
        $this->load->model('mdl_perfectcontroller');
        $query = $this->mdl_perfectcontroller->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data) {
        Modules::run('log/to_apache', self::TAG, "db _insert: data = $data");
        $this->load->model('mdl_perfectcontroller');
        $this->mdl_perfectcontroller->_insert($data);
    }

    function _update($id, $data) {
        Modules::run('log/to_apache', self::TAG, "db _update: id = $id, data = $data");
        $this->load->model('mdl_perfectcontroller');
        $this->mdl_perfectcontroller->_update($id, $data);
    }

    function _delete($id) {
        Modules::run('log/to_apache', self::TAG, "db _delete: id = $id");
        $this->load->model('mdl_perfectcontroller');
        $this->mdl_perfectcontroller->_delete($id);
    }

    function count_where($column, $value) {
        Modules::run('log/to_apache', self::TAG, "db count_where: column = $column, value = $value");
        $this->load->model('mdl_perfectcontroller');
        $count = $this->mdl_perfectcontroller->count_where($column, $value);
        return $count;
    }

    function get_max() {
        Modules::run('log/to_apache', self::TAG, "db get_max:"); 
        $this->load->model('mdl_perfectcontroller');
        $max_id = $this->mdl_perfectcontroller->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query) {
        Modules::run('log/to_apache', self::TAG, "db _custom_query: mysql_query = $mysql_query");
        $this->load->model('mdl_perfectcontroller');
        $query = $this->mdl_perfectcontroller->_custom_query($mysql_query);
        return $query;
    }

}