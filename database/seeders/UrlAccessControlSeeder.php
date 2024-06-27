<?php

namespace Database\Seeders;

use App\Models\UrlAccessControl;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UrlAccessControlSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                "id" => 1,
                "can_create" => 1,
                "can_read" => 1,
                "can_update" => 1,
                "can_delete" => 1,
                "role" => "admin",
                "menu_id" => 1,
                "created_at" => '2024-06-25 04:38:50',
                "updated_at" => '2024-06-25 15:34:01',
            ],
            [
                "id" => 2,
                "can_create" => 0,
                "can_read" => 0,
                "can_update" => 0,
                "can_delete" => 0,
                "role" => "user",
                "menu_id" => 1,
                "created_at" => '2024-06-25 04:38:50',
                "updated_at" => '2024-06-25 04:38:50',
            ],
            [
                "id" => 3,
                "can_create" => 0,
                "can_read" => 0,
                "can_update" => 0,
                "can_delete" => 0,
                "role" => "manager",
                "menu_id" => 1,
                "created_at" => '2024-06-25 04:38:50',
                "updated_at" => '2024-06-25 04:38:50',
            ],
            [
                "id" => 4,
                "can_create" => 1,
                "can_read" => 1,
                "can_update" => 1,
                "can_delete" => 1,
                "role" => "admin",
                "menu_id" => 2,
                "created_at" => '2024-06-25 04:38:50',
                "updated_at" => '2024-06-26 16:33:55',
            ],
            [
                "id" => 5,
                "can_create" => 0,
                "can_read" => 0,
                "can_update" => 0,
                "can_delete" => 0,
                "role" => "user",
                "menu_id" => 2,
                "created_at" => '2024-06-25 04:38:50',
                "updated_at" => '2024-06-25 04:38:50',
            ],
            [
                "id" => 6,
                "can_create" => 0,
                "can_read" => 0,
                "can_update" => 0,
                "can_delete" => 0,
                "role" => "manager",
                "menu_id" => 2,
                "created_at" => '2024-06-25 04:38:50',
                "updated_at" => '2024-06-25 04:38:50',
            ],
            [
                "id" => 7,
                "can_create" => 1,
                "can_read" => 1,
                "can_update" => 1,
                "can_delete" => 1,
                "role" => "admin",
                "menu_id" => 3,
                "created_at" => '2024-06-25 04:38:50',
                "updated_at" => '2024-06-25 04:38:50',
            ],
            [
                "id" => 8,
                "can_create" => 0,
                "can_read" => 0,
                "can_update" => 0,
                "can_delete" => 0,
                "role" => "user",
                "menu_id" => 3,
                "created_at" => '2024-06-25 04:38:50',
                "updated_at" => '2024-06-25 04:38:50',
            ],
            [
                "id" => 9,
                "can_create" => 0,
                "can_read" => 0,
                "can_update" => 0,
                "can_delete" => 0,
                "role" => "manager",
                "menu_id" => 3,
                "created_at" => '2024-06-25 04:38:50',
                "updated_at" => '2024-06-25 04:38:50',
            ],
            [
                "id" => 10,
                "can_create" => 1,
                "can_read" => 1,
                "can_update" => 1,
                "can_delete" => 1,
                "role" => "admin",
                "menu_id" => 4,
                "created_at" => '2024-06-25 04:38:50',
                "updated_at" => '2024-06-25 04:38:50',
            ],
            [
                "id" => 11,
                "can_create" => 0,
                "can_read" => 0,
                "can_update" => 0,
                "can_delete" => 0,
                "role" => "user",
                "menu_id" => 4,
                "created_at" => '2024-06-25 04:38:50',
                "updated_at" => '2024-06-25 04:38:50',
            ],
            [
                "id" => 12,
                "can_create" => 0,
                "can_read" => 0,
                "can_update" => 0,
                "can_delete" => 0,
                "role" => "manager",
                "menu_id" => 4,
                "created_at" => '2024-06-25 04:38:50',
                "updated_at" => '2024-06-25 04:38:50',
            ],
            [
                "id" => 13,
                "can_create" => 1,
                "can_read" => 1,
                "can_update" => 1,
                "can_delete" => 1,
                "role" => "admin",
                "menu_id" => 5,
                "created_at" => '2024-06-25 04:42:39',
                "updated_at" => '2024-06-25 15:34:06',
            ],
            [
                "id" => 14,
                "can_create" => 0,
                "can_read" => 0,
                "can_update" => 1,
                "can_delete" => 0,
                "role" => "user",
                "menu_id" => 5,
                "created_at" => '2024-06-25 04:42:39',
                "updated_at" => '2024-06-25 15:33:34',
            ],
            [
                "id" => 15,
                "can_create" => 0,
                "can_read" => 0,
                "can_update" => 0,
                "can_delete" => 0,
                "role" => "manager",
                "menu_id" => 5,
                "created_at" => '2024-06-25 04:42:39',
                "updated_at" => '2024-06-25 04:42:39',
            ],
            [
                "id" => 16,
                "can_create" => 1,
                "can_read" => 1,
                "can_update" => 1,
                "can_delete" => 1,
                "role" => "admin",
                "menu_id" => 6,
                "created_at" => '2024-06-25 15:06:01',
                "updated_at" => '2024-06-25 15:06:01',
            ],
            [
                "id" => 17,
                "can_create" => 0,
                "can_read" => 0,
                "can_update" => 0,
                "can_delete" => 0,
                "role" => "user",
                "menu_id" => 6,
                "created_at" => '2024-06-25 15:06:01',
                "updated_at" => '2024-06-25 15:06:01',
            ],
            [
                "id" => 18,
                "can_create" => 0,
                "can_read" => 0,
                "can_update" => 0,
                "can_delete" => 0,
                "role" => "manager",
                "menu_id" => 6,
                "created_at" => '2024-06-25 15:06:01',
                "updated_at" => '2024-06-25 15:06:01',
            ],
            [
                "id" => 19,
                "can_create" => 1,
                "can_read" => 1,
                "can_update" => 1,
                "can_delete" => 1,
                "role" => "admin",
                "menu_id" => 7,
                "created_at" => '2024-06-25 23:48:40',
                "updated_at" => '2024-06-25 23:48:40',
            ],
            [
                "id" => 20,
                "can_create" => 0,
                "can_read" => 0,
                "can_update" => 0,
                "can_delete" => 0,
                "role" => "user",
                "menu_id" => 7,
                "created_at" => '2024-06-25 23:48:40',
                "updated_at" => '2024-06-25 23:48:40',
            ],
            [
                "id" => 21,
                "can_create" => 0,
                "can_read" => 0,
                "can_update" => 0,
                "can_delete" => 0,
                "role" => "manager",
                "menu_id" => 7,
                "created_at" => '2024-06-25 23:48:40',
                "updated_at" => '2024-06-25 23:48:40',
            ],
            [
                "id" => 22,
                "can_create" => 1,
                "can_read" => 1,
                "can_update" => 1,
                "can_delete" => 1,
                "role" => "admin",
                "menu_id" => 8,
                "created_at" => '2024-06-26 04:43:46',
                "updated_at" => '2024-06-26 04:43:46',
            ],
            [
                "id" => 23,
                "can_create" => 0,
                "can_read" => 0,
                "can_update" => 0,
                "can_delete" => 0,
                "role" => "user",
                "menu_id" => 8,
                "created_at" => '2024-06-26 04:43:46',
                "updated_at" => '2024-06-26 04:43:46',
            ],
            [
                "id" => 24,
                "can_create" => 0,
                "can_read" => 0,
                "can_update" => 0,
                "can_delete" => 0,
                "role" => "manager",
                "menu_id" => 8,
                "created_at" => '2024-06-26 04:43:46',
                "updated_at" => '2024-06-26 04:43:46',
            ],
            [
                "id" => 25,
                "can_create" => 1,
                "can_read" => 1,
                "can_update" => 1,
                "can_delete" => 1,
                "role" => "admin",
                "menu_id" => 9,
                "created_at" => '2024-06-26 16:02:55',
                "updated_at" => '2024-06-26 16:02:55',
            ],
            [
                "id" => 26,
                "can_create" => 0,
                "can_read" => 0,
                "can_update" => 0,
                "can_delete" => 0,
                "role" => "user",
                "menu_id" => 9,
                "created_at" => '2024-06-26 16:02:55',
                "updated_at" => '2024-06-26 16:02:55',
            ],
            [
                "id" => 27,
                "can_create" => 0,
                "can_read" => 0,
                "can_update" => 0,
                "can_delete" => 0,
                "role" => "manager",
                "menu_id" => 9,
                "created_at" => '2024-06-26 16:02:55',
                "updated_at" => '2024-06-26 16:02:55',
            ],
            [
                "id" => 28,
                "can_create" => 1,
                "can_read" => 1,
                "can_update" => 1,
                "can_delete" => 1,
                "role" => "admin",
                "menu_id" => 10,
                "created_at" => '2024-06-27 05:08:33',
                "updated_at" => '2024-06-27 05:08:33',
            ],
            [
                "id" => 29,
                "can_create" => 0,
                "can_read" => 0,
                "can_update" => 0,
                "can_delete" => 0,
                "role" => "user",
                "menu_id" => 10,
                "created_at" => '2024-06-27 05:08:33',
                "updated_at" => '2024-06-27 05:08:33',
            ],
            [
                "id" => 30,
                "can_create" => 0,
                "can_read" => 0,
                "can_update" => 0,
                "can_delete" => 0,
                "role" => "manager",
                "menu_id" => 10,
                "created_at" => '2024-06-27 05:08:33',
                "updated_at" => '2024-06-27 05:08:33',
            ],
        ];

        foreach ($data as $item) {
            UrlAccessControl::updateOrCreate(['id' => $item['id']], $item);
        }
    }
}
