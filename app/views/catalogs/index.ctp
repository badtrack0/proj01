<html>
<head>

<!-- Call css and js from JS and CSS folder  -->
<link href="../css/tablecloth.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="../js/tablecloth.js"></script>
<!-- end -->

<?php 
echo $this->Html->css("tablecloth"); // link oi file tablecloth.css (app/webroot/css/tablecloth.css)
?>


</head>
<body>

<?php


//die(debug($data));  // Debug 
//Hien thi du lieu
if($data==NULL){
    echo "<h2>Dada Empty</h2>";
}
else{
    echo "
	

<div id='container'>	
	<div id='content'>
	
	<h2>Catalogs management  : Add/Edit/Delete Catalogs</h2>
	<a href='".$this->webroot."catalogs/add'><h1>Add New</h1></a>
	
	
	
			<table cellspacing='0' cellpadding='0'>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Description</th>
				<th>Status</th>
				<th>Status</th>
				<th>Deleted</th>
				<th>CreatedBy</th>
				<th>DateCreated</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>";
		
	
	foreach($data as $item){
        echo "<tr>";
        echo "<td>".$item['Catalog']['idCatalogs']."</td>";
		echo "<td>".$item['Catalog']['Name']."</td>";
		echo "<td>".$item['Catalog']['Description']."</td>";
		 
		 if($item['Catalog']['Status']==1){
			echo "<td>In use</td>";
        }
		else{
            echo "<td>Do not Use</td>";       
			}
		
		
		
		
		echo "<td>".$item['Catalog']['Deleted']."</td>";
		echo "<td>".$item['Catalog']['CreatedBy']."</td>";
		echo "<td>".$item['Catalog']['DateCreated']."</td>";
		

		echo "<td><a href='".$this->webroot."admin/users/Detail/".$item['Catalog']['idCatalogs']."' >Detail</a></td>";
        echo "<td><a href='".$this->webroot."admin/users/edit/".$item['Catalog']['idCatalogs']."' >Edit</a></td>";
        echo "<td><a href='".$this->webroot."admin/users/delete/".$item['Catalog']['idCatalogs']."' >Del</a></td>";
        echo "</tr> ";
		
    } 		
	echo "</table>";

    } 

echo "</div>";
echo "</div>";
?>
</body>
</html>