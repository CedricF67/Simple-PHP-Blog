# Simple-PHP-Blog
A simple blog in PHP where everyone can submit and manage posts.

# 1. To install :
1) Copy all folders and files to your server.
2) Set the database following the informations bellow.
3) That's it, you'r ready to go!

# 2. Setting up the database :
1) Make a new database with the name of your choice.
2) Import the content of the 'post.sql' file by using phpmyadmin for exemple. This will create a table called 'post' with all fields needed.
3) Open the app/config/Config.php file, and change the default values with the correct ones :
	- db_user is the username you use to connect to the database
	- db_pass is the password for that username
	- db_host is the name of your database host
	- db_name is the name of the database you created in step 1

# 3. How to create a post :
1) On any page, click the link 'Créer un billet' top right of any page.
2) Complete the form. All fileds are requiered.
3) Click the 'Poster ce billet' button bellow.

# 4. How to access the list of all posts :
1) All you need to do is to click on 'Billets' on the top right of any page.

# 5. How to show a post :
1) Go to the list of all post (see section 4 above).
2) Click on the title or subtitle of the post you want to show.

# 6. How to edit a post :
1) Select the post you want to edit by showing it first (see section 5 above).
2) At the bottom of the show page, click the 'Modifier ce billet' button.
3) You can now modify the post by editing the form that show up.
4) Click on the 'Modifier ce billet' button once you'r done.

# 7. How to delete a post :
1) Select the post you want to delete by showing it first (see section 5 above).
2) At the bottom of the show page, click the 'Supprimer ce billet' button.
3) Confirm you want to delete the post by clicking on the 'Oui' button. If you change your mind, you can click on 'No'.