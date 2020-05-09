<?php
session_start();

// Put your PHP functions and modules here
function preShow($arr, $returnAsString = false)
{
  $ret  = "<pre>" . print_r($arr, true) . "</pre>";
  if ($returnAsString)
    return $ret;
  else
    echo $ret;
}

function printMyCode()
{
  $lines = file($_SERVER["SCRIPT_FILENAME"]);
  echo "<pre class='mycode'><ol>";
  foreach ($lines as $line)
    echo "<li>" . rtrim(htmlentities($line)) . "</li>";
  echo "</ol></pre>";
}
function php2js($arr, $arrName)
{
  $lineEnd = "";
  echo "<script>\n";
  echo " /* Generated with A4's php2js() function */";
  echo "  var $arrName = " . json_encode($arr, JSON_PRETTY_PRINT);
  echo "</script>\n\n";
}
function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if (isset($_POST["session-reset"])) {
  foreach ($_SESSION as $something => &$whatever) {
    unset($whatever);
  }
}
// this function is used to compare 2 float numbers
function equalf($float1, $float2)
{
  return round($float1, 3) === round($float2, 3);
}
// print the result in red and bigger text
function printRed($string)
{
  echo "<h2 style='color: red'>$string</h2>";
}

$movieInfo =
  [
    "ACT" => [
      "title" => "Avengers: Endgame",
      "rating" => "PG-13",
      "src" => "https://www.youtube.com/embed/TcMBFSGVi1c",
      "plot" => "After the devastating events of Avengers=> Infinity War (2018), the universe is in ruins due to the efforts of the Mad Titan, Thanos. With the help of remaining allies, the Avengers must assemble once more in order to undo Thanos's actions and undo the chaos to the universe, no matter what consequences may be in store, and no matter who they face...",
      "time" => [
        "MON" => "", "TUE" => "", "WED" => "T21", "THU" => "T21", "FRI" => "T21", "SAT" => "T18", "SUN" => "T18"
      ]
    ],
    "RMC" => [
      "title" => "Top End Wedding",
      "rating" => "M",
      "src" => "https://www.youtube.com/embed/uoDBvGF9pPU",
      "plot" => "From the makers of The Sapphires, TOP END WEDDING is a celebration of love, family and belonging, set against the spectacular natural beauty of the Northern Territory. This heartwarming romantic comedy tells the story of successful Adelaide lawyer Lauren (Tapsell) and her fiancé Ned (Lee). Engaged and in love, they have just ten days to pull off their dream Top End Wedding. First though, they need track down Lauren's mother, who has gone AWOL somewhere in the Northern Territory.",
      "time" => [
        "MON" => "T18", "TUE" => "T18", "WED" => "", "THU" => "", "FRI" => "", "SAT" => "T15", "SUN" => "T15"
      ]
    ],
    "ANM" => [
      "title" => "Dumbo",
      "rating" => "PG",
      "src" => "https://www.youtube.com/embed/7NiYVoqBt-8",
      "plot" => "The stork delivers a baby elephant to Mrs. Jumbo, veteran of the circus, but the newborn is ridiculed because of his truly enormous ears and dubbed 'Dumbo'. After being separated from his mother, Dumbo is relegated to the circus' clown acts; it is up to his only friend, a mouse, to assist Dumbo to achieve his full potential.",
      "time" => [
        "MON" => "T12", "TUE" => "T12", "WED" => "T18", "THU" => "T18", "FRI" => "T18", "SAT" => "T12", "SUN" => "T12"
      ]
    ],
    "AHF" => [
      "title" => "The Happy Prince",
      "src" => "https://www.youtube.com/embed/tXANCJQkUIE",
      "plot" => "The untold story of the last days in the tragic times of Oscar Wilde, a person who observes his own failure with ironic distance and regards the difficulties that beset his life with detachment and humor.",
      "rating" => "R",
      "time" => [
        "MON" => "", "TUE" => "", "WED" => "T12", "THU" => "T12", "FRI" => "T12", "SAT" => "T21", "SUN" => "T21"
      ]
    ]
  ];
$priceList = ["STA" => [19.80, 14.00], "STP" => [17.50, 12.50], "STC" => [15.3, 11.00], "FCA" => [30.00, 24.00], "FCP" => [27.00, 22.50], "FCC" => [24.00, 21.00]];
php2js($movieInfo, "movieInfo");
php2js($priceList, "priceList");


