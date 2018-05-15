<!DOCTYPE html>
<html lang="en">
    <head>
       <title>PhpDateTimeAgo</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    </style>
    <body>
    <h1>Demo
    </h1>
<?php
require('DateTimeAgo.php'); //required class file			
			$req=new DateTimeAgo;
             $time='1336492705';//Timestamp for example
             $lang='english';//Language for example
			
			
			?>
			<?php highlight_string('<?php require(\'DateTimeAgo.php\'); //required class file			
			$req=new DateTimeAgo;
             $time=\'1336492705\';//Timestamp for example
             $lang=\'english\';//Language for example
			echo $req->__convert($time,$lang); ?>'); 
			echo 'output : '. $req->__convert($time,$lang);
			?>
			
			</body>
</html>
