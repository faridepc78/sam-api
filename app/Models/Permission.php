<?php

namespace App\Models;

class Permission extends \Spatie\Permission\Models\Permission
{
    protected $table = 'permissions';
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

    const PERMISSION_CREATE_USERS = 'create users';
    const PERMISSION_READ_USERS = 'read users';
    const PERMISSION_UPDATE_USERS = 'update users';
    const PERMISSION_DELETE_USERS = 'delete users';

    const PERMISSION_READ_PERMISSIONS = 'read permissions';

    const PERMISSION_CREATE_ROLES = 'create roles';
    const PERMISSION_READ_ROLES = 'read roles';
    const PERMISSION_UPDATE_ROLES = 'update roles';
    const PERMISSION_DELETE_ROLES = 'delete roles';

    const PERMISSION_CREATE_SPACES = 'create spaces';
    const PERMISSION_READ_SPACES = 'read spaces';
    const PERMISSION_UPDATE_SPACES = 'update spaces';
    const PERMISSION_DELETE_SPACES = 'delete spaces';

    const PERMISSION_CREATE_CLERKS = 'create clerks';
    const PERMISSION_READ_CLERKS = 'read clerks';
    const PERMISSION_UPDATE_CLERKS = 'update clerks';
    const PERMISSION_DELETE_CLERKS = 'delete clerks';

    const PERMISSION_CREATE_ORDERS = 'create orders';
    const PERMISSION_READ_ORDERS = 'read orders';
    const PERMISSION_UPDATE_ORDERS = 'update orders';
    const PERMISSION_DELETE_ORDERS = 'delete orders';

    const PERMISSION_MANAGEMENT_STATISTICS = 'management statistics';

    static array $permissions =
        [
            self::PERMISSION_CREATE_USERS,
            self::PERMISSION_READ_USERS,
            self::PERMISSION_UPDATE_USERS,
            self::PERMISSION_DELETE_USERS,

            self::PERMISSION_READ_PERMISSIONS,

            self::PERMISSION_CREATE_ROLES,
            self::PERMISSION_READ_ROLES,
            self::PERMISSION_UPDATE_ROLES,
            self::PERMISSION_DELETE_ROLES,

            self::PERMISSION_CREATE_SPACES,
            self::PERMISSION_READ_SPACES,
            self::PERMISSION_UPDATE_SPACES,
            self::PERMISSION_DELETE_SPACES,

            self::PERMISSION_CREATE_CLERKS,
            self::PERMISSION_READ_CLERKS,
            self::PERMISSION_UPDATE_CLERKS,
            self::PERMISSION_DELETE_CLERKS,

            self::PERMISSION_CREATE_ORDERS,
            self::PERMISSION_READ_ORDERS,
            self::PERMISSION_UPDATE_ORDERS,
            self::PERMISSION_DELETE_ORDERS,

            self::PERMISSION_MANAGEMENT_STATISTICS,
        ];
}
