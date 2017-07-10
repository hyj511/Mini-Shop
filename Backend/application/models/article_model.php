<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Article_model extends CI_Model {
     
    public function addArticle($title, $article){
         
        $date = date('d/m/y');
        $Addtitle = $title;
        $Addarticle = $article;
         
        $data = array('title'=> $Addtitle,
            'content'=>$Addarticle,
            'created'=>$date
            );
            $this->db->insert('tinymce', $data);
    }
     
    public function loadArticle(){
        $this->db->order_by("id","desc");
        $query =  $this->db->get('tinymce');
         
        foreach ($query->result() as $row){
            $date = date_create($row->created);
            $date = date_format($date, 'l jS F Y');
            echo'<blockquote><h3>'.ucfirst($row->title).'</h3></blockquote><p>'.html_entity_decode($row->content).'</p><a href="#" class="btn btn-sm btn-warning">'.$date.'</a><hr/>';
        }
        exit;
    }
     
}