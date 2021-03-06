<?php

declare(strict_types=1);

/**
 *
 * @ Created on 14/01/2019 11:47
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <dev.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Infrastructure\Service\MessageBag\Interfaces;

/**
 * Interface OnSuccessAuthenticationInterface
 *
 * @package App\DDD\Infrastructure\Service\MessageBag\Interfaces
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
interface OnSuccessAuthenticationInterface
{
	/**
	 * OnSuccessAuthenticationInterface constructor.
	 *
	 * @param string $username
	 */
	public function __construct(string $username);

	/**
	 * @return string
	 */
	public function getUsername(): string;
}