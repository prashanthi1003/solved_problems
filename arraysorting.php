<?php

function sort_the_array($tobesortarray){
	echo "The array to be sorted: <br>";
	for($i=0; $i<count($tobesortarray); $i++){
			echo $tobesortarray[$i]. "<br>";
	}

	$count_of_duplicates = array_count_values($tobesortarray);

	/*foreach ($countedvalues as $key => $value) {
		echo $key . " - " . $value ."<br>";	
	}*/

	asort($count_of_duplicates);
	//echo "sorted array <br>";
	$final_array = array();
	/*foreach ($count_of_duplicates as $key => $value) {
		echo $key . " - " . $value ."<br>";	
	}*/

	foreach ($count_of_duplicates as $key => $value) {
		for($i=1; $i<=$value; $i++){
			$final_array[] = $key;
		}
	}
	return $final_array;
}

$tobesortarray = [3,5,1,2,3,5,1,2,7,1,3];

$sorted_array = sort_the_array($tobesortarray);

echo "Sorted array in ascending according to the number of occurences of the elements : <br>";
for($i=0; $i<count($sorted_array); $i++){
	echo $sorted_array[$i]. "<br>";
}
