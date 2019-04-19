<?php
	include_once "includes/database.php";

    function ifExists($conn, $inv_id, $year_id) {
        $sql = "SELECT opt_id FROM tbl_part_details WHERE inv_id=\"".$inv_id."\" AND year_id=\"".$year_id."\"";
        $result = $conn->query($sql);
        if($result) {
            if (mysqli_num_rows($result)>0) {
                return 1;
            }
            else {
                return 0;
            }
        }
    }

    function ifOptExists($conn, $inv_id, $opt_id, $year_id) {
        $sql = "SELECT opt_id FROM tbl_part_details WHERE inv_id=\"".$inv_id."\" AND opt_id=\"".$opt_id."\" AND year_id=\"".$year_id."\"";
        $result = $conn->query($sql);
        if($result) {
            if (mysqli_num_rows($result)>0) {
                return 1;
            }
            else {
                return 0;
            }
        }
    }

    function extractId($conn, $node, $item) {
        $sql = "SELECT ".$node."_id FROM tbl_car_".$node." WHERE ".$node."_name=\"".$item."\"";
        $result = $conn->query($sql);
        if($result) {
            if (mysqli_num_rows($result)>0) {
                $row = $result->fetch_assoc();
                return $row[$node.'_id'];
            }
            else {
                return 0;
            }
        }
    }

    function extractOptId($conn, $item) {
        $sql = "SELECT opt_id FROM tbl_part_options WHERE opt_name=\"".$item."\"";
        $result = $conn->query($sql);
        if($result) {
            if (mysqli_num_rows($result)>0) {
                $row = $result->fetch_assoc();
                return $row['opt_id'];
            }
            else {
                return 0;
            }
        }
    }

    function extractYearId($conn, $item) {
        $sql = "SELECT year_id FROM tbl_year WHERE year=\"".$item."\"";
        $result = $conn->query($sql);
        if($result) {
            if (mysqli_num_rows($result)>0) {
                $row = $result->fetch_assoc();
                return $row['year_id'];
            }
            else {
                return 0;
            }
        }
    }

    function checkInventory($conn, $part_id, $model_id) {
        $sql = "SELECT inv_id FROM tbl_inventory WHERE part_id=\"".$part_id."\" AND model_id=\"".$model_id."\"";
        $result = $conn->query($sql);
        if($result) {
            if (mysqli_num_rows($result)>0) {
                return 1;
            }
            else {
                return 0;
            }
        }
    }

    function extractInvId($conn, $part_id, $model_id) {
        $sql = "SELECT inv_id FROM tbl_inventory WHERE part_id=\"".$part_id."\" AND model_id=\"".$model_id."\"";
        $result = $conn->query($sql);
        if($result) {
            if (mysqli_num_rows($result)>0) {
                $row = $result->fetch_assoc();
                return $row['inv_id'];
            }
            else {
                return 0;
            }
        }
    }

	if (isset($_GET['maker'])) {
		$maker = $_GET['maker'];
		$sql="SELECT s.model_name as model FROM tbl_car_model s INNER JOIN tbl_car_maker c ON s.maker_id = c.maker_id WHERE c.maker_name=\"$maker\" ORDER BY s.model_name";
		$result=$conn->query($sql);
		echo "<option disabled selected value=''>Select Model</option>";
		while ($row=$result->fetch_assoc()) {
			echo "<option value=\"".$row['model']."\">".$row['model']."</option>";
		}
	} elseif (isset($_GET['model'])&&!isset($_GET['part'])) {
		$model = $_GET['model'];
		$sql="SELECT p.part_name as part FROM tbl_car_part p INNER JOIN tbl_inventory i ON p.part_id = i.part_id WHERE i.model_id=\"".extractId($conn,'model',$model)."\" ORDER BY p.part_name";
		$result=$conn->query($sql);
		echo "<option disabled selected value=''>Select Part</option>";
		while ($row=$result->fetch_assoc()) {
			echo "<option value=\"".$row['part']."\">".$row['part']."</option>";
		}
	} elseif (isset($_GET['part'])&&isset($_GET['model'])&&!isset($_GET['year'])) {
		echo "<option disabled selected value=''>Select Year</option>";
		
        $inv_id = extractInvId($conn, extractId($conn, "part", $_GET['part']), extractId($conn, "model", $_GET['model']));

        $sql = "SELECT DISTINCT y.year as year from tbl_part_details p INNER JOIN tbl_year y ON p.year_id = y.year_id WHERE inv_id=".$inv_id;
        $result=$conn->query($sql);
        echo $sql;

		while($row=$result->fetch_assoc()) {
			echo "<option value=\"".$row['year']."\">".$row['year']."</option>";
		}
	} elseif (isset($_GET['year'])) {
        ?>
        <div class="form-group row optone">                     
            <label for="MainOpt1" class="col-3 col-form-label">Option 1 <span class="text-danger">*</span></label>
            <div class="col-9">
                <select name="MainOpt1" id="MainOpt1" class="form-control">
        <?php
        echo "<option disabled selected value=''>Select Option</option>";
        
        $inv_id = extractInvId($conn, extractId($conn, "part", $_GET['part']), extractId($conn, "model", $_GET['model']));

        $sql = "SELECT DISTINCT o.opt_name as opt from tbl_part_details p INNER JOIN tbl_part_options o ON p.opt_id = o.opt_id WHERE inv_id=".$inv_id;
        $result=$conn->query($sql);

        while($row=$result->fetch_assoc()) {
            echo "<option value=\"".$row['opt']."\">".$row['opt']."</option>";
        }
        
        echo "</select></div></div>";
    }
?>