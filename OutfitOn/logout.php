<?php
session_start();
session_unset();  // remove all session variables
session_destroy();  // destroy the session

// Store message in URL using query string
header("Location: login.php?logout=success");
exit();
