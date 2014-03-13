<html>
<head>
	  <link rel = "stylesheet" type = "text/css" href = "css/colorStyles.css">
	  <title> PHP Colors </title>
</head>
<body>
 <?php 
	include 'generateForm.php';
	include 'isPrime.php';
	$attributes = array();
	if(array_key_exists('num',$_GET))
	{
		//check that the user has entered a number of at least 1 character
		$firstLength = strlen($_GET['num']);
		//if name ok, carry out tasks
		if($firstLength > 0)
		{
			$numInput = $_GET['num'];
			$remainder = $numInput % 2 ;
			if ($remainder == 0)
			{
				$attributes['even']  = true ;
				$attributes['odd']  = false ;
			}
			else
			{
				$attributes['odd']  = true ;
				$attributes['even']  = false ;
			}
				
			if(strrev($numInput)==$numInput)
				$attributes['palindrome']  = true ;
			else
				$attributes['palindrome']  = false ;
				
			if(isPrime($numInput))
				$attributes['prime']  = true;
			else
				$attributes['prime']  = false;
				
			if(($attributes['palindrome']) &&  ($attributes['prime']))
			{
				$attributes['PalindromePrime']  = true;
				$attributes['palindrome']=false;
				$attributes['prime']=false;
			}
			else
				$attributes['PalindromePrime']  = false;
			
			
			$i=1;
			$atts=0;
			foreach($attributes as $key => $value)
			{
				if($value)
				{
					$atts++;
					
				}
			}
			echo "The number ".$numInput." is ";
			foreach($attributes as $key => $value) 
			{
				if($value)
				{
					echo $key;
					if ((count($attributes)>1) && $i<($atts))
						echo " and ";	
					$i++;
				}
			}
		}
		else
		{
			echo'<span style = "color:red">*Please Enter a Number.</span>';
			generateForm();
		}
	}
	else
		generateForm();
?> 
</body>
</html>