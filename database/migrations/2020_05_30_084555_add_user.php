<?php
use App\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Hash;

class AddUser extends Migration
{
    private $name = 'kristine';
    private $email = 's9_bulank_k@venta.lv';
private $password = 'bulank';
/**
* Run the migrations.
*
* mreturn void
*/
public function up()
    {
        $user = new User();
        $user->name = $this->name;
        $user->email = $this->email;
        $user->password = Hash::make($this->password);
        $user->email_verified_at = now();

        $user->save();
    }
/**
* Reverse the migrations.
*
* @return void
*/
public function down()
    {
        $user = User::where('email', $this->email)->first();
        $user->delete();
    }
}
