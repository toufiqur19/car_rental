## Car Rental Laravel Project
This car rental project was built using the Laravel framework, which provides a web application for managing car rental operations.

## Presentation Video
https://drive.google.com/file/d/14m54e-9qNo6u1204GkLDZKUFd8BN4rWr/view?usp=sharing

## Authentication:
 - Role-Based Access Control(admin, Customers).
 - Sign up, log in, and log out.
 - Admin Access to the admin dashboard for managing cars, rentals, and customers.
 - Customer Access to the front end for browsing cars and booking rentals.

## Admin Panel:
 - Manage cars, rentals, customers, and dashboards.
 - Admin CRUD operations for cars, rentals, and customers.

## User Side:
 - Users can browse available cars, and filter by brand, type, and price.
 - Make bookings by selecting a car and date range.
 - View booking history.

## Main Features:
 - Protect Routes: only logged-in users can book cars and view booking history.
 - Car Management: Admin can add, edit, and delete cars.
 - Booking System: Users can book cars for specific dates.
 - Email Notifications: For booking confirmations to customers and admin.
 - Rental History: Users can view current and past rentals.

## Dashboard Overview:
 - Statistics: Total cars, available cars, total rentals, and total earnings from rentals.

## Installation:
 - Clone the repository: `https://github.com/toufiqur19/car_rental`
 - Navigate to the project directory: `cd car_rental`
 - Install the dependencies using Composer: `composer install`
 - Create a copy of the `.env.example` file and rename it to `.env`
 - Update the database Name in the `.env` file.
 - Run: `php artisan key:generate`
 - Run: `npm install && npm run dev`
 - Run the database migrations: `php artisan migrate:fresh --seed`
 - Create the storage link: `php artisan storage:link`
 - Start the development server: `php artisan serve`
 - Visit `http://localhost:8000` in your browser to access the application.

## Conclusion:
 - This app will allow customers to rent cars online and manage their bookings easily, while the admin can efficiently control the fleet and handle customer orders.


