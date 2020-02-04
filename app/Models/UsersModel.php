<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;

class UsersModel extends Model
{

    protected $table = 'users';
    protected $primaryKey = 'id_users';

    protected $dates = [
        "deleted_at",
        "updated_at"
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public function createData($request)
    {
        try {
            return conn()->table($this->table)
                ->create([
                'name_users' => $request['name_users'],
                'username_users' => $request['username_users'],
                'password_users' => $request['password_users'],
                'address_users' => $request['address_users'],
                'created_by' => $request['created_by']
            ]);
        } catch (QueryException $error) {
            return $error;
        }
    }

    public function readAll()
    {
        try {
            return conn()->table($this->table)
                ->orderBy('created_at', 'DESC')
                ->get();
        } catch (QueryException $error) {
            return $error;
        }
    }

    public function readById($id)
    {
        try {
            return conn()->table($this->table)
                ->orderBy('created_at', 'DESC')
                ->where($this->primaryKey, $id)
                ->get();
        } catch (QueryException $error) {
            return $error;
        }
    }

    public function updateData($request)
    {
        try {
            return conn()->table($this->table)
                ->where($this->primaryKey, $request[$this->primaryKey])
                ->update([
                    'name_users' => $request['name_users'],
                    'username_users' => $request['username_users'],
                    'password_users' => $request['password_users'],
                    'address_users' => $request['address_users'],
                    'updated_by' => $request['updated_by'],
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
        } catch (QueryException $error) {
            return $error;
        }
    }

    public function deleteData($id)
    {
        try {
            return conn()->table($this->table)
                ->where($this->primaryKey, $id)->delete();
        } catch (QueryException $error) {
            return $error;
        }
    }

}