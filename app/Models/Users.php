<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Users extends Model
{
    use HasFactory;

    protected $table = 'users';
    public function getAllUser()
    {
        $users = DB::select('SELECT * FROM users ORDER BY create_at DESC');
        return $users;
    }
    public function addUser($data)
    {
        DB::insert('INSERT INTO users (fullname,email,create_at) value (?,?,?)', $data);
    }
    public function getDetail($id)
    {
        return DB::select('SELECT * FROM' . $this->table . 'WHERE id = ?', [$id]);
    }

    public function updateUser($data, $id)
    {
        $data = $id;

        return DB::update('UPDATE' . $this->table . 'SET fullname=?, email=?, update_at=? where id = ?', $data);
    }
    public function deleteUser($id)
    {
        return DB::delete("DELETE FROM $this->table WHERE id=?", [$id]);
    }

    public function statementUser($sql)
    {
        return DB::statement($sql);
    }
    public function learnQueryBuilder()
    {
        DB::enableQueryLog();

        $id = 20;
        $lists = DB::table($this->table)
            //->where('id','>=',19)
            //->where('id','<>',19)
            ->select('fullname as hoten', 'email', 'id')
            //->where('id',19)
            ->where('id', 19)
            ->orWhere('id', 20)
            ->get();

            ->where('id',18)
        // ->where(function($query) use ($id){
        //     $query->where('id','<',$id)->orWhere('id','>',$id);

        // })
        // ->where('fullname','like','%van quan%')
        // ->whereBetween('id',[18,20])
        // ->whereNotBetween('id',[18,20])
        ->whereNotNull('update_at')
        ->get();
        // ->toSql();

        dd($lists);

        $sql = DB::getQueryLog();
        dd($sql);
        $detail = DB::table($this->table)->first();
    }
}
