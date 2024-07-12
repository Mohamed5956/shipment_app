
# Laravel Shipment Management System

This is a Laravel-based shipment management system that allows users to create, update, and manage shipments. The system calculates prices based on shipment weight and tracks the status of each shipment. When a shipment is marked as "Done", corresponding journal entries are automatically created.

## Features

- Create and manage shipments
- Calculate shipment prices based on weight
- Track shipment status
- Automatically create journal entries when a shipment is marked as "Done"
- Prevent further updates on shipments once marked as "Done"

## Prerequisites

- PHP >= 8.2
- Composer
- Laravel 11.x
- MySQL

## Installation

### Clone the Repository

```bash
git clone https://github.com/your-username/laravel-shipment-management.git
cd laravel-shipment-management
```

### Install Dependencies

```bash
composer install
npm install
npm run dev
```

### Environment Setup

1. Copy the `.env.example` file to `.env`:

    ```bash
    cp .env.example .env
    ```

2. Generate an application key:

    ```bash
    php artisan key:generate
    ```

3. Configure your `.env` file with your database credentials:

    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database
    DB_USERNAME=your_username
    DB_PASSWORD=your_password
    ```

### Run Migrations

```bash
php artisan migrate
```

### Start the Development Server

```bash
php artisan serve
npm run dev
```


You can now access the application at `http://localhost:8000`.

## Usage

### Creating a Shipment

1. Go to the shipments creation page.
2. Fill in the required fields (code, shipper, weight, description, image, status).
3. Click on the "Create" button.

### Updating a Shipment

1. Go to the shipments listing page.
2. Click on the "Edit" button for the shipment you want to update.
3. Update the fields as needed and click on the "Update" button.
4. **Note**: A shipment cannot be updated once its status is set to "Done".

### Viewing a Shipment

1. Go to the shipments listing page.
2. Click on the "View" button for the shipment you want to view.

### Deleting a Shipment

1. Go to the shipments listing page.
2. Click on the "Delete" button for the shipment you want to delete.

## Contributing

If you would like to contribute to this project, please fork the repository and submit a pull request.

## Contact

For any questions or feedback, please contact [mohammeadell301@gmail.com](mailto:mohammedadell301@gmail.com).
