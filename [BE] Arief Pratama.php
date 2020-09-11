<?php $dlp = new AriefPratama();

// Input
$Soal1 = array(1,1,0,1,1,1);
$Soal2 = array("h","e","l","l","o");
$Soal3 = "{ [ ( ] ) }";

class AriefPratama {
	function findMaxConsecutive($arr, $numb) { 
	    $count = 0; 
	    for ($i = 0; $i < $numb - 1; $i++) { 
	        if ($arr[$i] == $arr[$i + 1]) 
	            $count++; 
	    } 
	    return $count; 
	}

	function reverseText($str, $numb){
		for ($i = $numb; $i > 0; $i--){
			echo '"',$str[$i-1],'"';
			if ($i > 1) {
				echo ",";
			}
		}
	}

	function recursiveText($str, $numb){
		$dlp = new AriefPratama();
		$i = $numb;
		if ($i == 1) 
			echo '"',$str[$i-1],'"';
		else { 
	        echo '"',$str[$i-1],'",';
	        $dlp->recursiveText($str, $numb - 1);
	    } 
	}

	function matchClosing($X, $start, $end, $open, $close) { 
	    $c = 1; 
	    $i = $start + 1; 
	    while ($i <= $end)  { 
	        if ($X[$i] == $open) { 
	            $c++; 
	        }  
	        else if ($X[$i] == $close) { 
	            $c--; 
	        } 
	        if ($c == 0) { 
	            return $i; 
	        } 
	        $i++; 
	    } 
	    return $i; 
	} 
	  
	function matchingOpening($X, $start, $end, $open, $close) { 
	    $c = -1; 
	    $i = $end - 1; 
	    while ($i >= $start) { 
	        if ($X[$i] == $open) { 
	            $c++; 
	        }  
	        else if ($X[$i] == $close) { 
	            $c--; 
	        } 
	        if ($c == 0) { 
	            return $i; 
	        } 
	        $i--; 
	    } 
	    return -1; 
	} 
	  
	function isBalanced($X, $n) { 
        $i; 
        $j = 0; 
        $k; 
        $x; 
        $start; 
        $end;
        $dlp = new AriefPratama();
      
        for ($i = 0; $i < $n; $i++)  { 
            if ($X[$i] == '(') { 
                $j = $dlp->matchClosing($X, $i, $n - 1, '(', ')'); 
            }  
            else if ($X[$i] == '{')  { 
                $j = $dlp->matchClosing($X, $i, $n - 1, '{', '}'); 
            }  
            else if ($X[$i] == '[')  { 
                $j = $dlp->matchClosing($X, $i, $n - 1, '[', ']'); 
            } 
            else 
            { 
                if ($X[$i] == ')') { 
                    $j = $dlp->matchingOpening($X, 0, $i, '(', ')'); 
                }  
                else if ($X[$i] == '}') { 
                    $j = $dlp->matchingOpening($X, 0, $i, '{', '}'); 
                }  
                else if ($X[$i] == ']') { 
                    $j = $dlp->matchingOpening($X, 0, $i, '[', ']'); 
                } 
                if ($j < 0 || $j >= $i) { 
                    return false; 
                } 
                continue; 
            } 
            if ($j >= $n || $j < 0) { 
                return false; 
            } 
      
            $start = $i; 
            $end = $j; 
            for ($k = $start + 1; $k < $end; $k++) { 
                if ($X[$k] == '(') { 
                    $x = $dlp->matchClosing($X, $k, $end, '(', ')'); 
                    if (!($k < $x && $x < $end)) { 
                        return false; 
                    } 
                }  
                else if ($X[$k] == ')') { 
                    $x = $dlp->matchingOpening($X, $start, $k, '(', ')'); 
                    if (!($start < $x && $x < $k)) { 
                        return false; 
                    } 
                } 
      
                if ($X[$k] == '{') { 
                    $x = $dlp->matchClosing($X, $k, $end, '{', '}'); 
                    if (!($k < $x && $x < $end)) { 
                        return false; 
                    } 
                }  
                else if ($X[$k] == '}') { 
                    $x = $dlp->matchingOpening($X, $start, $k, '{', '}'); 
                    if (!($start < $x && $x < $k)) { 
                        return false; 
                    } 
                } 
                if ($X[$k] == '[') { 
                    $x = $dlp->matchClosing($X, $k, $end, '[', ']'); 
                    if (!($k < $x && $x < $end)) { 
                        return false; 
                    } 
                }  
                else if ($X[$k] == ']') { 
                    $x = $dlp->matchingOpening($X, $start, $k, '[', ']'); 
                    if (!($start < $x && $x < $k)) { 
                        return false; 
                    } 
                } 
            } 
        } 
      
        return true; 
    } 
}

// Output
$numb = sizeof($Soal1);
echo "Jawaban Soal 1: \n";
echo $dlp->findMaxConsecutive($Soal1, $numb);
echo "\n------------------------------------------------\n";

// Output
$numb = sizeof($Soal2);
echo "Jawaban Soal 2: \n";
echo $dlp->recursiveText($Soal2, $numb);
echo "\n------------------------------------------------\n";

// Output
$str = str_replace(' ', '', $Soal3);
$X = str_split($str);
$n = strlen($str); 
echo "Jawaban Soal 3: \n";
echo ($dlp->isBalanced($X, $n)  ? 'YES' : 'NO' );
echo "\n------------------------------------------------\n";
?>