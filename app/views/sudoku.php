<!DOCTYPE html>

<html lang="pl">
<head>
	<meta charset="utf-8">

	<title>Sudoku Solver</title>
	<meta name="description" content="The soudku solver online">
	<meta name="author" content="Łukasz Walter">
	
	<style>
		.pole {
			width: 50px;
			height: 50px;
			font-size: 35px;
			text-align: center;
			padding: 2px;
		}
		
		input[id*="_9"], input[id*="_3"], input[id*="_6"] {
			border-right: 3px solid #000;
		}
		
		input[id*="9_"], input[id*="3_"], input[id*="6_"] {
			border-bottom: 3px solid #000;
		}
		
		input[id*="_1"] {
			border-left: 3px solid #000;
		}
		
		input[id*="1_"] {
			border-top: 3px solid #000;
		}
		
		.submit {
			margin-top: 15px;
			width: 200px;
			height: 40px;
			backgroud-color: #1b8f2b;
		}
		
	
	</style>

	<!--[if lt IE 9]>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
	<![endif]-->
</head>

<body>

<div class="container">
	<div class="sudoku">
		<form action="solver/solve" method="post">
		<?php 
		for ($i = 1; $i <= 9; $i++)
		{
			for ($j = 1; $j <= 9; $j++)
			{
				echo '<input class="pole" name="'.$i.'_'.$j.'" id="'.$i.'_'.$j.'" type="text">';
			}
			echo "<br />";
		}
		?>
		<input class="submit" type="submit" type="submit" value="Rozwiąż sudoku">
		</form>
		
	</div>
</div>

</body>
</html>
