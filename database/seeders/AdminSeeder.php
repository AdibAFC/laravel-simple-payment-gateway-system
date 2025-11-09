<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Sample admins (use secure passwords in real life)
        $items = [
            ['name' => 'Alice Admin', 'email' => 'alice@pg.com', 'password' => 'pass123'],
            ['name' => 'Bob Manager', 'email' => 'bob@pg.com',   'password' => 'pass123'],
        ];

        foreach ($items as $it) {
            Admin::updateOrCreate(
                ['email' => $it['email']],
                ['name' => $it['name'], 'password' => Hash::make($it['password'])]
            );
        }
    }
}
