<?php
// File with toon attributes.
$filename = "100000001.yaml";

// Load the file, read it, and write the lines to $content.
$fp = fopen($filename, "r");
$content = fread($fp, filesize($filename));
$lines = explode("\n", $content);
fclose($fp);

// Assign specific lines to specific variables.
$lname = $lines[3];
$ldna = $lines[9];

// Will be used if the 9th line contains PreviousAccess (extra line exists).
$bkldna = $lines[10];

// Display Toon name
preg_match_all("/[^setName: \(\"](\D+\b)/", $lname, $pname);
$name = $pname[0][0];
print_r(nl2br("Your Toon's name is " . $name . "." . PHP_EOL));

// Display Toon DNA string
preg_match_all("/[^setDNAString: \(\<](\S+\b)/", $ldna, $pdna);
if ($pdna[0][0] == "PreviousAccess") { preg_match_all("/[^setDNAString: \(\<](\S+\b)/", $bkldna, $pdna); }
$dna = $pdna[0][0];
print_r(nl2br("Your Toon's DNA string is " . $dna . "." . PHP_EOL));

// Split DNA string into seventeen two-digit parts.
preg_match_all("/(\w\w)/", $dna, $pdnap);
$parteddna = $pdnap[0];

// $parteddna[3] is species and head size.
// $parteddna[4] is torso size.
// $parteddna[5] is leg size.
// $parteddna[6] is isMale (boolean).

if ($parteddna[6] == 01) {
	print_r(nl2br("Your toon is a male"));
} elseif ($parteddna[6] == 00) {
	print_r(nl2br("Your toon is female"));
} else {
	print_r(nl2br("Your toon must be on Tumblr (because it's neither male nor female) and is also a"));
}
switch($parteddna[3]) {
	case "00":
	case "01":
	case "02":
	case "03":
		print_r(nl2br(" dog." . PHP_EOL));
		break;
	case "04":
	case "05":
	case "06":
	case "07":
		print_r(nl2br(" cat." . PHP_EOL));
		break;	
	case "08":
	case "09":
	case "0a":
	case "0b":
		print_r(nl2br(" horse." . PHP_EOL));
		break;
	case "0c":
	case "0d":
		print_r(nl2br(" mouse." . PHP_EOL));
		break;
	case "0e":
	case "0f":
	case "10":
	case "11":
		print_r(nl2br(" rabbit." . PHP_EOL));
		break;
	case "12":
	case "13":
	case "14":
	case "15":
		print_r(nl2br(" duck." . PHP_EOL));
		break;
	case "16":
	case "17":
	case "18":
	case "19":
		print_r(nl2br(" monkey." . PHP_EOL));
		break;
	case "1a":
	case "1b":
	case "1c":
	case "1d":
		print_r(nl2br(" bear." . PHP_EOL));
		break;
	case "1e":
	case "1f":
	case "20":
	case "21":
		print_r(nl2br(" pig. (Not saying this as an insult!)" . PHP_EOL));
		break;
	default:
		print_r(nl2br("n unknown species." . PHP_EOL));
}
switch($parteddna[4]) {
	case "00":
	case "03":
	case "06":
		print_r(nl2br("Your toon is also a little on the chubby side, "));
		break;
	case "01":
	case "04":
	case "07":
		print_r(nl2br("Your toon has a smol torso "));
		break;
	case "02":
	case "05":
	case "08":
		print_r(nl2br("Your toon has a tall torso "));
		break;
	default:
		print_r(nl2br("Never seen a torso like that, "));
}
switch($parteddna[5]) {
	case "00":
		print_r(nl2br("and has smol legs." . PHP_EOL));
		break;
	case "01":
		print_r(nl2br("and has average-sized legs." . PHP_EOL));
		break;
	case "02":
		print_r(nl2br("and has tall legs." . PHP_EOL));
		break;
	default:
		print_r(nl2br("and I haven't seen legs like those." . PHP_EOL));
}

?>