<?php

/**
 * Users controller class: controlles the workflow of the "/admin/users" request in index.php
 */

namespace Core\Controllers;

use Core\Base\Controller;
use Core\Base\View;
use Core\Models\Item;
use Core\Models\Stock;

use Carbon\Carbon;

class Stocks extends Controller
{

    public function render(): View
    {
        return $this->view($this->view, $this->data);
    }

    function __destruct()
    {
        self::unset_admin();
    }

    public function list()
    {

        $this->auth(); 
       $this->authorize(['admin', 'stock_editor']);
        self::set_admin();
        $all_stocks = new Stock();
        $all_stocks = $all_stocks->get_all();
        $items = new Item();
        $items = $items->get_all();

        $this->view = 'admin.stocks.list';
        $this->data['stocks'] = $all_stocks;
        $this->data['items'] = $items;
    }

    public function single()
    {
        $this->auth();
        $this->authorize(['admin', 'stock_editor']);
        self::set_admin();
        $stocks = new Stock();
        $items = new Item();
        // please do not forget to do a validation if the item was not found, to redirect to 404.
        $this->view = 'admin.stocks.single';
        $this->data['item'] = $stocks->get_by_id($_GET['id']);
        $this->data['item'] = $items->get_by_id($_GET['id']);
    }

    public function add()
    {
        $this->auth();
        $this->authorize(['admin', 'stock_editor']);
        self::set_admin();
        $all_stocks = new Stock();
        $all_stocks = $all_stocks->get_all();
        $items = new Item();
        $items = $items->get_all();
        $this->view = 'admin.stocks.add';
        $this->data['stocks'] = $all_stocks;
        $this->data['items'] = $items;
    }
    public function store()
    {


        $this->auth();
        $this->authorize('admin');
        self::set_admin();
        $items = new Item();
        $stocks = new Stock();
       
      
        $item_id =  $items->insert([
            'name' => $_POST['item_name'],
            'quantity' => $_POST['quantity'],
            'cost' => $_POST['cost'],
            'selling_price' => $_POST['price'],
            'created_at' => date("Y-m-d H:m:s"),
            'updated_at' => date("Y-m-d H:m:s"),
           
        ]);

        $stocks->insert([
            'item_id' => $item_id,
            'user_id' =>  $_SESSION['user']->user_id,
            'quantity' =>  $_POST['quantity'],
            'created_at' => date("Y-m-d H:m:s"),
            'updated_at' => date("Y-m-d H:m:s"),


          
        ]);
        redirect('/admin/stocks');
    }


    public function edit()
    {
        $this->auth();
        $this->authorize(['admin', 'stock_editor']);
        self::set_admin();
        $stocks = new Stock();
        $items = new Item();
        $this->view = 'admin.stocks.edit';
        $this->data['item'] = $stocks->get_by_id($_GET['id']);
        $this->data['item'] = $items->get_by_id($_GET['id']);
    }

    public function update()
    {
        $this->auth();
        $this->authorize(['admin', 'stock_editor']);
        self::set_admin();
        $stocks = new Stock();
        $items = new Item();

        $items->update($_POST['id'], [
            'name' => $_POST['Item-name'],

            'cost' => $_POST['cost'],
            'selling_price' => $_POST['selling_price'],
            'quantity' => $_POST['stock available quantity'],

            'created_at' => $_POST['created-at'],

            'updated_at' => $_POST['updated-at'],
        ]);
        redirect('/admin/stocks');
    }

    public function delete()
    {
        $this->auth();
        $this->authorize(['admin', 'stock_editor']);
        self::set_admin();
        $stocks = new Stock();
        $items = new Item();
        $stocks->delete($_POST['item_id']);
        $items->delete($_POST['name']);

        redirect('/admin/stocks');
    }
}
