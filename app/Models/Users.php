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
        $users = DB::select('SELECT * FROM users ORDER BY create_at DESC') ;
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

        // $id = 20;
        // $lists = DB::table($this->table)
        // ->select('fullname as hoten', 'email', 'id')

            
            ->where('id', 19)
            ->orWhere('id', 20)
            ->get();

            ->where('id',18)

       
        ->whereNotNull('update_at')
        ->get();
        >whereNotIn('id',[18,20])
        // ->whereNotNull('update_at')
        //->whereYear('create_at','2021')
       // ->whereColumn('create_at','create_at')
        //->get();

         //Join bảng
        $lists = DB::table('users')
        ->select('users.*','groups.name as group_name')
        ->rightJoin('groups','users.group_id', '=', 'groups.id')
        / ->select('users.*','groups.name as group_name')
        //->rightJoin('groups','users.group_id', '=', 'groups.id')
        // ->orderBy('create_at','asc')
        // ->orderBy('id','desc')
        // ->inRandomOrder()
        // ->select(DB::raw('count(id) as email_count'),'email','fullname')
        // ->groupBy('email')
        // ->groupBy('fullname')
        // ->having('email_count','>=',2)
        // ->limit(2)
        // ->offset(2)
        ->take(2)
        ->skip(2)
        ->get();


        $status = DB::table('users')->insert([
        //     'fullname'=>'Nguyễn Văn A',
        //     'email'=> 'nguyenvana@gmail.com',
        //     'group_id' => 1,
        //     'create_at' => date('Y-m-d H:i:s')
        // ]);

        //dd($status);

        //$lastId = DB::getPdo()->lastInsertId();

        // $lastId = DB::table('users')->insertGetId([
        //     'fullname' => 'Nguyễn Văn A',
        //     'email' => 'nguyenvana@gmail.com',
        //     'group_id' => 1,
        //     'create_at' => date('Y-m-d H:i:s')
        // ]);

        // dd($lastId);

        // $status = DB::table('users')
        // ->where('id',29)
        // ->update([
        //     'fullname' => 'Nguyễn Văn B',
        //     'email' => 'nguyenvanb@gmail.com',
        //     'update_at' => date('Y-m-d H:i:s')
        // ]);

        // $status = DB::table('users')
        // ->where('id',28)
        // ->delete();

        //Đếm số bản ghi
        $count = DB::table('users')->where('id','>',20)->count();
        // $count = count($lists);
        // dd($count);
        $lists = DB::table('users')
       // ->selectRaw('email, fullname, count(id) as email_count')
        // ->groupBy('email')
        // ->groupBy('fullname')
        // ->where(DB::raw('id>20'))
        // ->where('id','>',20)
        // ->orWhereRaw('id > 20')
        // ->orderByRaw('create_at DESC, update_at ASC')
        //->groupByRaw('email, fullname')
        // ->having ('email_count','>=',2)
        // ->havingRaw('count(id) > ?', [2])
        // ->where(
        //     'group_id',
        //     '=',
        //     function ($query){
        //         $query->select('id')
        //         ->from('groups')
        //         ->where('name','=','Administrator');
        //     }
        // )    

        ->select('email', DB::raw('(SELECT count(id) FROM `groups`) as group_count'))
        ->selectRaw('email, (SELECT count(id) FROM `groups`) as group_count')
        ->get();

        dd($lists);

        
        dd($lists);

        $sql = DB::getQueryLog();
        dd($sql);
        $detail = DB::table($this->table)->first();
    }
}
