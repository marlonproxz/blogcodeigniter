<?php

Class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->helper("url");
        $this->load->helper("form");
        $this->load->helper("Post_helper");
    }

    public function index() {
        $this->load->view('admin/test');
    }
    
    public function post_list(){
        $this->load->view("admin/post/list");
    }
    
    public function post_save(){
        $data["data_posted"] = posted();
        $this->load->view("admin/post/save", $data);
    }

}
