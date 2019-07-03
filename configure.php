<?php
error_reporting(0);
date_default_timezone_set('Africa/Lagos');
$nsdbserver = "localhost";
$nsdbname = "kmdb";
$nsdbusername = "root";
$nsdbpassword = "golf";
$con = mysql_connect($nsdbserver,$nsdbusername,$nsdbpassword);
if (!$con){die('Could not connect: ' . mysql_error());} mysql_select_db($nsdbname, $con); 

//Validate Inputs
function validateData($data)
{
$data = trim($data);
$data = stripslashes($data);
$data = mysql_real_escape_string($data);
$data = htmlspecialchars($data);
return $data;
}

//Resize and Upload Picture
function uploadPic($picture,$new){
$valid_extension = array('.jpeg', '.jpg', '.png');
$file_extension = strtolower( strrchr( $picture, "." ) );

if( in_array( $file_extension, $valid_extension ) && 
    $_FILES["picture"]["size"] < 500000 ){
	if (!file_exists($new)) {
    mkdir($new, 0777, true);
}

	$temp=$new;
                $tmp=$_FILES['picture']['tmp_name'];
			    $temp=$temp.basename($picture);
                move_uploaded_file($tmp,$temp);
}
else
{
   			echo"<div class='alert alert-warning'>Image upload Error! image must be less than 5MB, format: jpg,jpeg or png</div>";
			
}
}

//Resize and Upload Picture
function uploadSermon($cv,$new){
$valid_extension = array('.jpeg', '.mp3', '.mp4','.docx', '.pdf', '.avi');
$file_extension = strtolower( strrchr( $cv, "." ) );

if( in_array( $file_extension, $valid_extension ) && 
    $_FILES["cv"]["size"] < 50000 ){
	if (!file_exists($new)) {
    mkdir($new, 0777, true);
}

	$temp=$new;
                $tmp=$_FILES['cv']['tmp_name'];
			    $temp=$temp.basename($cv);
                move_uploaded_file($tmp,$temp);
}
else
{
   			echo "<div class='alert alert-warning'>Image upload Error! image must be less than 5MB, format: jpg,jpeg or png</div>";
			
}
}


function convert_number_to_words($number) {
   
    $hyphen      = '-';
    $conjunction = ' and ';
    $separator   = ', ';
    $negative    = 'negative ';
    $decimal     = ' naira ';
    $dictionary  = array(
        0                   => 'zero',
        1                   => 'one',
        2                   => 'two',
        3                   => 'three',
        4                   => 'four',
        5                   => 'five',
        6                   => 'six',
        7                   => 'seven',
        8                   => 'eight',
        9                   => 'nine',
        10                  => 'ten',
        11                  => 'eleven',
        12                  => 'twelve',
        13                  => 'thirteen',
        14                  => 'fourteen',
        15                  => 'fifteen',
        16                  => 'sixteen',
        17                  => 'seventeen',
        18                  => 'eighteen',
        19                  => 'nineteen',
        20                  => 'twenty',
        30                  => 'thirty',
        40                  => 'fourty',
        50                  => 'fifty',
        60                  => 'sixty',
        70                  => 'seventy',
        80                  => 'eighty',
        90                  => 'ninety',
        100                 => 'hundred',
        1000                => 'thousand',
        1000000             => 'million',
        1000000000          => 'billion',
        1000000000000       => 'trillion',
        1000000000000000    => 'quadrillion',
        1000000000000000000 => 'quintillion'
    );
   
    if (!is_numeric($number)) {
        return false;
    }
   
    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
            'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
            E_USER_WARNING
        );
        return false;
    }

    if ($number < 0) {
        return $negative . convert_number_to_words(abs($number));
    }
   
    $string = $fraction = null;
   
    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }
   
    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . convert_number_to_words($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= convert_number_to_words($remainder);
            }
            break;
    }
   
    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string) $fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }
   
    return $string;
}

// Check Post Service DUE Date
/*
$check_due = mysql_query("SELECT check_date FROM check_due WHERE check_date=CURDATE()") or die(mysql_error());
if(mysql_num_rows($check_due)>0){}else{

$check_past = mysql_query("SELECT dated, customerid, description FROM jobs WHERE dated = CURDATE() - INTERVAL 76 DAY") or die(mysql_error());
while($due_jobs = mysql_fetch_array($check_past)){
	echo "Service Reminder Message Sent to these Customers<hr>";
	echo $customerid = $due_jobs['customerid'];
	$last_date = $due_jobs['dated'];
	echo $next_date = date('Y-m-d', strtotime('+14 days'));
	echo $description = substr(strip_tags($due_jobs['description']), 0, 18);
	echo $recipient = mysql_result(mysql_query("SELECT telephoneno FROM contacts WHERE customerid='$customerid' LIMIT 1"),0) or die(mysql_error());
	
	$recipient = trim(preg_replace("/[\n]*//*", '', $recipient));
	$recipient = preg_replace('/[^0-9]/', '', $recipient);
	$rlength = strlen($recipient);
	if($rlength>20){continue;}
	if($rlength<9){continue;}
	//Arrange Contact Correctly
	if(substr( $recipient, 0, 1 ) == "0" && substr( $recipient, 0, 3 ) != "009"){$recipient = "234".substr($recipient,1);}elseif(substr( $recipient, 0, 3 ) == "234"){$recipient = $recipient;}elseif(substr( $recipient, 0, 1 ) == "+"){$recipient = substr($recipient,1);}elseif(substr( $recipient, 0, 1 ) == " "){ continue;}elseif(substr( $recipient, 0, 3 ) == "009"){$recipient= substr( $recipient, 3 );}elseif($rlength<7 || $rlength>18){continue;}else{$recipient = $recipient; }

	$message = urlencode("Dear Customer, your vehicle ".$description." will be due for Service on ".$next_date.". Thank you for your patronage. Call 092911685 for enquiries. Kojo Autos.");
// file_get_contents("http://ngn.rmlconnect.net/bulksms/bulksms?username=priyoorsms&password=s2zTMAGg&type=0&message=".$message."&source=Kojo-Motors&destination=".$recipient."&dlr=1");
}
$today = date("Y-m-d");
mysql_query("INSERT INTO check_due VALUES ('$today','')") or die(mysql_error());
}
  */
?>

