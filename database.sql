CREATE DATABASE IF NOT EXISTS php_blog CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE php_blog;

DROP TABLE IF EXISTS clanky;
DROP TABLE IF EXISTS pouzivatelia;

CREATE TABLE pouzivatelia (
    id INT AUTO_INCREMENT PRIMARY KEY,
    meno VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    heslo VARCHAR(255) NOT NULL,
    vytvorene DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE clanky (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pouzivatel_id INT NOT NULL,
    nazov VARCHAR(255) NOT NULL,
    perex TEXT,
    obsah TEXT NOT NULL,
    publikovany TINYINT(1) DEFAULT 1,
    vytvorene DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (pouzivatel_id) REFERENCES pouzivatelia(id) ON DELETE CASCADE
);

INSERT INTO pouzivatelia (meno, email, heslo) VALUES
('admin', 'admin@blog.sk', '$2y$12$4uLm2QRRUrXjrKKsFe2WtuD97cGKeuGaaibREbZJYh0D5DTZX2C9y');

INSERT INTO clanky (pouzivatel_id, nazov, perex, obsah, publikovany) VALUES
(1, 'Prvy clanok', 'Toto je kratky uvod k prvemu clanku.', 'Toto je obsah prveho clanku. Zatial je jednoduchy, ale funguje.', 1),
(1, 'Druhy clanok', 'Toto je kratky uvod k druhemu clanku.', 'Toto je obsah druheho clanku. Neskor sem dame realne data z admina.', 1),
(1, 'Treti clanok', 'Toto je kratky uvod k tretiemu clanku.', 'Aj tento clanok je len ukazkovy. Dolezite je, ze sa nacitava z databazy.', 1);