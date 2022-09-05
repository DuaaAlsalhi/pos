<?php

/**
 * Users controller class: controlles the workflow of the "/admin/users" request in index.php
 */

namespace Core\Controllers;

use Core\Base\Controller;
use Core\Base\View;
use Core\Models\Item;
use Core\Models\Transaction;
use core\models\users_transaction;
use core\Models\User;



class Selling extends Controller
{
    
    public function render(): View
    {
        return $this->view($this->view, $this->data);
    }

    function __destruct()
    {
        self::unset_admin();
    }

    public function list(){

        $this->auth(); 
        self::set_admin();
        $this->authorize(['admin', 'pos_editor']);
      $items = new Item();
        $all_items = $items->get_all();
        $this->data['item'] = $all_items;
        $this->view = 'admin.selling.list';
        $transactions = new Transaction();
        $all_transactions = $transactions->get_all();
        $this->data['item'] = $all_transactions;
    }

    public function single(){
        $this->auth(); 
        $this->authorize(['admin', 'pos_editor']);
        self::set_admin();
        $items = new Item();
        // please do not forget to do a validation if the item was not found, to redirect to 404.
        $this->view = 'admin.selling.single';
        $this->data['item'] = $items->get_by_id($_GET['id']);
    }

    public function add(){
        $this->auth(); 
        $this->authorize(['admin', 'pos_editor']);
        self::set_admin();
        $this->view = 'admin.selling.add';
    }
  
    public function store(){
       
        $this->auth(); 
        $this->authorize(['admin', 'pos_editor']);
        self::set_admin();
        $items = new Item();
        $items->insert([
            'name' => $_POST['itemname'],
            'quantity' => $_POST['quantity'],
            'cost' => $_POST['cost'],
            'selling_price' => $_POST['price'],
          
        ]);
      
        redirect('/admin/selling');
    }

    public function edit(){
        $this->auth(); 
        $this->authorize(['admin', 'pos_editor']);
        self::set_admin();
        $items = new Item();
        $this->view = 'admin.selling.edit';
        $this->data['item'] = $items->get_by_id($_GET['id']);
    }

    public function update(){
        $this->auth(); 
        $this->authorize(['admin', 'pos_editor']);
        self::set_admin();
        $items = new Item();
        $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $items->update($_POST['id'], [
            'name' => $_POST['name'],
            'quantity' => $_POST['quantity'],
            'cost' => $_POST['cost'],

            'selling_price' => $_POST['selling_price'],
            'user_id' => $_POST['user_id'],
            'created_at' => $_POST['created_at'],
            'updated_at' => $_POST['updated_at'],


            'roles' => 'admin'
        ]);
        redirect('/admin/selling');
    }

    public function delete(){
        $this->auth(); 
        $this->authorize(['admin', 'pos_editor']);;
        self::set_admin();
        $items = new Item();
        $items->delete($_POST['item_id']);

        redirect('/admin/selling');
    }

public function show(){
      $result = $_POST; 
      $transactions = new Transaction();
      $transactions = $transactions->get_all();
      $users_transactions = new Users_Transaction();
      $users_transactions = $users_transactions->get_all();
      $this->data['item'] = $transactions;
      $this->view = 'admin.selling.show';
}








}