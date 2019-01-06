<?php

declare(strict_types=1);

/**
 *
 * @ created on 28/12/18 05:17
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <o.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Application\UseCase\Command\User\Registration\Handler\Interfaces;

use App\DDD\Domain\Security\Encoder\Interfaces\EncoderInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\DDD\Domain\Repository\User\Interfaces\UserCommandRepositoryInterface;
use App\DDD\Application\UseCase\Command\User\Registration\Interfaces\RegistrationCommandInterface;


/**
 * class RegistrationHandlerInterface
 *
 * @author Omar Kennouche <o.kennouche@gmail.com>
 */
interface RegistrationHandlerInterface extends MessageHandlerInterface
{

	/**
	 * RegistrationHandlerInterface constructor.
	 *
	 * @param UserCommandRepositoryInterface $repository
	 * @param EncoderInterface               $encoder
	 */
	public function __construct(UserCommandRepositoryInterface $repository, UserPasswordEncoderInterface $encoder);

	/**
	 * @param RegistrationCommandInterface $command
	 *
	 * @return mixed
	 */
	public function __invoke(RegistrationCommandInterface $command);
}