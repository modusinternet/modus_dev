<?php
function navLngdir() {
	global $CFG;
	/* Used to help move the language dropdow box around when switching from ltr to rtl languages. */
	if($CFG["CCMS_LNG_DIR"] == "ltr") {
		echo " right:0; left:auto;";
	} else {
		echo " text-align:right;";
	}
}

function navLngList() {
	global $CFG, $CLEAN;
	// this line of code produces the wrong output on GoDaddy servers.
	//$tpl = htmlspecialchars(preg_replace('/^\/([\pL\pN-]*)\/?(.*)\z/i', '${2}', $_SERVER['REDIRECT_URL']));
	$tpl = htmlspecialchars(preg_replace('/^\/([\pL\pN-]*)\/?(.*)\z/i', '${2}', $_SERVER['REQUEST_URI']));
	$qry = $CFG["DBH"]->prepare("SELECT * FROM `ccms_lng_charset` WHERE `status` = 1 ORDER BY lngDesc ASC;");
	if($qry->execute()) {
		while($row = $qry->fetch()) {
			if($row["ptrLng"]) {
				echo "<a class=\"dropdown-item\" href=\"/" . $row["ptrLng"] . "/" . $tpl . "\" id=\"lng-" . $row["lng"] . "\" dir=\"" . $row["dir"] . "\" onclick=\"ccms_pound_cookie_update('" . $row["ptrLng"] . "');\">" . $row["lngDesc"] . "</a>";
			} else {
				echo "<a class=\"dropdown-item\" href=\"/" . $row["lng"] . "/" . $tpl . "\" id=\"lng-" . $row["lng"] . "\" dir=\"" . $row["dir"] . "\" onclick=\"ccms_pound_cookie_update('" . $row["lng"] . "');\">" . $row["lngDesc"] . "</a>";
			}
		}
	}
}

function lng_dir_left_go_right_right_go_left() {
	global $CFG;
	if($CFG["CCMS_LNG_DIR"] == "ltr") {
		echo "right";
	} else {
		echo "left";
	}
}

function lng_dir_right_go_left_left_go_right() {
	global $CFG;
	if($CFG["CCMS_LNG_DIR"] == "ltr") {
		echo "left";
	} else {
		echo "right";
	}
}

function shadow_direction_x() {
	global $CFG;
	/* Used to help direct the horizontal (x) direction of shadows generated in CSS when changing languages. */
	if($CFG["CCMS_LNG_DIR"] == "ltr") {
		echo "6";
	} else {
		echo "-6";
	}
}

