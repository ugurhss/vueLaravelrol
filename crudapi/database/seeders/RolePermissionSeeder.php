<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Önce önbelleği temizle
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // İzinleri oluştur
        $permissions = [
            'kullanıcıları gör',
            'kullanıcı oluştur',
            'kullanıcı düzenle',
            'kullanıcı sil',
        ];

        foreach ($permissions as $perm) {
            Permission::firstOrCreate(['name' => $perm]);
        }

        // Roller oluştur
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $editorRole = Role::firstOrCreate(['name' => 'editor']);

        // Roller için izinleri ata
        $adminRole->syncPermissions(Permission::all());
        $editorRole->syncPermissions(['kullanıcıları gör']);

        // Örnek kullanıcıya rol ver (id = 1 olan kullanıcıya)
        $adminUser = User::find(1);
        if ($adminUser) {
            $adminUser->assignRole('admin');
        }
    }
}
