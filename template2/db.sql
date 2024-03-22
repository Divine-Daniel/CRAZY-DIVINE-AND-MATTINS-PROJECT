
CREATE DATABASE IF NOT EXISTS `user_profiles`;

USE `user_profiles`;



-- Table for user profiles
CREATE TABLE IF NOT EXISTS `profiles` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `access_key` VARCHAR(255) NOT NULL
);

-- Table for login credentials
CREATE TABLE IF NOT EXISTS `credentials` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `profile_id` INT NOT NULL,
    `username` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    FOREIGN KEY (`profile_id`) REFERENCES `profiles` (`id`)
);

-- Table for additional profile details
CREATE TABLE IF NOT EXISTS `profile_details` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `profile_id` INT NOT NULL,
    `title` VARCHAR(10),
    FOREIGN KEY (`profile_id`) REFERENCES `profiles` (`id`)
);
