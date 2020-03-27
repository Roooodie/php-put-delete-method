<?php

    $myFile = "data.json";
    $arr_data = array(); // create empty array

$dmethod = $_SERVER['REQUEST_METHOD'];
if($dmethod == 'DELETE'){
	parse_str(file_get_contents('php://input'), $_DELETE);

	try
  {
        // Try Key Parameter
        // print_r($_DELETE['id']);

       // Get data from existing json file
       $jsondata = file_get_contents($myFile);

       // converts json data into array
       $arr_data = json_decode($jsondata, true);

       // Initialize Array Data
       foreach ($arr_data as $key => $entry) {
            // Perbarui data kedua
            if ($entry['id'] === $_DELETE['id']) {
                array_splice($arr_data, $key, 1);
            }
        }

       //Convert updated array to JSON
       $jsondata = json_encode($arr_data, JSON_PRETTY_PRINT);
       
       //write json data into data.json file
       if(file_put_contents($myFile, $jsondata)) {
            echo 'Data successfully Deleted';
        }
       else 
            echo "error";
   }
   catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
   }
}

?>