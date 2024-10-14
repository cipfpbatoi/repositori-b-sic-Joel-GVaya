<?php
session_start();
session_destroy();
header("Location: projecte.php");
exit;
