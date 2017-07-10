<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Rtftest extends CI_Controller {
 
        public function __construct() {
            parent::__construct();
            $this->load->model('article_model');
 
        }
        public function index()
    {
        $this->load->view('rtf_test');
    }
         
         
        public function addArticle(){
         $title =  $_POST['title'];
         $article = htmlentities( $_POST['article']);  
         $this->articleModel->addArticle($title, $article);
          
        }
         
        public function loadArticle(){
           $this->articleModel->loadArticle(); 
        }
}
 
/* End of file welcome.php */
/* Location: ./application/controllers/Home.php */