<?php

Class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->database();

        $this->load->library("parser");
        $this->load->library("form_validation");

        $this->load->helper("url");
        $this->load->helper("form");
        $this->load->helper("text");
        
        $this->load->helper("Post_helper");
        $this->load->helper("Date_helper");

        $this->load->model("Post");
        $this->load->model("Category");
    }

    public function index() {
        $this->load->view('admin/test');
    }
    
    /*     * ***
     * CRUD PARA LOS POST
     */
    
    public function post_list() {
        $data["posts"] = $this->Post->findAll();
        $view["body"] = $this->load->view("admin/post/list", $data, TRUE);
        $view["title"] = "Posts";
        $this->parser->parse("admin/template/body", $view);
    }

    public function post_save($post_id = null) {
        
        if($post_id == null){
            //crear post
            $data['category_id'] = $data['title'] = $data['image'] = $data['content'] = $data['description'] = $data['posted'] = $data['url_clean'] = "";
            $view["title"] = "Crear Post"; 
        }else{
            //edicion post
            $post = $this->Post->find($post_id);
            $data['title'] = $post->title;
            $data['content'] = $post->content;
            $data['description'] = $post->description;
            $data['posted'] = $post->posted;
            $data['url_clean'] = $post->url_clean;
            $data['image'] = $post->image;
            $data['category_id'] = $post->category_id;
            $view["title"] = "Actualizar Post";
        }
        // para el listado de categorias
        $data['categories'] = categories_to_form($this->Category->findAll());
        
        if ($this->input->server("REQUEST_METHOD") == "POST") {

            $this->form_validation->set_rules('title', 'Titulo', 'required|min_length[10]|max_length[65]');
            $this->form_validation->set_rules('content', 'Contenido', 'required|min_length[10]');
            $this->form_validation->set_rules('description', 'DescripciÃ³n', 'max_length[100]');
            $this->form_validation->set_rules('posted', 'Publicado', 'required');
            
            $data['title'] = $this->input->post("title");
            $data['content'] = $this->input->post("content");
            $data['description'] = $this->input->post("description");
            $data['posted'] = $this->input->post("posted");
            $data['url_clean'] = $this->input->post("url_clean");
            
            if ($this->form_validation->run()) {
                // nuestro form es valido
                
                $url_clean = $this->input->post("url_clean");
                
                if($url_clean == ""){
                    $url_clean = clean_name($this->input->post("title"));
                }
                
                $save = array(
                    'title' => $this->input->post("title"),
                    'content' => $this->input->post("content"),
                    'description' => $this->input->post("description"),
                    'posted' => $this->input->post("posted"),
                    'category_id' => $this->input->post("category_id"),
                    'url_clean' => $url_clean
                );
                
                if($post_id == null)
                    $post_id = $this->Post->insert($save);
                else
                    $this->Post->update($post_id, $save);

                $this->upload($post_id, $this->input->post("title"));
            }
        }

        $data["data_posted"] = posted();
        $view["body"] = $this->load->view("admin/post/save", $data, TRUE);

        $this->parser->parse("admin/template/body", $view);
    }
    
    public function post_delete($post_id = null){
        
        if($post_id == null){
            echo 0;
        }else {
            $this->Post->delete($post_id);
            echo 1;
        }
        
    }
    
    /*     * ***
     * CRUD PARA LOS CATEGORY
     */

    public function category_list() {
        $data["categories"] = $this->Category->findAll();
        $view["body"] = $this->load->view("admin/category/list", $data, TRUE);
        $view["title"] = "Categories";
        $this->parser->parse("admin/template/body", $view);
    }

    public function category_save($category_id = null) {
        
        if($category_id == null){
            //crear category
            $data['name'] = $data['url_clean'] = "";
            $view["title"] = "Crear Categoria"; 
        }else{
            //edicion category
            $category = $this->Category->find($category_id);
            $data['name'] = $category->name;
            $data['url_clean'] = $category->url_clean;
            $view["title"] = "Actualizar Categoria";
        }
        
        if ($this->input->server("REQUEST_METHOD") == "POST") {

            $this->form_validation->set_rules('name', 'Nombre', 'required|min_length[10]|max_length[100]');
            
            $data['name'] = $this->input->post("name");
            $data['url_clean'] = $this->input->post("url_clean");
            
            if ($this->form_validation->run()) {
                // nuestro form es valido
                
                $url_clean = $this->input->post("url_clean");
                
                if($url_clean == ""){
                    $url_clean = clean_name($this->input->post("name"));
                }
                
                $save = array(
                    'name' => $this->input->post("name"),
                    'url_clean' => $url_clean
                );
                
                if($category_id == null)
                    $category_id = $this->Category->insert($save);
                else
                    $this->Category->update($category_id, $save);

            }
        }
        
        $view["body"] = $this->load->view("admin/category/save", $data, TRUE);

        $this->parser->parse("admin/template/body", $view);
    }
    
    public function category_delete($category_id = null){
        
        if($category_id == null){
            echo 0;
        }else {
            $this->Category->delete($category_id);
            echo 1;
        }
        
    }
    
    public function images_server(){
        $data["images"] = all_images();
        //var_dump($data);
        $this->load->view("admin/post/image", $data);
    }
    
    public function upload($post_id = null, $title = null) {

        $image = "upload";
        
        if($title != null)
            $title = clean_name($title);
        
        // configuraciones de carga
        $config['upload_path'] = 'uploads/post/';
        if($title != null)
            $config['file_name'] = $title;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 5000;
        $config['overwrite'] = TRUE;

        //Cargamos la libreria
        $this->load->library('upload', $config);

        if ($this->upload->do_upload($image)) {
            // se cargo la imagen
            // datos del upload
            $data = $this->upload->data();
            
            if($title != null && $post_id != null){
                $save = array(
                    'image' => $title. $data['file_ext']
                );
                $this->Post->update($post_id, $save);
            } else{
                $title = $data["file_name"];
                echo json_encode(array("fileName" => $title, "uploaded" => 1, "url" => "/" . PROJECT_FOLDER . "/uploads/post/" . $title ));
            }
            
            $this->resize_image($data['full_path']);
        }
    }
    
    function resize_image($path_image){
        $config['image_library'] = 'gd2';
	$config['source_image'] = $path_image;
	//$config['create_thumb'] = TRUE;
	$config['maintain_ratio'] = TRUE;
	$config['width'] = 500;
        $config['height'] = 500;
        
        $this->load->library('image_lib', $config);
        
        $this->image_lib->resize();
    }
    
}
