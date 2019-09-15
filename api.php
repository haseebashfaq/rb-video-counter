<?php
class AddData {
	function insertData($date_time, $play_count, $complete_count, $tab_id, $store_name) {
		$username = 'sky147_umair';
		$password = 'basaik';
		$host     = 'localhost';
		$database = 'sky147_reckit';

		$connection = mysqli_connect($host, $username, $password);
		$checkdb    = mysqli_select_db($connection, $database);
		mysqli_set_charset($connection, 'utf8');

		$query = mysqli_query($connection, "INSERT INTO video_counter SET date_time = '$date_time', play_count = '$play_count', complete_count = '$complete_count', tab_id = '$tab_id', store_name = '$store_name'");
		if($query) {
			return true;
		} else {
			return false;
		}
	}
}

//change these values to insert into db (frontend with android)
$temp_date_time = $_POST['dateTime'];
$temp_play_count = $_POST['viewCount'];
$temp_complete_count = $_POST['completeCount'];
$temp_tab_id = $_POST['tabId'];
$temp_store_name = $_POST['store_name'];

$AddData = new AddData();

//un-comment the below lines to make it work
if($AddData->insertData($temp_date_time, $temp_play_count, $temp_complete_count, $temp_tab_id)) {
	$data = array('date_time' => $temp_date_time, 'play_count' => $temp_play_count, 'complete_count' => $temp_complete_count, 'tab_id' => $temp_tab_id, 'store_name' => $temp_store_name);
	
	echo json_encode($data, JSON_PRETTY_PRINT);
} else {
	return false;
}


?>