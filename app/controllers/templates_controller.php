<?php

class TemplatesController extends AppController {
    var $layout = "template"; // load file chứa nội dung layout : views/layouts/template.ctp
    var $helpers = array("Html","Common"); // Thành phần Helper Common được gọi để tạo menu,header,footer trong view
	//var $name = "Users";
    
    function  index(){
        $this->set('title_for_layout', 'Headline'); //Header text
        $this->set("content","Test home content default");	// Default content
		
		
    }
    
    function view($id){
        switch($id){
            case 1 :{ 
                $content = $this->User->find("all");
				$this->set('title_for_layout', 'title 1');
                $this->set("content", $content); 
				//$data = $this->User->find("all"); 
				//$this->set("content",$data); 
				// $content =
				// $this->set("content",$data); 
				// $data = $this->Users->index; // dữ liệu sau khi chuyển đổi không dấ

            }
            break;
            case 2 :{
                $this->set('title_for_layout', 'title 2');
                $this->set("content","Content for menu2");
            }
            break;
            case 3 :{
                $this->set('title_for_layout', 'title 3');
                $this->set("content","Content for menu3");
            }
            break;
            default :
                $this->set("content","Framwork");
            break;
        }
    }
    
    
}
?>