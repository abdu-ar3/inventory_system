<?php

return [

    'models' => [
        'role' => Spatie\Permission\Models\Role::class,
        'permission' => Spatie\Permission\Models\Permission::class,
        'user' => App\Models\User::class, // Pastikan ini merujuk ke model User yang sesuai
    ],

    'table_names' => [
        'roles' => 'roles',
        'permissions' => 'permissions',
        'model_has_permissions' => 'model_has_permissions',
        'model_has_roles' => 'model_has_roles',
        'role_has_permissions' => 'role_has_permissions',
        'role_user' => 'role_user', // Pastikan ini adalah nama tabel pivot yang benar
    ],

    'column_names' => [
        'role' => 'name',
        'permission' => 'name',
        'user' => 'email',
        'model_morph_key' => 'model_id',  // pastikan model_morph_key ada dan mengarah ke kolom yang tepat
        'model_type' => 'model_type',     // biasanya 'model_type' untuk model yang polymorphic
        'role_pivot_key' => 'role_id',
        'permission_pivot_key' => 'permission_id',
        'team_foreign_key' => 'team_id',  // jika Anda me
    ],

    'display_permission_in_exception' => false,
];
