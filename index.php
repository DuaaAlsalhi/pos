<?php 
session_start();
// Routing using procedural programming..
// require_once './depreciated/procedural_router.php';

require_once "./config.php";
require_once "./functions.php";

use Core\Models\User;
use Core\Router;

spl_autoload_register(function($class_name){

    // $class_name = Core\Router
    $file_path = __DIR__; // /Applications/MAMP/htdocs/htucms

    $class_name = explode('\\', $class_name);
    // array (size=2)
    //     0 => string 'Core' (length=4)
    //     1 => string 'Router' (length=6)
    if($class_name[0] != 'Core')
        return;

    foreach($class_name as $key => $value){
        // if $key == last_key in $class_name, don't strtolower. 
        if($key != array_key_last($class_name)){
            $class_name[$key] = strtolower($value);
        }
        $file_path .= '/' . $class_name[$key];
    }

    $file_path .= '.php';
    // /Applications/MAMP/htdocs/htucms/core/Router.php
    include_once $file_path;
});


if(isset($_COOKIE['logged_in_user'])){
    $user = new User();
    $auth_user = $user->get_by_id($_COOKIE['logged_in_user']);
    if(!empty($auth_user)){
        $_SESSION['user'] = (object) [
            'username' => $auth_user->username,
            'display_name' => $auth_user->display_name,
            'user_id' => $auth_user->id,
            'logged' => true
        ];
    }
}


// Register Routes
// Public Routes
//Router::get('/', 'front.list');
//Router::get('/single', 'front.single');
Router::get('/admin', 'admin'); // permission:all

// permission:admin
Router::get('/admin/users', 'users.list');
Router::get('/admin/users/single', 'users.single');
Router::get('/admin/users/add', 'users.add');
Router::post('/admin/users/store', 'users.store');
Router::get('/admin/users/edit', 'users.edit');
Router::post('/admin/users/update', 'users.update');
Router::post('/admin/users/delete', 'users.delete');

Router::get('/login', 'login.form');
Router::post('/login', 'login.authenticate');
Router::post('/logout', 'login.logout'); // permission:all
// Adminstrating Routes






// permission:admin && permission:pos_edit  ( Admin and seller who have permission to transactions page )
Router::get('/pos', 'pos.list');

 //permission:admin && permission:transactions_edit ( Admin and Accountant who have permission to transactions page )
Router::get('/admin/transactions', 'transactions.list');
Router::get('/admin/transactions/add', 'transactions.add');
Router::post('/admin/transactions/update', 'transactions.update');
Router::post('/admin/transactions/edit', 'transactions.edit');
Router::get('/admin/transactions/single', 'transactions.single');
Router::post('/admin/transactions/delete', 'transactions.delete');
Router::post('/admin/transactions/store', 'transactions.store');
Router::post('/admin/transactions/search', 'transactions.search');


 //permission:admin && permission:stock_edit ( Admin and procurement who have permission to stock page )
Router::get('/admin/stocks', 'stocks.list');
Router::get('/admin/stocks/single', 'stocks.single');
Router::get('/admin/stocks/add', 'stocks.add');
Router::post('/admin/stocks/store', 'stocks.store');
Router::get('/admin/stocks/edit', 'stocks.edit');
Router::post('/admin/stocks/update', 'stocks.update');
Router::post('/admin/stocks/delete', 'stocks.delete');


//permission:admin && permission:pos_edit ( Admin and seller who have permission to selling page )

Router::get('/admin/selling', 'selling.list');
Router::get('/admin/selling/single', 'selling.single');
Router::get('/admin/selling/add', 'selling.add');
Router::post('/admin/selling/store', 'selling.store');
Router::get('/admin/selling/edit', 'selling.edit');
Router::post('/admin/selling/update', 'selling.update');
Router::post('/admin/selling/delete', 'selling.delete');
Router::post('/admin/selling/show', 'selling.show');




Router::get('/admin/items', 'items.list');
Router::get('/admin/items/single', 'items.single');
Router::get('/admin/items/add', 'items.add');
Router::post('/admin/items/store', 'items.store');



// permission:settings
Router::get('/admin/settings', 'settings.list');
Router::get('/admin/settings/edit', 'settings.edit');
Router::post('/admin/settings/update', 'settings.update');

// all
Router::get('/admin/profile', 'profile.list');
Router::get('/admin/profile/edit', 'profile.edit');
Router::post('/admin/profile/update', 'profile.update');

// all
Router::get('/login', 'login.form');
Router::post('/login', 'login.authenticate');
Router::post('/logout', 'login.logout');



// API ROUTES :

Router::Get('/api','items.index');
//  API Get all Items 
Router::GET ('/api/items','items.all');
 
// API get single item
 Router::Get('/api/items/$id', 'items.single');

 //API add new item
 
 Router::post ('/api/items','items.create');

 // API update item compleation 
 Router::put ('/api/items','items.update');
  
 // API delete item 
 Router::delete('/api/items', 'items.delete');
 // API search Item
 Router::post('/api/items/search','item_management.search');

 Router::redirect();