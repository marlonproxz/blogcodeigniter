<?php

Class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->library("parser");
        $this->load->helper("url");
        $this->load->helper("form");
        $this->load->helper("Post_helper");
    }

    public function index() {
        $this->load->view('admin/test');
    }
    
    public function post_list(){
        $view["body"] = $this->load->view("admin/post/list", NULL, TRUE);
        $view["title"] = "Posts";
        $this->parser->parse("admin/template/body", $view);
    }
    
    public function post_save(){
        $data["data_posted"] = posted();
        $view["body"] = $this->load->view("admin/post/save", $data, TRUE);
        $view["title"] = "Crear Post";
        
        $this->parser->parse("admin/template/body", $view);
    }

}
