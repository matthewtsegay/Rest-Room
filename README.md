# Restroom Booking System


## Description

The Restroom Booking System is a web application that allows users to register, authenticate, and manage restroom bookings. The system includes user authentication, customer management (add, edit/reset, delete), and booking management. The frontend is built using HTML, CSS, and Bootstrap, while the backend is developed in PHP with MySQL as the database, managed through XAMPP.

## Features

- User authentication (login, registration, logout)

- Add, edit/reset, and delete customers

- Book and manage restroom reservations

- Responsive design using Bootstrap

- Database management using MySQL

## Technologies Used

- **Frontend:** HTML, CSS, Bootstrap

- **Backend:** PHP

- **Database:** MySQL (managed via XAMPP)

- **Server:** Apache (via XAMPP)

## Installation Guide

### Prerequisites

1. Install **XAMPP**: [Download XAMPP](https://www.apachefriends.org/index.html)

2. Start **Apache** and **MySQL** from XAMPP Control Panel

3. Create a database in phpMyAdmin


### Steps to Setup

1. **Clone the repository**

```sh

git clone https://github.com/yourusername/restroom-booking.git

```

2. **Move the project to the XAMPP htdocs folder**

```sh

mv restroom-booking /xampp/htdocs/

```

3. **Create a Database**

- Open `phpMyAdmin` in your browser: `http://localhost/phpmyadmin/`

- Create a new database: `restroom_db`

- Import `database.sql` (provided in the project)

4. **Configure Database Connection**

- Open `config.php` in the project folder

- Update the database credentials:

```php

<?php

$host = "localhost";

$user = "root";

$password = ""; // Default for XAMPP

$dbname = "restroom_db";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {

die("Connection failed: " . $conn->connect_error);

}

?>

```


5. **Run the Project**

- Open your browser and go to:

```

http://localhost/restroom-booking/

```

- Register a new user and log in.


## Folder Structure

```

restroom-booking/

│── index.php # Homepage

│── login.php # User authentication

│── register.php # User registration

│── dashboard.php # Admin dashboard

│── add_customer.php # Add new customer

│── edit_customer.php # Edit customer details

│── delete_customer.php # Delete customer

│── config.php # Database configuration

│── styles/ # CSS files

│── scripts/ # JavaScript files

│── assets/ # Images & static files

│── database.sql # Database schema & sample data

```


## Usage

1. **User Authentication**

- New users must register before logging in.

- Login with a registered email and password.


2. **Customer Management**

- Admin can add new customers.

- Customers can be edited or their details reset.

- Customers can be deleted if no longer needed.


3. **Booking System**

- Users can book a restroom slot.

- Admin can view and manage all bookings.


## Contributions

Feel free to contribute by submitting pull requests.


## Contact

For any issues or support, email **matyostsegay@gmail.com**.