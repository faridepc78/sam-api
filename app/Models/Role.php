<?php

namespace App\Models;

class Role extends \Spatie\Permission\Models\Role
{
    protected $table = 'roles';
    protected $guarded =
        [
            'id',
            'created_at',
            'updated_at',
        ];

    protected $fillable =
        [
            'name',
            'guard_name',
        ];

    const ADMIN_ROLE = 'admin';
    const USER_ROLE = 'user';

    static array $roles =
        [
            self::ADMIN_ROLE =>
                [
                    Permission::PERMISSION_CREATE_USERS,
                    Permission::PERMISSION_READ_USERS,
                    Permission::PERMISSION_UPDATE_USERS,
                    Permission::PERMISSION_DELETE_USERS,

                    Permission::PERMISSION_READ_PERMISSIONS,

                    Permission::PERMISSION_CREATE_ROLES,
                    Permission::PERMISSION_READ_ROLES,
                    Permission::PERMISSION_UPDATE_ROLES,
                    Permission::PERMISSION_DELETE_ROLES,

                    Permission::PERMISSION_CREATE_SPACES,
                    Permission::PERMISSION_READ_SPACES,
                    Permission::PERMISSION_UPDATE_SPACES,
                    Permission::PERMISSION_DELETE_SPACES,

                    Permission::PERMISSION_CREATE_CLERKS,
                    Permission::PERMISSION_READ_CLERKS,
                    Permission::PERMISSION_UPDATE_CLERKS,
                    Permission::PERMISSION_DELETE_CLERKS,

                    Permission::PERMISSION_CREATE_ORDERS,
                    Permission::PERMISSION_READ_ORDERS,
                    Permission::PERMISSION_UPDATE_ORDERS,
                    Permission::PERMISSION_DELETE_ORDERS,

                    Permission::PERMISSION_MANAGEMENT_STATISTICS,
                ],
            self::USER_ROLE => [],
        ];
}
