<?php
$lines = file('attack.php');
array_shift($lines);
$code = implode('', $lines);

echo $code;
$chunks = base64_encode($code);
echo "base64_decode('$chunks');";

//print_r(eval(base64_decode($chunks)));
