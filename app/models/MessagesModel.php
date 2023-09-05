<?php

namespace Model;
use SQL\QueryBuilder;

class Messages extends QueryBuilder {
    protected $columns = [
        'from_user_id', 'to_user_id', 'message', 'created_at', 'updated_at'
    ];

    public function show($data = []) {
        try {
            $columns = implode(', ', $this->columns);
            return $this->get("SELECT {$columns} from messages WHERE (from_user_id = :from_user AND to_user_id = :to_user) OR (to_user_id = :to_user1 AND from_user_id = :from_user1)", [
                ':from_user' => $data[0],
                ':to_user' => $data[1],
                ':from_user1' => $data[1],
                ':to_user1' => $data[0]
            ]);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function insert($data = []) {
        try { 
            $insertMessage = $this->put("INSERT INTO messages (from_user_id, to_user_id, message) VALUES (:from_user, :to_user, :message)", [
                ':from_user' => $data['from'],
                ':to_user' => $data['to'],
                ':message' => $data['message']
            ]); 
            return $insertMessage ? true : false;
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }  

    public function lastMessage($data = []) {
        try { 
            return $this->get("SELECT max(id), created_at from messages WHERE from_user_id = :from_user and to_user_id = :to_user LIMIT 1", [
                ':from_user' => $data['from'],
                ':to_user' => $data['to']
            ]);
        } catch (\Throwable $e) {
            echo $e->getMessage();
        }
    }
}