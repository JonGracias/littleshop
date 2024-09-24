
-- List databases to confirm current setup
SHOW DATABASES;

-- List tables to confirm current setup
SHOW TABLES;

-- Drop the database if it exists
DROP DATABASE IF EXISTS littleshop_db;

-- Create a new database
CREATE DATABASE littleshop_db;

-- Select the new database
USE littleshop_db;

-- Drop tables if they exist
DROP TABLE IF EXISTS vamps;
DROP TABLE IF EXISTS abilities;
DROP TABLE IF EXISTS vamp_abilities;

-- Plants entity
CREATE TABLE vamps (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    type VARCHAR(255) NOT NULL,
    rarity VARCHAR(255) NOT NULL,
    hp INT NOT NULL,
    defense INT NOT NULL,
    stage ENUM('egg', 'stage1', 'stage2', 'stage3') NOT NULL,
    image_url VARCHAR(255) NOT NULL
);

-- Abilities entity
CREATE TABLE abilities (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ability_name VARCHAR(255) NOT NULL,
    ability_description TEXT NOT NULL,
    ability_cost INT NOT NULL
);

-- Associative entity
CREATE TABLE vamp_abilities (
    id INT AUTO_INCREMENT PRIMARY KEY,
    vamp_id INT NOT NULL,
    ability_id INT NOT NULL,
    FOREIGN KEY (vamp_id) REFERENCES vamps(id),
    FOREIGN KEY (ability_id) REFERENCES abilities(id)
);

-- Insert abilities into the abilities table
INSERT INTO abilities (ability_name, ability_description, ability_cost) VALUES ('Rapid Growth', 'Grows rapidly when fed', 3);
INSERT INTO abilities (ability_name, ability_description, ability_cost) VALUES ('Strength', 'Possesses considerable physical strength', 3);
INSERT INTO abilities (ability_name, ability_description, ability_cost) VALUES ('Intelligence', 'Displays a high level of sentience and intelligence', 3);
INSERT INTO abilities (ability_name, ability_description, ability_cost) VALUES ('Parasitic', 'Drains resources from its environment and caretaker', 3);

-- Select all entries from vamps to confirm setup
SELECT * FROM vamps;

-- Select all entries from abilities to confirm setup
SELECT * FROM abilities;

-- Select all entries from vamp_abilities to confirm setup
SELECT * FROM vamp_abilities;