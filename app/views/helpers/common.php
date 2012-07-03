<?php
class CommonHelper extends HtmlHelper {

// Hàm tạo menu
function create_menu(){
    $menu  = "<ul>";
    $menu .= "<li>".$this->link("Menu 1",array("controller"=>"templates","action"=>"view",1))."</li>";
    $menu .= "<li>".$this->link("Menu 2",array("controller"=>"templates","action"=>"view",2))."</li>";
    $menu .= "<li>".$this->link("Menu 3",array("controller"=>"templates","action"=>"view",3))."</li>";   
    $menu .= "</ul>";
    return $menu;
  }
  
//Hàm tạo các thành phần cho header và footer
  function general(){
    $data = array(
                    "header" => "Headline",	//Header info
                    "footer" => "Copyright 2012 © | Test layout",
                );
    return $data;
    }
}
?>