<?php

namespace Database\Seeders;

use App\Models\Menu;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = [
            [
                'id' => 1,
                'name' => 'Dashboard',
                'route_get' => '/dashboard',
                'route_put' => null,
                'route_post' => null,
                'route_delete' => null,
            ],
            [
                'id' => 2,
                'name' => 'Usuários',
                'route_get' => '/users',
                'route_put' => '/users/{id}',
                'route_post' => '/users',
                'route_delete' => '/users/{id}',
            ],
            [
                'id' => 3,
                'name' => 'Menus',
                'route_get' => '/menus',
                'route_put' => '/menus/{id}',
                'route_post' => '/menus',
                'route_delete' => '/menus/{id}',
            ],
            [
                'id' => 4,
                'name' => 'Controle de acesso',
                'route_get' => '/manage-access-permissions',
                'route_put' => '/menu-access-permissions',
                'route_post' => null,
                'route_delete' => null,
            ],
            [
                'id' => 5,
                'name' => 'Perfil',
                'route_get' => '/profile',
                'route_put' => '/profile/{id}',
                'route_post' => '/profile',
                'route_delete' => null,
            ],
            [
                'id' => 6,
                'name' => 'Clientes',
                'route_get' => '/clients',
                'route_put' => '/clients/{id}',
                'route_post' => '/clients',
                'route_delete' => '/clients/{id}',
            ],
            [
                'id' => 7,
                'name' => 'Produtos',
                'route_get' => '/products',
                'route_put' => '/products/{id}',
                'route_post' => '/products',
                'route_delete' => '/products/{id}',
            ],
            [
                'id' => 8,
                'name' => 'Comprar',
                'route_get' => '/purchase',
                'route_put' => '/purchase/{id}',
                'route_post' => '/purchase',
                'route_delete' => '/purchase/{id}',
            ],
            [
                'id' => 9,
                'name' => 'Vendas',
                'route_get' => '/sales',
                'route_put' => '/sales/{id}',
                'route_post' => '/sales',
                'route_delete' => '/sales/{id}',
            ],
            [
                'id' => 10,
                'name' => 'PDF',
                'route_get' => '/sales-report',
                'route_put' => null,
                'route_post' => '/sales-report',
                'route_delete' => null,
            ],
        ];

        $currentDateTime = Carbon::now();

        foreach ($menus as $menu) {
            $menu['created_at'] = $currentDateTime;
            $menu['updated_at'] = $currentDateTime;
            Menu::updateOrCreate(['id' => $menu['id']], $menu);
        }
    }
}
