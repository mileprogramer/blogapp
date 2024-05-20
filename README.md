I created a CRUD Blog app where I made an admin dashboard. In this dashboard, the admin can edit, delete, create, and retrieve categories, tags, and posts, and connect them with the live website (just a theme I downloaded). I downloaded this admin dashboard from [Matrix Admin]([url](https://matrixadmin.wrappixel.com/)). I used SQLite for my database. Since I used SQLite, I also utilized ORM so that if I upload this to hosting, I can switch to MySQL (MariaDB) or another database.

To start this app, use the following command lines:

git clone https://github.com/mileprogramer/blogapp
composer install
php artisan serve
The app is live!
