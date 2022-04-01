<?php 
declare(strict_types=1);

namespace App\Entities\User\Enum\Role;

enum Role : string
{
    case SUPER_ADMIN = 'SUPER ADMIN';
    case ADMIN = 'ADMIN';
    case MANAGER = 'MANAGER';
    case USER = 'USER';
}

?>