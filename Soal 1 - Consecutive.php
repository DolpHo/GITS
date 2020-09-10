<?php

class Solution {
	function findMaxConsecutive($arr, $numb) { 
	    $count = 0; 
	    for ($i = 0; $i < $numb - 1; $i++) { 
	        if ($arr[$i] == $arr[$i + 1]) 
	            $count++; 
	    } 
	    return $count; 
	}
}

// Input
$arr = array(1,0,0,1,0,1,1);

// Output
$numb = sizeof($arr);
$Solution = new Solution(); 
echo $Solution->findMaxConsecutive($arr, $numb);
?>