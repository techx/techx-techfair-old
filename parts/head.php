<?php
function make_head($title)
{
?>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
	<title><?php echo $title?></title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,400,300,600' rel='stylesheet' type='text/css'>
    
	<link type="text/css" href="/css/style.css" rel="stylesheet" />
	<!--[if IE]>
	<style type="text.css">
		.clearfix {
			zoom: 1;
		}
	</style>
	<![endif]-->
	<!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>-->
	<script type="text/javascript" src="/js/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="/js/jquery-ui-1.8.6.custom.min.js"></script>


  <!-- tipsy tooltips -->
  <link rel="stylesheet" href="/css/tipsy.css" type="text/css" />
  <script type="text/javascript" src="/css/jquery.tipsy.js"></script>
  
<?php
}
?>