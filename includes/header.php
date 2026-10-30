<?php
require_once __DIR__ . '/config.php';
$page_title = $page_title ?? 'Precision Car Care & Mechanical Parts';
$current = basename($_SERVER['SCRIPT_NAME']);
function nav_active(string $file, string $current): string { return $file === $current ? ' class="active"' : ''; }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= e($page_title) ?> | <?= e(SITE_NAME) ?> Private Limited</title>
<meta name="description" content="KK Automotive Private Limited - engine, brakes, suspension, transmission and complete mechanical car care.">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@500;600;700;800&family=Barlow:wght@400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<header class="site-header">
  <div class="container nav-wrap">
    <a href="index.php" class="brand" aria-label="KK Automotive home">
      <img src="assets/img/logo.jpg" alt="KK Automotive Private Limited logo">
    </a>
    <button class="nav-toggle" aria-label="Toggle menu" aria-expanded="false">
      <span></span><span></span><span></span>
    </button>
    <nav class="main-nav" id="mainNav">
      <a href="index.php"<?= nav_active('index.php', $current) ?>>Home</a>
      <a href="index.php#services">Services</a>
      <a href="index.php#parts">Parts</a>
      <a href="index.php#why">Why Us</a>
      <a href="index.php#contact">Contact</a>
      <?php if (is_logged_in()): ?>
        <span class="hello">Hi, <?= e($_SESSION['user_name'] ?? 'Driver') ?></span>
        <a href="logout.php" class="btn btn-outline btn-sm">Logout</a>
      <?php else: ?>
        <a href="login.php"<?= nav_active('login.php', $current) ?>>Login</a>
        <a href="signup.php" class="btn btn-red btn-sm">Sign Up</a>
      <?php endif; ?>
    </nav>
  </div>
</header>
<main>
