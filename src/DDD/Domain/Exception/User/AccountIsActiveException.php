<?php

declare(strict_types=1);

/**
 *
 * @ Created on 11/01/2019 10:08
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <dev.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Domain\Exception\User;

use App\DDD\Domain\Exception\User\Interfaces\AccountIsActiveExceptionInterface;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;


/**
 * Class AccountIsActiveException
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
final class AccountIsActiveException extends CustomUserMessageAuthenticationException implements AccountIsActiveExceptionInterface
{
}