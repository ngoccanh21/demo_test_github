<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Admin;
use App\Models\Roles;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //admin_email admin_password admin_name admin_phone
        Admin::truncate();

        $adminRoles = Roles::where('name', 'admin')->first();
        $authorRoles = Roles::where('name', 'author')->first();
        $userRoles = Roles::where('name', 'user')->first();

        $admin = Admin::create([
            'admin_name' => 'Admin giày thể thao MINOSS',
            'admin_email' => 'admin@gmail.com',
            'admin_phone' => '0345667876',
            'admin_password' => md5('123456')
        ]);
        $author = Admin::create([
            'admin_name' => 'Author MINOSS',
            'admin_email' => 'author@gmail.com',
            'admin_phone' => '0345667877',
            'admin_password' => md5('123456')
        ]);
        $user = Admin::create([
            'admin_name' => 'User MINOSS',
            'admin_email' => 'user@gmail.com',
            'admin_phone' => '0345667878',
            'admin_password' => md5('123456')
        ]);

        //attach: trói, buộc, attack: tạo một bản ghi mới có tên admin_id, id_roles, nếu trường trong bảng admin_roles chỉ để là admin_id, id_roles thì sẽ ko hiểu để ínesrt
        //admin_admin_id: admin: tên class của model, admin_id: cột bảng admin
        //roles_id_roles: roles: tên class của model roles, id_roles: id bảng roles
        $admin->roles()->attach($adminRoles); //attack: thêm (quyền)
        $author->roles()->attach($authorRoles);
        $user->roles()->attach($userRoles);
    }
}
