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
		//if number ok, carry out tasks
		if($firstLength > 0)
		{	
			//test for odd or even
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
			
			//test for palindrome
			if(strrev($numInput)==$numInput)
				$attributes['palindrome']  = true ;
			else
				$attributes['palindrome']  = false ;
			
			//call isPrime function to test for prime
			if(isPrime($numInput))
				$attributes['prime']  = true;
			else
				$attributes['prime']  = false;
			
			//test for palindrome prime. If true, set individual features to false
			if(($attributes['palindrome']) &&  ($attributes['prime']))
			{
				$attributes['PalindromePrime']  = true;
				$attributes['palindrome']=false;
				$attributes['prime']=false;
			}
			else
				$attributes['PalindromePrime']  = false;
			
			//populate an array and keep count of true attributes of number
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
			
			//print out the key if the feature is true
			foreach($attributes as $key => $value) 
			{
				if($value)
				{
					echo $key;
					//print the word 'and' after the feature if there is more than one, and current is not the last
					if ((count($attributes)>1) && $i<($atts))
						echo " and ";	
					$i++;
				}
			}
		}
		
		//write an error message if no number entered
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