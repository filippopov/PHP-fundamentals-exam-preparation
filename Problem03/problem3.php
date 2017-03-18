<?php
//$_GET = array (
//    'text' => 'The Milky Way is the galaxy that contains our star system',
//    'lineLength' => '10',
//);

$text = $_GET['text'];
$lineLength = $_GET['lineLength'];

$row = 0;
$col = 0;

$matrix = [];

for ($i = 0; $i < strlen($text); $i++) {
    if ($i % $lineLength === 0 && $i !== 0) {
        $row++;
    }
    $col = $i - ($row * $lineLength)  ;
    $matrix[$row][$col] = $text[$i];
}

$maxCol = count($matrix) - 1;

$lastRow = count($matrix[$maxCol]);

if ($lineLength > $lastRow) {
    for ($i = $lastRow; $i < $lineLength; $i++) {
        $matrix[$maxCol][$i] = ' ';
    }
}

for ($c = 0; $c < $lineLength; $c++) {
    $spaces = 0;
    for ($r = count($matrix) - 1; $r >= 0 ; $r--) {
        if($matrix[$r][$c] == ' ') {
            $spaces++;
        } else {
            $temp = $matrix[$r][$c];
            $matrix[$r][$c] = ' ';
            $matrix[$r + $spaces][$c] = $temp;
        }
    }
}

echo '<table>';
foreach ($matrix as $row) {
    echo '<tr>';
        foreach ($row as $col) {
            echo "<td>" . htmlspecialchars($col) . "</td>";
        }
    echo '</tr>';
}
echo '<table>';