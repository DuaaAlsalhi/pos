<?php

/**
 * Admin controller class: controlles the workflow of the "/admin" request in index.php
 */

namespace Core\Controllers;

use Core\Base\Controller;
use Core\Base\View;
use Core\Models\Item;
use Core\Models\Option;
use Core\Models\Transaction;
use Core\Models\User;

class Admin extends Controller
{

    public function render(): View
    {
        $this->auth();

        self::set_admin();

        // get site title
        $option = new Option();
        $title = $option->get_option('site_title');
        $slogan = $option->get_option('site_slogan');

        // admin dashboard to show the flowing:
        // How many users in our data base.
        $user = new User();
        $users_count = count($user->get_all());
        // How many items in our database.
        $items = new item();
        $items_count = count($items->get_all());
        // How many transactions in our database.
        $transaction = new Transaction();
        $transactions_count = count($transaction->get_all());
        // How many news was published per user who has id=1
        // SELECT * FROM posts WHERE author_id=1;
       

        return $this->view('admin.dashboard', [
            'site_title' => $title,
            'site_slogan' => $slogan,
            'users_count' => $users_count,
            'Transactions_count' => $transactions_count,
            'items_count' => $items_count
      
        ]);
    }

    function __destruct()
    {
        self::unset_admin();
    }
}
