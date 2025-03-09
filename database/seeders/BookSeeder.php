<?php

namespace Database\Seeders;


use App\Models\Book;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $data =
            [
                [
                    'book_code' => 'A001-01',
                    'title' => 'laravel for newbie',
                    'slug' => 'laravel-for-newbie',
                    'price' => '9000',
                    'status' => 'not available',
                    'created_at' => '2024-10-24 15:20:20',
                    'updated_at' => null,
                ],
                [
                    'book_code' => 'A001-02',
                    'title' => 'laravel for noob',
                    'slug' => 'laravel-for-noob',
                    'price' => '9000',
                    'status' => 'not available',
                    'created_at' => '2024-10-26 14:07:59',
                    'updated_at' => null,
                ],
                [
                    'book_code' => 'A001-03',
                    'title' => 'Programmer untuk pemula',
                    'slug' => 'programmer-untuk-pemula',
                    'price' => '9000',
                    'status' => 'not available',
                    'created_at' => '2024-10-26 14:08:30',
                    'updated_at' => null,
                ],
                [
                    'book_code' => 'A001-04',
                    'title' => 'HTML For noob',
                    'slug' => 'html-for-noob',
                    'price' => '9000',
                    'status' => 'not available',
                    'created_at' => '2024-10-26 14:12:23',
                    'updated_at' => null,
                ],
                [
                    'book_code' => 'A001-05',
                    'title' => 'CSS For noob',
                    'slug' => 'css-for-noob',
                    'price' => '9000',
                    'status' => 'not available',
                    'created_at' => '2024-10-27 12:47:18',
                    'updated_at' => null,
                ],
                [
                    'book_code' => 'A001-06',
                    'title' => 'Perjalanan programmer muda',
                    'slug' => null,
                    'price' => '9000',
                    'status' => 'not available',
                    'created_at' => '2024-10-09 13:10:35',
                    'updated_at' => null,
                ],
                [
                    'book_code' => 'A001-07',
                    'title' => 'Perjalanan programmer muda 2',
                    'slug' => null,
                    'price' => '9000',
                    'status' => 'in stock',
                    'created_at' => '2024-10-20 07:16:33',
                    'updated_at' => null,
                ],
                [
                    'book_code' => 'A001-08',
                    'title' => 'final fantasy',
                    'slug' => 'in stock',
                    'price' => '9000',
                    'status' => 'in stock',
                    'created_at' => '2024-10-27 12:50:31',
                    'updated_at' => null,
                ],
                [
                    'book_code' => 'A001-09',
                    'title' => 'soccer ball',
                    'slug' => 'in stock',
                    'price' => '9000',
                    'status' => 'in stock',
                    'created_at' => '2024-10-27 12:50:20',
                    'updated_at' => null,
                ],
            ];

        foreach ($data as $value) {
            Book::insert([
                'name' => $value
            ]);
        }

    }
}
