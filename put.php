<?php

	$myFile = "data.json";
   	$arr_data = array(); // create empty array

$pmethod = $_SERVER['REQUEST_METHOD'];
if($pmethod == 'PUT'){
	parse_str(file_get_contents('php://input'), $_PUT);

try
  {
	   //Get form data
	   $formdata = array(
	   	  'id'=> $_PUT['id'],
	      'nama'=> $_PUT['nama'],
	      'nim'=> $_PUT['nim'],
	      'email'=>$_PUT['email'],
	      'mobile'=> $_PUT['mobile'],
	      'kelas'=> $_PUT['kelas'],
	      'prodi'=>$_PUT['prodi'],
	      'wali'=> $_PUT['wali']
	   );

	   // Get data from existing json file
	   $jsondata = file_get_contents($myFile);

	   // converts json data into array
	   $arr_data = json_decode($jsondata, true);

	   // Initialize Array Data
	   foreach ($arr_data as $key => $entry) {
		    // Perbarui data kedua
		    if ($entry['id'] === $_PUT['id']) {
		        $arr_data[$key]['nama'] 	= $_PUT['nama'];
		        $arr_data[$key]['nim'] 		= $_PUT['nim'];
		        $arr_data[$key]['email'] 	= $_PUT['email'];
		        $arr_data[$key]['mobile'] 	= $_PUT['mobile'];
		        $arr_data[$key]['kelas'] 	= $_PUT['kelas'];
		        $arr_data[$key]['prodi'] 	= $_PUT['prodi'];
		        $arr_data[$key]['wali'] 	= $_PUT['wali'];

		    }
		}

       //Convert updated array to JSON
	   $jsondata = json_encode($arr_data, JSON_PRETTY_PRINT);
	   
	   //write json data into data.json file
	   if(file_put_contents($myFile, $jsondata)) {
	        echo 'Data successfully Updated';
	    }
	   else 
	        echo "error";
   }
   catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
   }

}


?>