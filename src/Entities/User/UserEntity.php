<?php 
declare(strict_types=1);

namespace App\Entities\User;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Component\Console\Helper\Table;
use App\Value\DateTime;
use App\Entities\User\Enum\Status\Status;
use App\Entities\User\Enum\Role\Role;
use Doctrine\DBAL\Schema\Column;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\GeneratedValue;

#[Entity]
#[Table(name: "user")]
class UserEntity
{
    #[Column(name:"internalId"), Id, GeneratedValue]
    private readonly int $internalId;

    #[Column(type:"value_id", name:"id")]
    private $id;

    #[Column(name:"name", type:"string")]
    private $name;

    #[Column(name:"email_address", type:"email_address")]
    private $emailAddress;

    #[Column(name:"password", type:"string")]
    private $password;

    #[Column(name:"date_created", type:"date_time")]
    private $dateCreated = DateTime::dateNow();

    #[Column(name:"roles", type:"string", enumType: Role::class)]
    private $roles;

    #[Column(name:"status", type:"string", enumType: Status::class)]
    private $status;
}