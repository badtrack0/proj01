<?php
class User extends AppModel{
    var $name = "User";
    
    //------- Valid add new User
    function validateUser(){
        $this->validate = array(
                                "username"=>array(
                                                    "rule1" =>array(
                                                                    "rule" => "notEmpty",
                                                                    "message" => "Username can not empty",
                                                                    ),
                                                    "rule2" => array(
                                                                    "rule" => "/^[a-z0-9_.]{4,}$/i",
                                                                    "message" => "Username must be alpha & integer",
                                                                    ),
                                                    "rule3" =>array(
                                                                    "rule" => "checkUsername", // call function check Username
                                                                    "message" => "Username has been registered",
                                                                    ),
                                                ),
                                "gender" => array(
                                                    "rule" => "notEmpty",

                                                    "message" => "Please choise your gender",
                                                ),
                                "pass"=>array(
                                                    "rule" => "notEmpty",
                                                    "message" => "Password can not empty",
                                                    "on" => "create"
                                                ),
                                "re_pass"=>array(
                                                    "rule1"=>array(
                                                                      "rule" => "notEmpty",
                                                                      "message" => "Password comfirm can not empty",
                                                                      "on" => "create"  
                                                                    ),
                                                    "match" => array( 
                                                                      "rule" => "ComparePass", // call function compare password
                                                                      "message" => "Password comfirm are not match",
                                                                    ),
                                                ),
                                "level"=>array(
                                                    "rule" => "notEmpty",
                                                    "message" => "Please select level",
                                                    
                                                ),                
                                "email"=>array(
                                                    "rule" => "email",
                                                    "message" => "Email is not avalible",
                                                ),
                            );
        if($this->validates($this->validate)) 
        return TRUE; 
       else 
        return FALSE;
    }
    
    //--------- Compare Pass
    function ComparePass(){
        if($this->data['User']['pass']!=$this->data['User']['re_pass']){
            return FALSE;
        }
        else{
            return TRUE;
        }
    }
    
    //-------- Check Useranme
    function checkUsername(){
        if(isset($this->data[$this->name]['id'])){
            $where = array(
                            "id !=" => $this->data[$this->name]['id'],
                            "username" => $this->data[$this->name]['username'],
                            ); 
                 
        }
        else{
            $where = array(
                            "username" => $this->data[$this->name]['username'],
                            );  
        } 
        $this->find($where);
        $count = $this->getNumRows();
        if($count!=0){
            return false;
        }
        else{
            return true;
        }
    }
    
    //--- HashPassword
    function hashPassword($data){
        if(isset($this->data['User']['pass'])){
            $this->data['User']['password'] = Security::hash($this->data['User']['pass'],NULL,TRUE);
            return $data;
        }
        return $data;
    }
    //----- beforeSave
    function beforeSave(){
        $this->hashPassword(NULL,TRUE);
        return TRUE;
    } 
    
      
}