<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_user', function (Blueprint $table) {
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreignId('role_id')->references('id')->on('roles')->cascadeOnDelete();
            $table->primary(['user_id', 'role_id']);
        });

        $mail = config('mail.to.address') ?? 'test@test.com';

        $user = User::factory()->create([
            'name' => 'Admin',
            'email' => $mail,
        ]);

        $adminId = Role::where('name', 'Administrator')->pluck('id');
        $user->roles()->attach($adminId);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_user');
    }
}
