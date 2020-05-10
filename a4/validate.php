<?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
      $_SESSION["data"] = $_POST;
      header("Location: receipt.php");
    }
  }
}
