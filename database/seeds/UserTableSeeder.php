
<?php
use Illuminate\Database\Seeder;
use homePage\User;
class UserTableSeeder extends Seeder
{

public function run()
{
    DB::table('users')->delete();
    User::create(array(
        'username'     => 'admin',
        'first_name' => 'admin',
        'last_name'    => 'admin',
        'password' => Hash::make('admin')
    ));
}

}