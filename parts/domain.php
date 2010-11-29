<?php
if ($_SERVER['HTTP_HOST']=='tf.mit.edu')
{
	header("HTTP/1.1 301 Moved Permanently"); 
	header("Location: http://techfair.mit.edu".$_SERVER['REQUEST_URI']);
}
?>