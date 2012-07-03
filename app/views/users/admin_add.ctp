<?php echo $this->element("backend/navigate");?>
<?php echo $session->flash(); ?>  
<?php
    echo $form->create('User'); 
    echo "<fieldset>";  
    echo "<legend>Add new User</legend>";
    
    echo $form->input('username');
    
    echo $form->input('pass',array("type"=>"password"));
    
    echo $form->input('re_pass',array("type"=>"password"));
    
    echo $form->input('email');
    
    $op_gender = array('1'=>'Male','2'=>'Female');
    $att = array(
        "type"=>"radio",
        "options"=>$op_gender,
        "legend" => false,
        );
    echo $form->input("gender",$att);
    
    $options = array(""=>"Select Level","1"=>"Administrator","2"=>"Assistant");   
    echo $form->input("level",array("type"=>"select","options"=>$options));
    
    echo $form->end('Add new');
    echo "</fieldset>";
    
?>