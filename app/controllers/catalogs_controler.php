<?php
class CatalogsController extends AppController{
    //var $layout = "template";
    
	var $name = 'Catalogs';
    var $helpers = array("Html","Session");
    var $components = array("Session");
    
	    function beforeFilter(){
	        parent::beforeFilter();
	    }
    
    
       function index(){
       		$data = $this->User->find("all"); 
       		$this->set("data",$data);  
    	}
    
     
		function admin_Detail($id) {
		 $sql = "Select * From users , catalogs where users.catalogid = catalogs.idCatalogs and  users.id= " .$id;
		 $data = $this->User->query($sql);
         $this->set("data",$data); 	 
		 }
    
        
    	function edit($id){
	        if (!$id && empty($this->data)) {
	            $this->Session->setFlash('Invalid User');
	            $this->redirect("/admin/users");
	        }
	        
	        if (empty($this->data)) {
	                $level = array("1"=>"administrator","2"=>"Assistant");
	                $this->set("level",$level);
	                $this->data = $this->User->read(null, $id);
	        }
	        else{
	            $this->User->set($this->data);
	            if($this->User->validateUser()){
	                $this->User->save($this->data);
	                $this->Session->setFlash("You has been updated user with id =".$id);
	                $this->redirect("/admin/users"); 
	            }
	    }	
	
    }
	
	function admin_Detail1($id) {
			 if (!$id && empty($this->data)) {
	            $this->Session->setFlash('Invalid User');
	            $this->redirect("/admin/users");
	        }
			 if (empty($this->data)) {
	                $level = array("1"=>"administrator","2"=>"Assistant");
	                $this->set("level",$level);
	                $this->data = $this->User->read(null, $id);
	        }
			
			 else{
	            $this->User->set($this->data);
	            if($this->User->validateUser()){
	                $this->User->save($this->data);
	                $this->Session->setFlash("You has been updated user with id =".$id);
	                $this->redirect("/admin/users"); 
	            }
				}
	}
    
    /**
     * Them moi User
     */ 
    function admin_add() {
        if(!empty($this->data)){
          
          $this->User->set($this->data);
          if($this->User->validateUser()){
            $this->User->save($this->data);
            $this->Session->setFlash("You has been add new User !");
            $this->redirect("/admin/users");  
          }  
          
        }else{
          $this->render();
          
        }
    }
    
    /**
     * Xoa user
     */
    function admin_delete($user_id){
        if(isset($user_id) && is_numeric($user_id)){
            $data = $this->User->read(null,$id);
            if(!empty($data)){
                $this->User->delete($user_id);
                $this->Session->setFlash("Username has been deleted with id=".$user_id);
            }else{
                $this->Session->setFlash("Username is not avalible with id=".$user_id);
            }
        }else{

            $this->Session->setFlash("Username is not avalible with id=".$user_id);
        }
        $this->redirect("/admin/users");
    }
    
    /**
     * Dang nhap
     */    
    function login(){
        if ($this->Auth->user()) {
            $this->redirect($this->Auth->redirect());
        }
    }
    
    /**
     * Dang xuat
     */ 
    function logout(){
        $this->redirect($this->Auth->logout());
    }
}