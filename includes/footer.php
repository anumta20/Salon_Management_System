
<footer class="site-footer">
    <div class="container footer-grid">
        <div>
            <h3 class="footer-logo"><?= e(SITE_NAME) ?></h3>
            <p>Your destination for beauty, style and relaxation. Book your appointment online in minutes.</p>
        </div>

        <div>
            <h4>Quick Links</h4>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="booking.php">Booking</a></li>
                <li><a href="feedback.php">Feedback</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </div>

        <div>
            <h4>Contact</h4>
            <ul>
                <li>📍 <?= e(SITE_ADDRESS) ?></li>
                <li>📞 <?= e(SITE_PHONE) ?></li>
                <li>✉️ <?= e(SITE_EMAIL) ?></li>
                <li>🕒 <?= e(SITE_HOURS) ?></li>
            </ul>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            &copy; <?= date('Y') ?> <?= e(SITE_NAME) ?>. All rights reserved.
        </div>
    </div>
</footer>

<script>
    document.getElementById('navToggle').addEventListener('click', function () {
        document.getElementById('mainNav').classList.toggle('open');
    });
    // Mobile: tap on Services to open dropdown
    document.querySelectorAll('.has-dropdown > a').forEach(function (a) {
        a.addEventListener('click', function (ev) {
            if (window.innerWidth <= 900) {
                ev.preventDefault();
                a.parentElement.classList.toggle('open');
            }
        });
    });
</script>
</body>
</html>