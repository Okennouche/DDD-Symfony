<?php

declare(strict_types=1);

/**
 *
 * @ created on 05/01/19 22:44
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <o.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Application\UseCase\Query\User\Login\Handler\Interfaces;

use App\DDD\Domain\Security\Encoder\Interfaces\EncoderInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use App\DDD\Domain\Repository\User\Interfaces\UserQueryRepositoryInterface;
use App\DDD\Application\UseCase\Query\User\Login\Interfaces\LoginQueryInterface;


/**
 * class LoginQueryHandlerInterface
 *
 * @author Omar Kennouche <o.kennouche@gmail.com>
 */
interface LoginQueryHandlerInterface extends MessageHandlerInterface
{

	/**
	 * LoginQueryHandlerInterface constructor.
	 *
	 * @param UserQueryRepositoryInterface $repository
	 * @param EncoderInterface             $encoder
	 */
	public function __construct(UserQueryRepositoryInterface $repository, EncoderInterface $encoder);

	/**
	 * @param LoginQueryInterface $query
	 *
	 * @return mixed
	 */
	public function __invoke(LoginQueryInterface $query);
}