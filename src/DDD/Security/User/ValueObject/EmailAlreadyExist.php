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

use Symfony\Component\Messenger\MessageBusInterface;
use App\DDD\Application\UseCase\Query\User\FindByEmailQuery;
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
	 * @var MessageBusInterface $bus
	 */
	private $bus;

	/**
	 * EmailAlreadyExistInterface constructor.
	 *
	 * @param MessageBusInterface $bus
	 *
	 * @internal param UserQueryRepositoryInterface $queryRepository
	 */
	public function __construct(MessageBusInterface $bus)
	{
		$this->bus = $bus;
	}

	/**
	 * @inheritdoc
	 */
	public function __invoke(string $email)
	{
		$this->bus->dispatch(new FindByEmailQuery($email));
	}
}