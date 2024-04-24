<?php
session_start();
session_destroy();

// Mengarahkan pengguna ke halaman login
header('Location: ../login/index.php');
exit;
?>
