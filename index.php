<?php
$pageTitle   = 'Home';
$currentPage = 'home';
require_once __DIR__ . '/includes/header.php';

$featured    = get_services(true, 6);
$allServices = get_services();
?>

<!-- ============ BANNER + BOOK APPOINTMENT ============ -->
<section class="hero">
    <div class="container hero-inner">
        <div class="hero-text">
            <span class="hero-tag">Welcome to <?= e(SITE_NAME) ?></span>
            <h1>Look Good. Feel Beautiful.</h1>
            <p>Professional hair, skin and beauty services by expert stylists. Reserve your slot online and skip the wait.</p>
            <a href="services.php" class="btn btn-outline">Explore Services</a>
        </div>

        <div class="book-card" id="book">
            <h2>Book Appointment</h2>
            <form action="booking.php" method="post">
                <div class="form-row">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" placeholder="Your name" required>
                </div>

                <div class="form-row">
                    <label for="phone">Phone</label>
                    <input type="tel" id="phone" name="phone" placeholder="03XX XXXXXXX" required>
                </div>

                <div class="form-row">
                    <label for="service_id">Service</label>
                    <select id="service_id" name="service_id" required>
                        <option value="">-- Select Service --</option>
                        <?php foreach ($allServices as $s): ?>
                            <option value="<?= (int) $s['id'] ?>"><?= e($s['name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-two">
                    <div class="form-row">
                        <label for="date">Date</label>
                        <input type="date" id="date" name="appointment_date" min="<?= date('Y-m-d') ?>" required>
                    </div>
                    <div class="form-row">
                        <label for="time">Time</label>
                        <input type="time" id="time" name="appointment_time" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Book Now</button>
            </form>
        </div>
    </div>
</section>

<!-- ============ FEATURED SERVICES ============ -->
<section class="section">
    <div class="container">
        <div class="section-head">
            <span class="section-tag">What We Offer</span>
            <h2>Featured Services</h2>
            <p>Our most loved treatments, delivered with care and quality products.</p>
        </div>

        <div class="services-grid">
            <?php foreach ($featured as $s): ?>
                <article class="service-card">
                    <div class="service-icon"><?= e($s['icon'] ?: '💇') ?></div>
                    <h3><?= e($s['name']) ?></h3>
                    <p><?= e($s['description']) ?></p>
                    <div class="service-meta">
                        <span class="price">Rs. <?= number_format((float) $s['price']) ?></span>
                        <span class="duration">⏱ <?= (int) $s['duration_min'] ?> min</span>
                    </div>
                    <a href="booking.php?service_id=<?= (int) $s['id'] ?>" class="btn btn-small">Book This</a>
                </article>
            <?php endforeach; ?>
        </div>

        <div class="center mt">
            <a href="services.php" class="btn btn-primary">View All Services</a>
        </div>
    </div>
</section>

<!-- ============ CONTACT DETAILS ============ -->
<section class="section section-alt">
    <div class="container">
        <div class="section-head">
            <span class="section-tag">Get In Touch</span>
            <h2>Contact Details</h2>
            <p>Visit us, call us or send a message. We would love to hear from you.</p>
        </div>

        <div class="contact-grid">
            <div class="contact-box">
                <div class="contact-icon">📍</div>
                <h4>Address</h4>
                <p><?= e(SITE_ADDRESS) ?></p>
            </div>
            <div class="contact-box">
                <div class="contact-icon">📞</div>
                <h4>Phone</h4>
                <p><a href="tel:<?= e(preg_replace('/\s+/', '', SITE_PHONE)) ?>"><?= e(SITE_PHONE) ?></a></p>
            </div>
            <div class="contact-box">
                <div class="contact-icon">✉️</div>
                <h4>Email</h4>
                <p><a href="mailto:<?= e(SITE_EMAIL) ?>"><?= e(SITE_EMAIL) ?></a></p>
            </div>
            <div class="contact-box">
                <div class="contact-icon">🕒</div>
                <h4>Opening Hours</h4>
                <p><?= e(SITE_HOURS) ?></p>
            </div>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>