<?php
		
	session_start();

	require ('./database.php');
	require ('./PHPExcel.php');
	
	$db = new Database();
	
	$message_update = false;
	$error_message = false; 

	$file = $_POST['folder'];
	$file_path = ('excel/'.$file);

	$valid = false;

	$types = array('Excel2007', 'Excel5');

	foreach ($types as $type) {
		$reader = PHPExcel_IOFactory::createReader($type);
    if ($reader->canRead($file_path)) {
      $valid = true;
      break;
    }
	}

	if ($valid) {
		$excelReader = PHPExcel_IOFactory::load($file_path);
		$sheet = $excelReader->getSheet(0);
		$highestRow = $sheet->getHighestDataRow();
		$highestColumn = $sheet->getHighestColumn();
		$rowA1 = $sheet->rangeToArray('A1');

		$num_rows_inserted = 0;

		for ($row = 2; $row <= $highestRow; $row++){ 

	    $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
	                                    NULL,
	                                    TRUE,
	                                    FALSE);
			$row_data=$rowData[0];

			$product_id = $row_data[0];
	    $model = $row_data[1];
	    $status = $row_data[2];
	    $language_id = $row_data[3];
	    $name = $row_data[4];
	    $description = $row_data[5];
	    $meta_title = $row_data[6];
	    $store_id = $row_data[7];	

	    $check_if_exist_the_record = $db->getAll('SELECT product_id FROM oc_product WHERE product_id = "'.$product_id.'"');
	    
       /*******************
		  / Update data in db 
     /*******************/

	    if(count($check_if_exist_the_record) > 0 ){

	    	$query = $db->execute('UPDATE oc_product SET model="'.$model.'" , status="'.$status.'" WHERE product_id="'.$product_id.'"');

	    	$query = $db->execute('UPDATE oc_product_description SET language_id="'.$language_id.'" , name="'.$name.'", description="'.$description.'", meta_title="'.$meta_title.'" WHERE product_id="'.$product_id.'"');

	    	$query = $db->execute('UPDATE oc_product_to_store SET store_id="'.$store_id.'"  WHERE product_id="'.$product_id.'"');

	    	$message_update =true;

	    	$_SESSION['update'] = $message_update;
	    	
	    	
       /*******************
		  / Insert data in db 
     /*******************/	

	    }	else{
	    	
	    	$query = $db->execute("INSERT INTO oc_product (product_id, model , status) VALUES ('$product_id' , '$model' , '$status')");

				$query = $db->execute("INSERT INTO oc_product_description (product_id, language_id , name , description , meta_title ) VALUES ('$product_id' , '$language_id' , '$name', '$description', '$meta_title')");

				$query = $db->execute("INSERT INTO oc_product_to_store (product_id, store_id) VALUES ('$product_id' , '$store_id')");
				
				$message_insert = true;

				$num_rows_inserted = $num_rows_inserted +1;

				$_SESSION['num_rows_inserted'] = $num_rows_inserted;
	    }	
	    header("Location: http://localhost/addProduct/");
		}
	} else {
		$error_message = false;
		$_SESSION['error'] = $error_message;
	}
	
	
	header("Location: http://localhost/addProduct/");

?>