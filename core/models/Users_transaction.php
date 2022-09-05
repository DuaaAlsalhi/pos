<?php
/**
 * User Class: Moadel class to manage the website users
 */

namespace Core\Models;
use Core\Base\Model;
use Core\Base\Collection;

class Users_transaction extends Model
{
   
/*


    function users_transactions($users_id_arr){
        foreach($users_id_arr as $user_id){
            $user_id = (int) $user_id;
            $sql = "INSERT INTO users_transactions (user_id, transaction_id) VALUES ($this->last_insert_id, $user_id)";
            $this->connection->query($sql);
        }
    }

    function get_users_transactions($user_id){
        $sql = "SELECT * FROM users WHERE user_id=?";
        $query_result = $this->execute_by_id($sql, $user_id);
        $collection = new Collection($query_result);
        return $collection->data;
    }

    function get_relations_based_on_user($user_id){
        $sql = "SELECT * FROM users_transactions WHERE user_id=?";

        $query_result = $this->execute_by_id($sql, $user_id);
        $collection = new Collection($query_result);
        return $collection->data;
    }

    function delete_relation($relation_id){
        $query = "DELETE FROM users_transactions WHERE id=$relation_id";
        return $this->connection->query($query);
    }

    function delete_relation_by_user_id($user_id){
        $query = "DELETE FROM users_transactions WHERE user_id=$user_id";
        return $this->connection->query($query);
    }

    function add_relation($user_id, $transaction_id){
        $user_id = (int) $user_id;
        $transaction_id = (int) $transaction_id;
        $sql = "INSERT INTO users_transactions (user_id, transaction_id) VALUES ($user_id, $transaction_id)";
        return $this->connection->query($sql);
    }
    */
}

