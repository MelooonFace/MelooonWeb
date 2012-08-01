<html>

	<head>
	
		<title><?php echo $header; ?></title>
		<style type="text/css">
			
			body {
				font-family: sans-serif, arial;
				font-size: 13px;
				color: #222;
			}
			
			.clear {
				clear: both;
			}
			
			.container {
				width: 800px;
				margin-left: auto;
				margin-right: auto;
				margin-top: 32px;
				border: 1px solid #c4c4c4;
				box-shadow: 0px 2px 10px rgba(0,0,0,0.2);
				padding: 32px;
				border-radius: 3px;
				-webkit-border-radius: 3px;
				-moz-border-radius: 3px;
			}
			
			h1 {
				color: #313131;
				font-size: 25px;
				opacity: 0.7;
			}
			
			p.block {
				border: 1px solid #dbdbdb;
				margin: 16px 10px;
				padding: 7px 14px;
				float: left;
				font-family: Courier, "Courier New";
				font-size: 12px;
				margin-top: 0px;
				font-style: italic;
				color: #6e6e6e;
				transition: box-shadow 1s;
			}
			
			p.block:hover {
				box-shadow: 0px 2px 10px rgba(0,48,255,0.2);
			}
			
			p {
				line-height: 1.5;
			}
			
		</style>
	
	</head>
	<body>
	
		<div class="container">
			
			<h1><?php echo $header; ?></h1>
			
			<p><?php echo $message; ?></p>
			
		</div>
	
	</body>
	
</html>