<?php
// ---- Site settings ----
define('SITE_NAME', 'Glamour Salon');
define('SITE_PHONE', '+92 300 1234567');
define('SITE_EMAIL', 'info@glamoursalon.com');
define('SITE_ADDRESS', 'Shop 12, Main Boulevard, Karachi, Pakistan');
define('SITE_HOURS', 'Mon - Sat: 10:00 AM - 9:00 PM');

// ---- MySQL settings ----
define('DB_HOST', 'localhost');
define('DB_NAME', 'salon_db');
define('DB_USER', 'root');
define('DB_PASS', '');

// Returns a PDO connection, or null if the database is unreachable
function db(): ?PDO
{
    static $pdo = null;
    if ($pdo === null) {
        try {
            $pdo = new PDO(
                'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4',
                DB_USER,
                DB_PASS,
                [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                ]
            );
        } catch (PDOException $e) {
            return null;
        }
    }
    return $pdo;
}

// Safe output helper
function e($value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

// Fetch active services (optionally only featured ones)
function get_services(bool $featuredOnly = false, int $limit = 0): array
{
    $pdo = db();
    if ($pdo) {
        try {
            $sql = "SELECT id, name, description, price, duration_min, icon
                    FROM services WHERE status = 1";
            if ($featuredOnly) {
                $sql .= " AND is_featured = 1";
            }
            $sql .= " ORDER BY id ASC";
            if ($limit > 0) {
                $sql .= " LIMIT " . (int) $limit;
            }
            $rows = $pdo->query($sql)->fetchAll();
            if ($rows) {
                return $rows;
            }
        } catch (PDOException $e) {
            // fall through to demo data
        }
    }

    // Demo data (used only if DB is empty / not connected yet)
    $demo = [
        ['id' => 1, 'name' => 'Hair Cut & Styling', 'description' => 'Trendy cuts and styling by expert stylists.', 'price' => 1500, 'duration_min' => 45, 'icon' => '✂️'],
        ['id' => 2, 'name' => 'Hair Color', 'description' => 'Global color, highlights and balayage.', 'price' => 5000, 'duration_min' => 120, 'icon' => '🎨'],
        ['id' => 3, 'name' => 'Facial & Skin Care', 'description' => 'Deep cleansing facials for glowing skin.', 'price' => 3000, 'duration_min' => 60, 'icon' => '✨'],
        ['id' => 4, 'name' => 'Bridal Makeup', 'description' => 'Complete bridal look with premium products.', 'price' => 25000, 'duration_min' => 180, 'icon' => '💄'],
        ['id' => 5, 'name' => 'Manicure & Pedicure', 'description' => 'Relaxing hand and foot care.', 'price' => 2500, 'duration_min' => 60, 'icon' => '💅'],
        ['id' => 6, 'name' => 'Hair Spa', 'description' => 'Nourishing treatment for healthy hair.', 'price' => 3500, 'duration_min' => 75, 'icon' => '🧖'],
    ];
    return $limit > 0 ? array_slice($demo, 0, $limit) : $demo;
}