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

use App\DDD\Domain\Exception\User\EmailAlreadyExistException;
use App\DDD\Domain\Repository\User\Interfaces\UserQueryRepositoryInterface;


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
	 * @param UserQueryRepositoryInterface $queryRepository
	 */
	public function __construct(UserQueryRepositoryInterface $queryRepository);

	/**
	 * @param string $email
	 *
	 * @return mixed
	 * @throws EmailAlreadyExistException
	 */
	public function __invoke(string $email);
}