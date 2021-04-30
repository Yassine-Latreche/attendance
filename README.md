# Installation:
 - clone the repo.
 - run `php artisan db:seed` to import the database.
   - if the import failed, navigate to `app/database`, and import `attendance.sql` to your database.
 - api raoutes are detailed in `routes/api.php`.
 - to test qrcode generator, use the following link `localhost:8000/qrcode`