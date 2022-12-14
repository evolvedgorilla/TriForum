<?php
session_start();
session_unset();

// Poistetaan PHPSESSID eväste
$params = session_get_cookie_params();
setcookie("PHPSESSID", '', time() - 42000, $params["path"]);

// Poistetaan istunto
session_destroy();

header('Location: index.php', true, 301);
?>