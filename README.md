# CommunitySite


### 1. Get the Project

Clone the repository using Git:

```bash
git clone https://github.com/md-kibria/blacways-laravel.git
```

Or download the ZIP file from GitHub and extract it.

### 2. Install Dependencies

Make sure [Composer](https://getcomposer.org/) and [PHP](https://www.php.net/) are installed on your PC. Then, install PHP dependencies:

```bash
composer install
```

### 3. Set Up Environment

Copy `.env.example` to `.env` and update your database credentials.

```bash
cp .env.example .env
```

Generate the application key:

```bash
php artisan key:generate
```

### 4. Run Migrations

Run the following command to set up the database tables:

```bash
php artisan migrate
```

### 5. Serve the Application

Start the local development server:

```bash
php artisan serve
```

Visit [http://localhost:8000](http://localhost:8000) in your browser to view the project.