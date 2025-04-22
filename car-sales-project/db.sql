-- Database: car_sales_db

CREATE DATABASE IF NOT EXISTS car_sales_db;
USE car_sales_db;

-- Table structure for table `users`
CREATE TABLE IF NOT EXISTS users (
  userID INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  email VARCHAR(100) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  phoneNumber VARCHAR(20),
  role ENUM('buyer', 'seller', 'admin') NOT NULL DEFAULT 'buyer',
  date_registered TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  lastLogin TIMESTAMP NULL DEFAULT NULL,
  profilePicture VARCHAR(255) DEFAULT NULL
);

-- Table structure for table `users_profile`
CREATE TABLE IF NOT EXISTS users_profile (
  profileID INT AUTO_INCREMENT PRIMARY KEY,
  userID INT NOT NULL,
  fullName VARCHAR(100),
  address VARCHAR(255),
  city VARCHAR(100),
  country VARCHAR(100),
  bio TEXT,
  FOREIGN KEY (userID) REFERENCES users(userID) ON DELETE CASCADE
);

-- Table structure for table `cars`
CREATE TABLE IF NOT EXISTS cars (
  carID INT AUTO_INCREMENT PRIMARY KEY,
  sellerID INT NOT NULL,
  model VARCHAR(100) NOT NULL,
  year INT NOT NULL,
  mileage INT,
  price DECIMAL(10,2) NOT NULL,
  description TEXT,
  location VARCHAR(255),
  dateListed TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  makeID INT NOT NULL,
  status ENUM('available', 'sold') DEFAULT 'available',
  FOREIGN KEY (sellerID) REFERENCES users(userID) ON DELETE CASCADE
);

-- Table structure for table `cars_images`
CREATE TABLE IF NOT EXISTS cars_images (
  imageID INT AUTO_INCREMENT PRIMARY KEY,
  carID INT NOT NULL,
  imageUrl VARCHAR(255) NOT NULL,
  FOREIGN KEY (carID) REFERENCES cars(carID) ON DELETE CASCADE
);

-- Table structure for table `favorites`
CREATE TABLE IF NOT EXISTS favorites (
  favoriteID INT AUTO_INCREMENT PRIMARY KEY,
  userID INT NOT NULL,
  carID INT NOT NULL,
  dateAdded TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (userID) REFERENCES users(userID) ON DELETE CASCADE,
  FOREIGN KEY (carID) REFERENCES cars(carID) ON DELETE CASCADE
);

-- Table structure for table `cars_models`
CREATE TABLE IF NOT EXISTS cars_models (
  makeID INT NOT NULL,
  makeName VARCHAR(100) NOT NULL,
  modelID INT NOT NULL,
  modelName VARCHAR(100) NOT NULL,
  PRIMARY KEY (makeID, modelID)
);

-- Table structure for table `advertisements` (optional)
CREATE TABLE IF NOT EXISTS advertisements (
  adID INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  content TEXT,
  imageUrl VARCHAR(255),
  startDate DATE
);

-- Sample data for `cars_models`
INSERT INTO cars_models (makeID, makeName, modelID, modelName) VALUES
(1, 'Toyota', 1, 'Camry'),
(1, 'Toyota', 2, 'Corolla'),
(2, 'Honda', 1, 'Civic'),
(2, 'Honda', 2, 'Accord');

-- Sample data for `users`
INSERT INTO users (username, email, password, phoneNumber, role) VALUES
('admin', 'admin@example.com', '$2y$10$e0NRzQ6Q6Q6Q6Q6Q6Q6Q6O6Q6Q6Q6Q6Q6Q6Q6Q6Q6Q6Q6Q6Q6Q6Q6', '1234567890', 'admin'),
('seller1', 'seller1@example.com', '$2y$10$e0NRzQ6Q6Q6Q6Q6Q6Q6Q6O6Q6Q6Q6Q6Q6Q6Q6Q6Q6Q6Q6Q6Q6Q6Q6', '0987654321', 'seller'),
('buyer1', 'buyer1@example.com', '$2y$10$e0NRzQ6Q6Q6Q6Q6Q6Q6Q6O6Q6Q6Q6Q6Q6Q6Q6Q6Q6Q6Q6Q6Q6Q6Q6', '1122334455', 'buyer');

-- Sample data for `users_profile`
INSERT INTO users_profile (userID, fullName, address, city, country, bio) VALUES
(1, 'Admin User', '123 Admin St', 'Admin City', 'Adminland', 'Administrator of the site'),
(2, 'Seller One', '456 Seller Rd', 'Sellertown', 'Selland', 'Car seller'),
(3, 'Buyer One', '789 Buyer Ave', 'Buyerville', 'Buyland', 'Car buyer');
