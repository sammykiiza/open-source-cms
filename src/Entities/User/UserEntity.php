<?php 
declare(strict_types=1);

namespace App\Entities\User;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Component\Console\Helper\Table;
use App\Value\DateTime;
use App\Entities\User\Enum\Status\Status;
use App\Entities\User\Enum\Role\Role;

#[Entity]
#[Table(name: "user")]
class UserEntity
{
    /**
     * @Id 
     * @Column(type="integer")
     * @GeneratedValue
     */
    private $internalId;

    /**
     * @Column(name="id", type="value_id")
     */
    private $id;

    /**
     * @Column(name="name", type="text")
     */
    private $name;

    /**
     * @Column(name="email_address", type="email_address")
     */
    private $emailAddress;

    /**
     * @Column(name="password_hash", type="text")
     */
    private $password;

    /**
     * @Column(name="date_created", type="date_time")
     */
    private $dateCreated = DateTime::dateNow();

    /**
     * @Column(name="roles", type="string", enumType=Role::class)
     */
    private $roles;

    /**
     * @Column(name="status", type="string", enumType=Status::class)
     */
    private $status;
}