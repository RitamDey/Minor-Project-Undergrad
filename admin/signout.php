<html>
<title>Logged Out</title>

<style>
.alert {
    padding: 20px;
    background-color: GREEN;
    color: white;
	float: none !important;
	width: auto !important;
}


.closebtn {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
}

.closebtn:hover {
    color: black;
}
footer
{
padding: 1em;
color:white;
background-color:black;
clear:left;
text-align:center;
}
</style>
</head>

<?php
session_start();
session_destroy();
?>
<div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong>Logged out successfully</strong>
</div>
<?php
include("adminlogin.html");
?>