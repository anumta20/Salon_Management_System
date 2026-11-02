CREATE DATABASE IF NOT EXISTS salon_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE salon_db;

CREATE TABLE IF NOT EXISTS services (
    id           INT AUTO_INCREMENT PRIMARY KEY,
    name         VARCHAR(120) NOT NULL,
    description  VARCHAR(255) DEFAULT NULL,
    price        DECIMAL(10,2) NOT NULL DEFAULT 0,
    duration_min INT NOT NULL DEFAULT 30,
    icon         VARCHAR(20) DEFAULT NULL,
    is_featured  TINYINT(1) NOT NULL DEFAULT 0,
    status       TINYINT(1) NOT NULL DEFAULT 1,
    created_at   TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO services (name, description, price, duration_min, icon, is_featured) VALUES
('Hair Cut & Styling', 'Trendy cuts and styling by expert stylists.', 1500, 45, '✂️', 1),
('Hair Color', 'Global color, highlights and balayage.', 5000, 120, '🎨', 1),
('Facial & Skin Care', 'Deep cleansing facials for glowing skin.', 3000, 60, '✨', 1),
('Bridal Makeup', 'Complete bridal look with premium products.', 25000, 180, '💄', 1),
('Manicure & Pedicure', 'Relaxing hand and foot care.', 2500, 60, '💅', 1),
('Hair Spa', 'Nourishing treatment for healthy hair.', 3500, 75, '🧖', 1);