<?php 
declare(strict_types=1);

namespace App\Entities\User;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Component\Console\Helper\Table;
use App\Entities\User\Enum\Status\Status;
use App\Entities\User\Enum\Role\Role;
use Doctrine\DBAL\Schema\Column;
use Doctrine\ORM\Mapping\Id as InternalId;
use Doctrine\ORM\Mapping\GeneratedValue;
use App\Value\Id;
use App\Value\EmailAddress\EmailAddress;
use App\Value\DateTime\DateTimeValue;

#[Entity]
#[Table(name: "user")]
class UserEntity
{
    #[Column(name:"internalId"), InternalId, GeneratedValue]
    private readonly int $internalId;

    #[Column(type:"value_id", name:"id")]
    private Id $id;

    #[Column(name:"name", type:"string")]
    private string $name;

    #[Column(name:"email_address", type:"email_address")]
    private EmailAddress $emailAddress;

    #[Column(name:"password", type:"string")]
    private string $password;

    #[Column(name:"date_created", type:"date_time")]
    private DateTimeValue $dateCreated = DateTimeValue::dateNow();

    #[Column(name:"roles", type:"array")]
    private  array $roles;

    #[Column(name:"status", type:"string", enumType: Status::class)]
    private Status $status = Status::ACTIVE;

    public function createNewUser(
        Id $id,
        string $name,
        EmailAddress $emailAddress,
        string $password,
    ): self
    {
        $user = new self();
        $user->id = $id;
        $user->name = $name;
        $user->emailAddress = $emailAddress;
        $user->roles[] = Role::USER;
        return $user;
    }
}