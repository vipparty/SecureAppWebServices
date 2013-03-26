<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class tasks extends MX_Controller {

    const TAG = 'tasks';
    
    function __construct()
    {
        parent::__construct();
    }
    
    function index() {

        Modules::run('log/to_apache', self::TAG, "index");
        
        $this->load->model('mdl_tasks');
        $data['query'] = $this->mdl_tasks->get('priority');

        //$this->load->view('tasks_view', $data);

        $data['module'] = "tasks";
        $data['view_file'] = "tasks_view";
        echo Modules::run('template/one_col', $data);
    }

    function create() 
    {
        Modules::run('log/to_apache', self::TAG,"create");
               
        $update_id = $this->uri->segment(3);
        
        // If user clickd EDIT
        if(!isset($update_id)){
            Modules::run('log/to_apache', self::TAG,"update_id is not set, but got it from hidden variable");
                       
            $update_id = $this->input->post('update_id', TRUE);
        }        
        
        if(is_numeric($update_id)){
                 
            Modules::run('log/to_apache', self::TAG,"update_id is numeric");
            $data = $this->get_data_from_db($update_id);

        } 
        else 
        {
           Modules::run('log/to_apache', self::TAG,"update_id is not numeric");
           $data = $this->get_data_from_post();
        }
        
        $data['module'] = "tasks";

        $data['view_file'] = "form";

        echo Modules::run('template/one_col', $data);
    }

    function get_data_from_post() 
    {
        $data['title'] = $this->input->post('title', TRUE);
        $data['priority'] = $this->input->post('priority', TRUE);

        Modules::run('log/to_apache', self::TAG,"got data from post = ".$data['title'].
                    ",".$data['priority']);
                
        return $data;
    }

    function get_data_from_db($update_id)
    {        
        $query = $this->get_where($update_id);
        foreach ($query->result() as $row) {
            $data['title'] = $row->title;
            $data['priority'] = $row->priority;
        }
       
                            
        Modules::run('log/to_apache', self::TAG,"got data from db = ".$data['title'].
                     ",".$data['priority']);
        
        return $data;
    }
    
    
    function submit() {
        
        Modules::run('log/to_apache', self::TAG,"submit");
        
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title', 'Title', 'required|min_length[3]|xss_clean');

        $this->form_validation->set_rules('priority', 'Priority', 'required|numeric|xss_clean|max_length[2]');

        $update_id = $this->input->post('update_id', TRUE);       
        
        if ($this->form_validation->run() == FALSE) 
        {
            $this->create();
        } 
        else 
        {       
            $data = $this->get_data_from_post();
            
            if(isset($update_id))
            {
                $this->_update($update_id, $data);
            }
            else
            {
                $this->_insert($data);
            } 
            redirect('tasks');
       }
    }

        //Database functons:
        
        function get($order_by) {
                   
           Modules::run('log/to_apache', self::TAG, "db get: orderby = $order_by");
           
            $this->load->model('mdl_tasks');
            $query = $this->mdl_tasks->get($order_by);
            return $query;
        }

        function get_with_limit($limit, $offset, $order_by) {
            
             Modules::run('log/to_apache', self::TAG, "db get_with_limit: limit = $limit".
                        "offset = $offset, order_by = $order_by");
            
            $this->load->model('mdl_tasks');
            $query = $this->mdl_tasks->get_with_limit($limit, $offset, $order_by);
            return $query;
        }

        function get_where($id) {
            
            Modules::run('log/to_apache', self::TAG,"db get_where: id = $id");
                        
            $this->load->model('mdl_tasks');
            $query = $this->mdl_tasks->get_where($id);
            return $query;
        }

        function get_where_custom($col, $value) {
            
            Modules::run('log/to_apache', self::TAG,"db get_where_custom: col = $col, value = $value");
            
            $this->load->model('mdl_tasks');
            $query = $this->mdl_tasks->get_where_custom($col, $value);
            return $query;
        }

        function _insert($data) {
            
            Modules::run('log/to_apache', self::TAG,"db _insert: data = $data");
            
            $this->load->model('mdl_tasks');
            $this->mdl_tasks->_insert($data);
        }

        function _update($id, $data) {

            Modules::run('log/to_apache', self::TAG,"db _update: id = $id, data = $data");
                        
            $this->load->model('mdl_tasks');
            $this->mdl_tasks->_update($id, $data);
        }

        function _delete($id) {
            
            Modules::run('log/to_apache', self::TAG,"db _delete: id = $id");
            
            $this->load->model('mdl_tasks');
            $this->mdl_tasks->_delete($id);
        }

        function count_where($column, $value) {
            
            Modules::run('log/to_apache', self::TAG,"db count_where: column = $column, value = $value");
            
            $this->load->model('mdl_tasks');
            $count = $this->mdl_tasks->count_where($column, $value);
            return $count;
        }

        function get_max() {
            
             Modules::run('log/to_apache', self::TAG,"db get_max:");            
            
            $this->load->model('mdl_tasks');
            $max_id = $this->mdl_tasks->get_max();
            return $max_id;
        }

        function _custom_query($mysql_query) {
            
            Modules::run('log/to_apache', self::TAG,"db _custom_query: mysql_query = $mysql_query");  
            
            $this->load->model('mdl_tasks');
            $query = $this->mdl_tasks->_custom_query($mysql_query);
            return $query;
        }


}