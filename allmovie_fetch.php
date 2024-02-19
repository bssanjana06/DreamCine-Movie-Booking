 <?php

//fetch_data.php

include("database_connection.php");

if(isset($_POST["action"]))
{
	$query = "SELECT * FROM add_movie WHERE status = '1'";
	
	if(isset($_POST["category"]))
	{
		$category_filter = implode("','", $_POST["category"]);
		$query .= "AND category IN('".$category_filter."')";
	}
	if(isset($_POST["language"]))
	{
		$language_filter = implode("','", $_POST["language"]);
		$query .= "AND language IN('".$language_filter."')";
	}

	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$total_row = $statement->rowCount();
	$output = '';
	if($total_row > 0)
	{
		foreach($result as $row)
		{
			if($row['action']== "running"){
			$output .= '<div class="col-lg-4 col-md-5 col-sm-6">
				<div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:1px; height:450px;">
					<img src="admin/image/'. $row['image'] .'" alt="" class="resize" style="height:300px; width:99%;" >
					<p align="center"><strong><font color="white">'. $row['movie_name'] .'</font></strong></p>

					<p align="center"><strong><font color="white">
					Director : '. $row['director'] .' <br />

					</font></strong></p>

					
				</div>
					<a href="movie_details.php?pass='.$row['id'].'" class="btn btn-primary" style="margin-left: 70px;margin-top: -80px; margin-bottom:10px;">Book Now</a>
			</div>
			';

		}

		if($row['action']== "upcoming"){
			$output .= '
			<div class="col-lg-4 col-md-5 col-sm-6">
				<div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:1px; height:450px;">
					<img src="admin/image/'. $row['image'] .'" alt="" class="resize" style="height:300px; width:100%;" >
					<p align="center"><strong><font color="white">'. $row['movie_name'] .'</font></strong></p>

					<p align="center"><strong><font color="white">
					Director : '. $row['director'] .' <br />
					</font></strong></p>
					
				</div>
					<a href="movie_details.php?pass='.$row['id'].'" class="btn btn-primary" style="margin-left: 70px;margin-top: -80px; margin-bottom:10px;">Upcoming</a>
			</div>
			';
		}
	}
	}
	else
	{
		$output = '<h3 style="color:white; margin-left:70px; margin-top:50px;">No Movies</h3>';
	}
	echo $output;
}

?>