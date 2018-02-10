<?php
	ob_start();
	session_start();
	include "../../../sistem/ayarlar.php";
	include "../../../sistem/fonksiyonlar.php";
	$user = $pdo->query('SELECT * FROM admin  where id="'.$_SESSION['login'].'"')->fetch(PDO::FETCH_OBJ);
if (!kullanici()) {
    header("Location:index.php");
}

	
	
	
	
	
	// Get the JSON string
	$jsonstring = $_GET['jsonstring'];
	
	// Decode it into an array
	$jsonDecoded = json_decode($jsonstring, true, 64);
	
	
	
	
	
	

	/* Function to parse the multidimentional array into a more readable array 
	 * Got help from stackoverflow with this one:
	 *    http://stackoverflow.com/questions/11357981/save-json-or-multidimentional-array-to-db-flat?answertab=active#tab-top
	*/
	function parseJsonArray($jsonArray, $parentID = 0)
	{
	  $return = array();
	  foreach ($jsonArray as $subArray) {
		 $returnSubSubArray = array();
		 if (isset($subArray['children'])) {
		   $returnSubSubArray = parseJsonArray($subArray['children'], $subArray['id']);
		 }
		 $return[] = array('id' => $subArray['id'], 'parentID' => $parentID);
		 $return = array_merge($return, $returnSubSubArray);
	  }

	  return $return;
	}
	
	
	
	
	// Dump the array to debug
	//var_dump(parseJsonArray($jsonDecoded));
	
	
	
	
	
	
	
	// Run the function above
	$readbleArray = parseJsonArray($jsonDecoded);
	
	
	
	// Loop through the "readable" array and save changes to DB
	foreach ($readbleArray as $key => $value) {
	
		// $value should always be an array, but we do a check
		if (is_array($value)) {
		
			
		$query = $pdo->prepare("UPDATE kategoriler SET
				ustid = :ustid,
				sira = :sira
			WHERE id = :id");
			$updatedefault = $query->execute(array(
					 "ustid" => $value['parentID'],
					 "sira" => $key,
					 "id" => $value['id']
			));
		}
	}
	
	
	// Echo status message for the update
	echo "The list was updated ".date("y-m-d H:i:s")."!";
	
?>