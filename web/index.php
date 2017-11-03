<?php

require "../vendor/autoload.php";

// Loading the router :
$router = new Models\router\Router($_GET['url']);

// Route selection :

// Load 'index' function from 'IndexController'  controller - Show the homepage.
$router->get('/', "Index#index");

// Load 'contactForm' function from 'IndexController' controller - Send the contact form and tell the user it's done.
$router->post('/contactForm', "Index#contactForm");

// Load 'create' function from  'PostController'- Create a post.
$router->get('/posts/create', "Post#create");
$router->post('/posts/create', "Post#create");

// Load 'delete' function from  'PostController' controller with parametter id - Delete a post with corresponding id.
$router->get('/posts/delete-:id', "Post#delete");

// Load 'list' function from  'PostController' - List all posts.
$router->get('/posts/list', "Post#list");

// Load 'show' function from  'PostController' controller with parametter id - Show a post with corresponding id.
$router->get('/posts/show-:id', "Post#show");

// Load 'update' function from  'PostController' controller with parametter id - Update a post with corresponding id.
$router->get('/posts/update-:id', "Post#update");
$router->post('/posts/update-:id', "Post#update");

// Execute selected route
$router->run();