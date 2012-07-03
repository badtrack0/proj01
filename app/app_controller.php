<?php
App::import('Html',"html");
App::import('Form',"form");
App::import('Session',"session");

	class AppController extends Controller {
  
		  var $components = array('Auth');
		  
		  /**
		   * Thuc thi truoc khi goi cac controller con
		   */ 
		  function beforeFilter(){
		  	
		        //Security::setHash("md5");
		        $this->Auth->userModel = 'User';
		        $this->Auth->fields = array('username' => 'username', 'password' => 'password');
		        $this->Auth->loginAction = array('admin' => false, 'controller' => 'users', 'action' => 'login');
		        $this->Auth->loginRedirect = array('admin' =>true,'controller' => 'users', 'action' => 'index');
		        $this->Auth->loginError = 'Username / password combination.  Please try again';
		        $this->Auth->authorize = 'controller';
		        
		        $this->set("admin",$this->_isAdmin());
		        $this->set("logged_in",$this->_isLogin());
		        $this->set("users_userid",$this->_usersUserID());
		        $this->set("users_username",$this->_usersUsername());
		  }
		  
		  /**
		   * Xac nhan co phai la admin hay khong
		   */ 
		  function _isAdmin(){
		    $admin = FALSE;
		    if($this->Auth->user("level")==1)
		        $admin = TRUE;
		    return $admin; 
		  }
  
		  /**
		   * Kiem tra da login chua
		   */ 
		  function _isLogin(){
		    $login = FALSE;
		    if($this->Auth->user()){
		        $login = TRUE;
		    }
		    return $login;
		  }
  
		  /**
		   * Xac nhan userID
		   */ 
		  function _usersUserID(){
		    $users_userid = NULL;
		    if($this->Auth->user())
		        $users_userid = $this->Auth->user("id");
		    return $users_userid;
		  }
  
		  /**
		   * Xac nhan username
		   */ 
		  function _usersUsername(){
		    $users_username = NULL;
		    if($this->Auth->user())
		        $users_username = $this->Auth->user("username");
		    return $users_username;
		  }
  
		  /**
		   * Xac nhan co phai truy cap vao trang admin hay khong
		   */ 
		  function isAuthorized() {
		        if (isset($this->params['admin'])) {
		       
		            if ($this->Auth->user('level') != 1) {
		                $this->Auth->allow("index");
		                $this->redirect("/users");
		            }
		        }
		        return true;
		  }
}
?>