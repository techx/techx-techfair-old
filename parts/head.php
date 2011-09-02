<?php
function make_head($title)
{
?>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
	<title><?php echo $title?></title>
	<link type="text/css" href="/css/style.css" rel="stylesheet" media="screen" />
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
	<script type="text/javascript" src="/js/cufon-yui.js"></script>
	<script type="text/javascript" src="/js/Helvetica.font.js"></script>
	<script type="text/javascript">
		Cufon.replace('#navbar a, #content h1, h2, h3, h4, label, .success, button');
	</script>
	<script type="text/javascript" src="/js/script.js"></script>


  <!-- tipsy tooltips -->
  <link rel="stylesheet" href="/css/tipsy.css" type="text/css" />
  <script type="text/javascript" src="/css/jquery.tipsy.js"></script>
  
  <script type="text/javascript">
     $('#tooltip').tipsy();
  </script>
  
<?php
}
?>