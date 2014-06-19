<?php	
	include_once './model/defines.php';
	echo DOCTYPE;

	require_class('view.class.php');
	$view=new View();	
?>

<html>
	<head>
		<?php 
			$view->headers();
		?>
	</head>
	<body>
		<?php 
			$view->body();
		?>
		
	</body>
</html>