<?php
function make_head($title)
{
?>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
	<title><?php echo $title?></title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,400,300,600' rel='stylesheet' type='text/css'>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVA4WxYlg7xLQh_Yfnj2PDqK4LI1S_y6g&sensor=false"></script>
    <link href="/css/typicons_kit/css/typicons.css" rel="stylesheet" />
    
	<link href="/css/style.css" rel="stylesheet" />
	<!--[if IE]>
	<style type="text.css">
		.clearfix {
			zoom: 1;
		}
	</style>
	<![endif]-->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="/js/jquery-ui-1.8.6.custom.min.js"></script>
	<script src="/js/jquery.sticky.js"></script>
	<script src="/js/script.js"></script>

  <!-- tipsy tooltips -->
  <link rel="stylesheet" href="/css/tipsy.css" />
  <script src="/css/jquery.tipsy.js"></script>

  <!-- lightbox -->
  <link rel="stylesheet" href="/css/lightbox.css" />
  
<?php
}
?>
