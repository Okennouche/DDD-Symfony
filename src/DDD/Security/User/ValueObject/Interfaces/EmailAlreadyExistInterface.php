<?php

declare(strict_types=1);

/**
 *
 * @ Created on 10/01/2019 15:42
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <dev.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Security\User\ValueObject\Interfaces;

use Symfony\Component\Messenger\MessageBusInterface;

/**
 * Interface EmailAlreadyExistInterface
 *
 * @package App\DDD\Security\User\ValueObject\Interfaces
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
interface EmailAlreadyExistInterface
{
	/**
	 * EmailAlreadyExistInterface constructor.
	 *
	 * @param MessageBusInterface $bus
	 */
	public function __construct(MessageBusInterface $bus);

	/**
	 * @param string $email
	 *
	 * @return mixed
	 */
	public function __invoke(string $email);
}