<?php

	function getAll($tbl) {
		include('connect.php');
		$queryAll = "SELECT * FROM {$tbl}";
		$runAll = mysqli_query($link, $queryAll);
		// echo $queryAll;
		if($runAll){
				return $runAll;
		}else{
			$error = "something broke, problem accessing the info.... jejejeje";
			return $error;
		}

		mysqli_close($link);
	}

	function getSingle($tbl, $col, $id) {
		include('connect.php');
		$querySingle = "SELECT * FROM {$tbl} WHERE {$col} = {$id}";
		// echo $querySingle;
		$runSingle = mysqli_query($link, $querySingle);

		if($runSingle){
			return $runSingle;
		}else{
			$error = "something broke, problem accessing the info.... jejejeje";
			return $error;
		}

		mysqli_close($link);
	}
	
	function filterResults($tbl, $tbl2, $tbl3, $col, $col2, $col3, $filter) {
			include('connect.php');
			// $tbl = "tbl_movies";
			// $tbl2 = "tbl_genre";
			// $tbl3 = "tbl_mov_genre";
			// $col = "movies_id";
			// $col2 = "genre_id";
			// $col3 = "genre_name";
			// $filter = "action";
			$filterQuery = "SELECT * FROM {$tbl}, {$tbl2}, {$tbl3} WHERE {$tbl}.{$col} = {$tbl3}.{$col} AND {$tbl2}.{$col2} = {$tbl3}.{$col2} AND {$tbl2}.{$col3} = '{$filter}'";
			// echo $filterQuery;
			$runQuery = mysqli_query($link, $filterQuery);
			if($runQuery){
				return $runQuery;
			}else{
				$error = "There was a problem accessing this information. So soya";
 			return $error;
		}
		mysqli_close($link);
	}

?>
