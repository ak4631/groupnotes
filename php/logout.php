<?php

session_start();
session_destroy();
echo "<script>window.open('../JoinGp.html','_self');</script>";

?>