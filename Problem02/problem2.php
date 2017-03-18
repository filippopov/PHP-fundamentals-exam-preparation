<?php
//$_GET = array (
//    'dateOne' => '17-12-2014',
//    'dateTwo' => '31-12-2014',
//    'holidays' => '31-12-2014
//24-12-2014
//08-12-2014',
//);

$dateOne = new DateTime($_GET['dateOne']);
$dateTwo = new DateTime($_GET['dateTwo']);
$holidays = explode(PHP_EOL, $_GET['holidays']);

$result = '';
for ($i = $dateOne; $i <= $dateTwo; $i->modify('+1 day')) {
    $dayString = $i->format('d-m-Y');
    if (in_array($dayString, $holidays)) {
        continue;
    }

    if ($i->format('l') == 'Sunday' || $i->format('l') == 'Saturday') {
        continue;
    }

    $result .= "<li>$dayString</li>";
}

if (empty($result)) {
    echo "<h2>No workdays</h2>";
} else {
    echo '<ol>';
    echo $result;
    echo '</ol>';
}