<?php

echo "<script> console.log('Deleted Cookie') </script>";
setcookie('logged_in', '', time() - 3600, '/');
header('Location: ../index.php');

?>