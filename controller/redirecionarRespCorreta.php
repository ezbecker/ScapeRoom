<?php
$link = $_GET['link'];
sleep(1);
header('Location: ' . $link);
exit;
