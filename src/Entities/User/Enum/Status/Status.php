<?php 
declare(strict_types=1);

namespace App\Entities\User\Enum\Status;

enum Status : string
{
    case ACTIVE = 'ACTIVE';
    case INACTIVE = 'INACTIVE';
}
?>