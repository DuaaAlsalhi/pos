<?php

/**
 * Tags controller class: controlles the workflow of the "/admin/tags" request in index.php
 */

namespace Core\Controllers;

use Core\Base\Controller;
use Core\Base\View;
use Core\Models\Transaction;
use Core\Models\Item;
use Core\Models\Users_transaction;

class Transactions extends Controller
{

    public function __construct()
    {
        $this->authorize(['admin', 'transactions_editor']);
    }

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
        self::set_admin();
        $transactions = new Transaction();
        $all_transactions = $transactions->get_all();
        $this->view = 'admin.transactions.list';
        $this->data['transactions'] = $all_transactions;
    }
    public function add()
    {

        $this->auth();
        $this->authorize(['admin', 'transactions_editor']);
        self::set_admin();
        $items = new Item();
        $items = $items->get_all();
        $this->view = 'admin.transactions.add';
        $this->data['items'] = $items;
    }

    public function single()
    {
        $this->auth();
        $this->authorize(['admin', 'transactions_editor']);
        self::set_admin();
        $transactions = new Transaction();
        $items = new Item();
    
       
        $this->data['item'] = $transactions->get_by_id($_GET['id']);
        $this->data['item'] = $items->joinItems($_GET['id']);
      
  
        $this->data['item'] =  $transactions;
        $this->view = 'admin.transactions.single';
    }

    public function storeInvoice()
    {
    }
    public function store()
    {
echo json_encode($_POST);

        $this->auth();
        $this->authorize('admin');
        self::set_admin();
        $items = new Item();
        $result =   $_POST;
        $transactions = new Transaction();
        $userTransaction  = new Users_transaction();
        foreach ($result['amount'] as $key => $value) {
            $x =  $items->get_by_id($_POST['productid'][$key]);
            if ($x->quantity > 0 && $x->quantity >=  $_POST['amount'][$key]) {
                $transactionId =  $transactions->insert([
                    'item_id' => $result['productid'][$key],
                    'quantity' =>  $result['amount'][$key],
                    'total' => $result['total'][$key]
                ]);
                $userTransaction->insert([
                    'user_id' => $_SESSION['user']->user_id,
                    'transaction_id' => $transactionId,
                    'total' => $_POST['total'][$key]
                ]);

                $quantity = (int)$x->quantity;
                $amount = (int)$_POST['amount'][$key];
                $total = $quantity - $amount;
                $items->update($_POST['productid'][$key], [
                    'quantity' => $total,
                ]);
            } else {
                echo  json_encode(["result" => 'failed to add']);
            }
        }
        echo  json_encode(["result" => 'sucsses']);
    }


    public function edit()
    {
        $this->auth();
        $this->authorize(['admin', 'transactions_editor']);
        self::set_admin();
        $transactions = new Transaction();
        $items = new Item();
        $this->view = 'admin.transactions.edit';
        $this->data['item'] = $transactions->get_by_id($_GET['id']);
        $this->data['item'] = $items->get_by_id($_GET['id']);}








    public function update()
    {
        self::set_admin();
        $transaction = new Transaction();
        $transaction->update($_POST['id'], [
            'item_id' => $_POST['item_id'],
            'quantity' => $_POST['quantity'],
            'total' => $_POST['total'],
            'created_at' => $_POST['created_at'],
            'updated_at' => $_POST['update_at'],

        ]);
        redirect('/admin/transactions');
    }

    public function delete()
    {
        self::set_admin();
        $transaction = new Transaction();
        $transaction->delete($_POST['$transaction_id']);

        redirect('/admin/transactions');
    }
    public function search()
    {
        $price = 50;

        return json_encode($price);
    }
}
