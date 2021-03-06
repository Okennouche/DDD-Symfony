<?php

declare(strict_types=1);

/**
 *
 * @ Created on 05/01/19 19:48
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <dev.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Security\User\Encoder\Interfaces;

use Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface;

/**
 * Interface EncoderInterface
 *
 * @package App\DDD\Security\User\Encoder\Interfaces
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
interface EncoderInterface extends PasswordEncoderInterface
{
}