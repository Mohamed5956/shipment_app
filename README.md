# Laravel Shipment Management System

This is a Laravel-based shipment management system that allows users to create, update, and manage shipments. The system calculates prices based on shipment weight and tracks the status of each shipment. When a shipment is marked as "Done", corresponding journal entries are automatically created.

## Features

- Create and manage shipments
- Calculate shipment prices based on weight
- Track shipment status
- Automatically create journal entries when a shipment is marked as "Done"
- Prevent further updates on shipments once marked as "Done"

## Prerequisites

- PHP >= 7.4
- Composer
- Laravel 8.x
- MySQL

## Installation

### Clone the Repository

```bash
git clone https://github.com/your-username/laravel-shipment-management.git
cd laravel-shipment-management

Install Dependencies

composer install
npm install
npm run dev

Environment Setup
1. Copy the .env.example file to .env:
cp .env.example .env

2. Generate an application key:
php artisan key:generate

3. Configure your .env file with your database credentials:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password


4. Run Migrations
php artisan migrate

5. Start the Development Server
php artisan serve

Usage
Creating a Shipment
Go to the shipments creation page.
Fill in the required fields (code, shipper, weight, description, image, status).
Click on the "Create" button.
Updating a Shipment
Go to the shipments listing page.
Click on the "Edit" button for the shipment you want to update.
Update the fields as needed and click on the "Update" button.
Note: A shipment cannot be updated once its status is set to "Done".
Viewing a Shipment
Go to the shipments listing page.
Click on the "View" button for the shipment you want to view.
Deleting a Shipment
Go to the shipments listing page.
Click on the "Delete" button for the shipment you want to delete.
Contributing
If you would like to contribute to this project, please fork the repository and submit a pull request.

License
This project is open-source and available under the MIT License.

Contact
For any questions or feedback, please contact your-email@example.com.
