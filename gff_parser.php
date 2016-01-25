<?php

$myfile = fopen("11940_2#1.gff", "r") or die("Unable to open file!");
// Output one line until end-of-file
$clean_array = array();
$i = 0;
while(!feof($myfile)) {
   if(substr(fgets($myfile),0,2) !== '##' || substr(fgets($myfile),0,2) !== '>E' ){
   	
	   	$pieces = explode("\t", fgets($myfile));
	   	if(count($pieces)>2){
	   		$i++;
	   		foreach ($pieces as $key => $value) {
	   			if(preg_match('/;/',$value)){
	   				
	   				$attributes = explode(";", $value);

	   				foreach ($attributes as $attri_key => $attri_value) {
	   					$clean_array[$i]['attributes'][]= $attri_value; 
	   				}

	   			}else{
	   				$clean_array[$i][]= $value; 
	   			}
	   		}	
	   	}else{
	   		$clean_array['seq'][]	= fgets($myfile);	
	   	} 	
   }
}

//echo $clean_array['seq'];
//echo preg_replace('/\s+/', '', $clean_array['seq']);

fclose($myfile);

echo "<pre>";
print_r($clean_array);






?>