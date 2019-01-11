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

namespace App\DDD\Security\User\ValueObject;

use App\DDD\Domain\Exception\User\EmailAlreadyExistException;
use App\DDD\Domain\Repository\User\Interfaces\UserQueryRepositoryInterface;
use App\DDD\Security\User\ValueObject\Interfaces\EmailAlreadyExistInterface;

/**
 * Class EmailAlreadyExist
 *
 * @package App\DDD\Security\User\ValueObject
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
final class EmailAlreadyExist implements EmailAlreadyExistInterface
{
	/**
	 * @var $queryRepository UserQueryRepositoryInterface
	 */
	private $queryRepository;

	/**
	 * @inheritdoc
	 */
	public function __construct(UserQueryRepositoryInterface $queryRepository)
	{
		$this->queryRepository = $queryRepository;
	}

	/**
	 * @inheritdoc
	 */
	public function __invoke(string $email)
	{
		if ($this->queryRepository->existsEmail($email)) {
			throw new EmailAlreadyExistException('This email already registered');
		}
	}
}