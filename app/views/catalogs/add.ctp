<?php echo $session->flash(); ?>  
<?php
    echo $form->create('Catalog'); 
  //  echo "<fieldset>";  
    echo "<h2>Add new Catalog</h2>";
    
    echo $form->input('Name');
      
    echo $form->input('Description');
    
    echo $form->end('Add new');
  //  echo "</fieldset>";
    
?>