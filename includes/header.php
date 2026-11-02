<?php
require_once __DIR__ . '/config.php';
$pageTitle   = $pageTitle   ?? SITE_NAME;
$currentPage = $currentPage ?? 'home';
$navServices = get_services();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($pageTitle) ?> | <?= e(SITE_NAME) ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<header class="site-header">
    <div class="container header-inner">
        <a href="index.php" class="logo"><?= e(SITE_NAME) ?></a>

        <button class="nav-toggle" id="navToggle" aria-label="Toggle menu">☰</button>

        <nav class="main-nav" id="mainNav">
            <ul>
                <li><a href="index.php" class="<?= $currentPage === 'home' ? 'active' : '' ?>">Home</a></li>

                <li class="has-dropdown">
                    <a href="services.php" class="<?= $currentPage === 'services' ? 'active' : '' ?>">Services ▾</a>
                    <ul class="dropdown">
                        <?php foreach ($navServices as $s): ?>
                            <li><a href="services.php?id=<?= (int) $s['id'] ?>"><?= e($s['name']) ?></a></li>
                        <?php endforeach; ?>
                        <li class="dropdown-all"><a href="services.php">View All Services</a></li>
                    </ul>
                </li>

                <li><a href="booking.php" class="<?= $currentPage === 'booking' ? 'active' : '' ?>">Booking</a></li>
                <li><a href="feedback.php" class="<?= $currentPage === 'feedback' ? 'active' : '' ?>">Feedback</a></li>
                <li><a href="contact.php" class="<?= $currentPage === 'contact' ? 'active' : '' ?>">Contact</a></li>
            </ul>
        </nav>
    </div>
</header>