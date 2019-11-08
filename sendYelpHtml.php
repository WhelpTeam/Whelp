<?

$db = new PDO("mysql:host=198.71.227.95:3306; dbname=YelpProject;", "yelpgroup", "csci3300GROUP5$");

if(isset($_POST["query"])){
	$output = '';
	$query = $db->prepare("SELECT * FROM Business WHERE name LIKE '%".$_POST["query"]."%' OR city LIKE '%".$_POST["query"]."%' OR state LIKE '%".$_POST["query"]."%'");
	$query->execute();
	$row = $query->fetch();
	$output = '<ul class="list-unstyled">';
	$rows = $query->fetchAll(PDO::FETCH_ASSOC);
	if(count($rows) > 0){

		foreach($rows as $row){
		
		$output .= '<li>'.$row["name"].', '.$row["city"].', '.$row["state"].'</li>';
	}
	}else{
		$output .= '<li>Buisness Not Found</li>';
	}
	$output .= '</ul>';
	echo $output;
}
?>
