<?php

declare(strict_types=1);

/**
 *
 * @ Created on 16/01/2019 11:37
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <dev.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Domain\Event\User\Interfaces;

use App\DDD\Shared\DomainEvent\Interfaces\DomainEventInterface;

/**
 * Interface UserEmailWasChangedInterface
 *
 * @package App\DDD\Domain\Event\User\Interfaces
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
interface UserEmailWasChangedInterface extends DomainEventInterface
{

}