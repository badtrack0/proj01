<html>
<head>

<!-- Call css and js from JS and CSS folder  -->
<link href="../css/tablecloth.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="../js/tablecloth.js"></script>
<!-- end -->

<?php 
//echo $this->Html->css("tablecloth"); // link oi file tablecloth.css (app/webroot/css/tablecloth.css)
?>


</head>
<body>

<?php
//Load navigate
echo $this->element("backend/navigate");

//Hien thi du lieu
if($data==NULL){
    echo "<h2>Dada Empty</h2>";
}
else{
    echo "
	

<div id='container'>	
	<div id='content'>
	
	<h2>Customer management </h2>
	
			<table cellspacing='0' cellpadding='0'>
			<tr>
				<th>UserID</th>
				<th>UserName</th>
				<th>Email</th>
				<th>Company</th>
				<th>Website</th>
				<th>Status</th>
				<th>Level</th>
				<th>Detail</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>";
		
	
	foreach($data as $item){
        echo "<tr>";
        echo "<td>".$item['User']['id']."</td>";
        echo "<td>".$item['User']['username']."</td>";
        echo "<td>".$item['User']['email']."</td>";
		echo "<td>".$item['User']['Company']."</td>";
		echo "<td>".$item['User']['Website']."</td>";
		echo "<td>Status</td>";
        if($item['User']['level']==1){
            $level = "Administrator";
        }else{
            $level = "Assistant";
        }
        echo "<td>".$level."</td>";
		echo "<td><a href='".$this->webroot."admin/users/Detail/".$item['User']['id']."' >Detail</a></td>";
        echo "<td><a href='".$this->webroot."admin/users/edit/".$item['User']['id']."' >Edit</a></td>";
        echo "<td><a href='".$this->webroot."admin/users/delete/".$item['User']['id']."' >Del</a></td>";
        echo "</tr> ";
		
    } 		
	echo "																				
		</table>
	<h2>Client Managerment</h2>
		<table>
          <tr>
            <td>User ID</td>
            <td>Username</td>
            <td>Email<td>
            <td>Level<td>
            <td><td>
          </tr>";
    foreach($data as $item){
        echo "<tr>";
        echo "<td>".$item['User']['id']."</td>";
        echo "<td>".$item['User']['username']."</td>";
        echo "<td>".$item['User']['email']."</td>";
        if($item['User']['level']==1){
            $level = "Administrator";
        }else{
            $level = "Assistant";
        }
        echo "<td>".$level."</td>";
        echo "<td><a href='".$this->webroot."admin/users/edit/".$item['User']['id']."' >Edit</a></td>";
        echo "<td><a href='".$this->webroot."admin/users/delete/".$item['User']['id']."' >Del</a></td>";
        echo "</tr> ";
		
    } 
}
echo "</div>";
echo "</div>";
?>
</body>
</html>