<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title_for_layout;?></title>
<?php echo $this->Html->css("template"); // link oi file style.css (app/webroot/css/style.css)?> 
<?php $general = $this->Common->general(); // Lấy các giá trị của thành phần tĩnh : header,footer ?>
</head>
<body>
<div id="top">
    <center><h2><?php echo $general['header']; ?></h2></center>
</div>
<div id="main">
    <div id="menu">
        <?php echo $this->Common->create_menu(); // goi ham tao menu tu common helper?>
    </div>
    <div id="content">
        <h1><?php echo $content; // Thành phần động ?></h1>
    </div>
</div>
<div id="footer">
    <center><?php echo $general['footer'];?></center>
</div>

</body>
</html>