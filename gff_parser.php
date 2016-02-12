<?php
$myfile = fopen("11940_2#1.gff", "r") or die("Unable to open file!");
//$myfile = fopen("11940_2#77.gff", "r") or die("Unable to open file!");
//$myfile = fopen("PROKKA_01192015.gff", "r") or die("Unable to open file!");
// Output one line until end-of-file

//echo fread($myfile,filesize("11940_2#1.gff"));
//echo fgets($myfile);
$clean_array = array();
$contig_array = array();
$size_seq_line = 61;
$i = 0;
echo "<pre>";


//main data array formater
while(!feof($myfile)) {
   $line = fgets($myfile);
   if(substr($line,0,2) !== '##' ){
   	
	   $pieces = explode("\t", $line);
	  
	   	if(count($pieces)>1){
	   		foreach ($pieces as $key => $value) {
				$clean_array[$i]['contig']['name']  = $pieces[0];
				$clean_array[$i]['contig']['start'] = $pieces[3];
				$clean_array[$i]['contig']['end']   = $pieces[4];	   			
				if(preg_match('/;/',$value)){
	   				
	   				$attributes = explode(";", $value);

	   				foreach ($attributes as $attri_key => $attri_value) {
	   					$clean_array[$i]['attributes'][]= $attri_value; 
	   				}

	   			}else{
	   				//$clean_array[$i][]= $value; 
	   			}

	   		}	
	   	}else{
	   		//Format the sequense
	   		if(strlen($line) != $size_seq_line){//currently dependding from the seq size
	   			$seq_name = str_replace(">","",str_replace("\n","",$line)) ;
	   			
	   		}else{
	   			
	   			$clean_array['seq'][$seq_name] = $clean_array['seq'][$seq_name].str_replace("\n","",$line);		

	   		}
	   		
	   	} 	
	   	$i++;
   }else{

   }
}

//creates an array with the sequenses
$sequenses = $clean_array['seq'];
unset($clean_array['seq']);

//loop for sequense distribution depending of positions
foreach ($clean_array as $key => $value) {
		
	$contig = $value['contig']['name'];
	
	$startIndex = $value['contig']['start'];
	
	$length = abs($startIndex - $value['contig']['end']);

	$clean_array[$key]['contig']['fragment'] = substr($sequenses[$contig], $startIndex, $length);	
}


fclose($myfile);

print_r($clean_array);






?>