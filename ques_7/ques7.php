<?php

$rng = range(11, 20);
shuffle($rng);
echo "Input is: 11, 20";
echo "<br>";
echo "Output is: ";
for ($i = 0; $i < 10; $i++) {
    echo $rng[$i] . ' ';
}
