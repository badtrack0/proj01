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
echo $this->Html->css("tablecloth"); // link oi file tablecloth.css (app/webroot/css/tablecloth.css)
?>
<?php echo $session->flash(); ?>  
<?php
//die(debug($data)); 

if($data==NULL){
    echo "<h2>Dada Empty</h2>";
}
else{
    echo "
	 
		<div id='container'>	
			<div id='content'>
	
		<h2>Customer Detail Infomations :  ".$data[0]['users']['username']."</h2>
	
			<table cellspacing='0' cellpadding='0'>
			<tr>
				<th>Type</th>
				<th>Infomations</th>				
			</tr>
				<td>Name </td>
				<td> ".$data[0]['users']['username']."</td>
			<tr>
			</tr>
				<td>Email </td>
				<td> ".$data[0]['users']['Company']."</td>
			<tr>
			</tr>
				<td>Telephone</td>
				<td> ".$data[0]['users']['Telephone']."</td>
			<tr>
			</tr>
				<td>Address</td>
				<td> ".$data[0]['users']['Address']."</td>
			
			</tr>
				<td>Catalog</td>
				<td> ".$data[0]['catalogs']['Name']."</td>
			<tr>
			</tr>
				<td>Catalog info</td>
				<td> ".$data[0]['catalogs']['Description']."</td>
			<tr>
			<tr>";
			
        
       
	echo "</div>";
	echo "</div>";
}
?>
</body>
</html>