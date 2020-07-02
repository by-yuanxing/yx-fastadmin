<?php
$state = md5(uniqid(rand(), true));
echo $state;
echo phpinfo();
?>