$warning = $nameErr = $priceErr = $emailErr = $phoneErr = $cardErr = $expiryErr = "";
$price = 0;
$maxTicketsPerSeat = 10;
$isFieldMissing = false;
$isErrorFound = false;

// impure
function filterPost2D($k1, $k2)
{
  global $isFieldMissing;
  if (isset($_POST[$k1][$k2])) {
    $_POST[$k1][$k2] = test_input($_POST[$k1][$k2]);
  } else {
    $isFieldMissing = true;
  }
}
// impure
function filterPost($k)
{
  global $isFieldMissing;
  if (isset($_POST[$k])) {
    $_POST[$k] = test_input($_POST[$k]);
  } else {
    $isFieldMissing = true;
  }
}

function displayError($error)
{
  if ($error) echo "<label style='color:red'>$error</label>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Sanitize all fields and check if they are submitted
  filterPost2D("movie", "id");
  filterPost2D("movie", "day");
  filterPost2D("movie", "hour");
  filterPost2D("seats", "STA");
  filterPost2D("seats", "STP");
  filterPost2D("seats", "STC");
  filterPost2D("seats", "FCA");
  filterPost2D("seats", "FCP");
  filterPost2D("seats", "FCC");
  filterPost2D("cust", "name");
  filterPost2D("cust", "mobile");
  filterPost2D("cust", "email");
  filterPost2D("cust", "card");
  filterPost2D("cust", "expiry");
  filterPost("order");
  if ($isFieldMissing) {
    $isErrorFound = true;
    $warning = "Are you trying to hack our website ???";
  } else {
    // Check if the movie hour is available
    if ($movieInfo[$_POST["movie"]["id"]]["time"][$_POST["movie"]["day"]] != $_POST["movie"]["hour"]) {
      $warning = "Are you trying to hack our website ???";
    }
    // Check name
    if (!preg_match("/[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/", $_POST["cust"]["name"])) {
      $nameErr = "Name is not valid";
      $isErrorFound = true;
    }
    // Check email
    if (!filter_var($_POST["cust"]["email"], FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email";
      $isErrorFound = true;
    }
    // Check phone number
    if (!preg_match("/^(\(04\)|04|\+614)( ?\d){8}$/", $_POST["cust"]["mobile"])) {
      $phoneErr = "Please enter an Australian mobile number (starts with 04 or +614)";
      $isErrorFound = true;
    }
    // Check card number
    if (!preg_match("/^(\d\s?){14,19}$/", $_POST["cust"]["card"])) {
      $cardErr = "Card number should have between 14 and 19 digits";
      $isErrorFound = true;
    }
    // Check expiry
    if (!preg_match("/^[0-9]{4}-[0-9]{2}$/", $_POST['cust']['expiry'])) {
      $expiryErr = "Invalid expiry date";
      $isErrorFound = true;
    } else {
      $minimumDate = new DateTime();
      $minimumDate->add(new DateInterval('P28D'));
      // with only month and year, expiry date will have the first day of the month as default
      // therefore, expiry date MUST NOT be within 28 days of the purchase date by comparing months only
      // for example, when comparing a day in May and a day in June, there may be < 28 days intervals
      // however, when comparing a day in May and a day in July, there are not any < 28 days intervals
      // which means it is always valid.
      $expiryDate = new DateTime($_POST['cust']['expiry']);
      if ($expiryDate < $minimumDate) {
        $expiryErr = "Expiry date cannot be within 28 days of the purchase date";
        $isErrorFound = true;
      }
    }
    // Check if seats value are numeric before calculating price
    foreach ($_POST["seats"] as $seat => $value) {
      if ($value == "") continue;
      if (!is_numeric($value)) {
        $warning = "Are you trying to hack our website ???";
        $isErrorFound = true;
        break;
      }
      if ($value > $maxTicketsPerSeat) {
        $warning = "Are you trying to hack our website ???";
        $isErrorFound = true;
        break;
      }
      if (
        $_POST["movie"]["day"] === "MON"
        || $_POST["movie"]["day"] === "WED"
        || (in_array($_POST["movie"]["day"], ["MON", "TUE", "WED", "THU", "FRI"]) && $_POST["movie"]["hour"] === "T12")
      ) {
        $price += $priceList[$seat][1] * $value;
      } else {
        $price += $priceList[$seat][0] * $value;
      }
    }
    if ($price == 0) {
      $priceErr = "Please book a ticket";
      $isErrorFound = true;
    } 
    if (!$isErrorFound) {
      header("Location: receipt.php");
      printRed("Tickets processed. Price: " . $price);
    }
  }
}
