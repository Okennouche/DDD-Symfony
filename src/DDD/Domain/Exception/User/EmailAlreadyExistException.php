<?php

declare(strict_types=1);

/**
 *
 * @ Created on 10/01/2019 12:24
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <dev.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Domain\Exception\User;

use App\DDD\Domain\Exception\User\Interfaces\EmailAlreadyExistExceptionInterface;

/**
 * Class EmailAlreadyExistException
 *
 * @package App\DDD\Domain\Exception\User
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
final class EmailAlreadyExistException extends \InvalidArgumentException implements EmailAlreadyExistExceptionInterface
{
}