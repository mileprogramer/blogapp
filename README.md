I created a CRUD Blog app where I made an admin dashboard. In this dashboard, the admin can edit, delete, create, and retrieve categories, tags, and posts, and connect them with the live website (just a theme I downloaded). I downloaded this admin dashboard from https://matrixadmin.wrappixel.com/. I used SQLite for my database. Since I used SQLite, I also utilized ORM so that if I upload this to hosting, I can switch to MySQL (MariaDB) or another database.

To start this app, use the following command lines:
1. git clone https://github.com/mileprogramer/blogapp
2. composer install
3. php artisan serve
The app is live!

Mini documentaion
1. App is controlled by two types of controllers API controlers and basic controllers
2. API controllers are used for edit post, add post
3. Tag has name and slug you can edit slug and name. When you try to delete tag you are not deleting a tag but setting property active to the 0, same with category and post.
5. Category has slug and name category, you can not change the slug because i was thinking that category is something big and if someone change the url that will effect SEO. You can delete category but you are just like tag setting 0 to the active. You can return tag or post by trying to add again same tag or category. I was thinking on adding delete history, but i was thinking that could be safer option so only admin or someone who knows this can return category or tag.
