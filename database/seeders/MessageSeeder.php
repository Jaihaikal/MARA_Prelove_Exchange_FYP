<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Message;
class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Message::create([
            'name' => 'John Doe',
            'message' => 'This is a test message.',
            'email' => 'johndoe@example.com',
            'phone' => '1234567890',
            'read_at' => now(),
            'photo' => 'path/to/photo.jpg',
            'subject' => 'Test Subject'
        ]);

        Message::create([
            'name' => 'Jane Smith',
            'message' => 'Another test message.',
            'email' => 'janesmith@example.com',
            'phone' => '0987654321',
            'read_at' => now(),
            'photo' => 'path/to/photo2.jpg',
            'subject' => 'Another Test Subject'
        ]);

        // Add more messages as needed
    }
}
