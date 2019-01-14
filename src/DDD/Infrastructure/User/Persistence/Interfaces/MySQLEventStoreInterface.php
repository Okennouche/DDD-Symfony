<?php

declare(strict_types=1);

/**
 *
 * @ Created on 14/01/19 18:45
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <dev.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Infrastructure\User\Persistence\Interfaces;

use App\DDD\Shared\EventStore\Interfaces\EventStoreInterface;


/**
 * Interface MySQLEventStoreInterface
 *
 * @package App\DDD\Infrastructure\User\Persistence\Interfaces
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
interface MySQLEventStoreInterface extends EventStoreInterface
{

}