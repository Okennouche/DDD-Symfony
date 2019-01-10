<?php

declare(strict_types=1);

/**
 *
 * @ Created on 28/12/18 05:17
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <dev.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Application\UseCase\Command\User\Registration\Handler\Interfaces;

use App\DDD\Security\User\Encoder\Interfaces\EncoderInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use App\DDD\Domain\Repository\User\Interfaces\UserCommandRepositoryInterface;
use App\DDD\Application\UseCase\Command\User\Registration\Interfaces\RegistrationCommandInterface;

/**
 * Interface RegistrationHandlerInterface
 *
 * @package App\DDD\Application\UseCase\Command\User\Registration\Handler\Interfaces
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
interface RegistrationHandlerInterface extends MessageHandlerInterface
{
	/**
	 * RegistrationHandlerInterface constructor.
	 *
	 * @param UserCommandRepositoryInterface $repository
	 * @param EncoderInterface               $encoder
	 */
	public function __construct(UserCommandRepositoryInterface $repository, EncoderInterface $encoder);

	/**
	 * @param RegistrationCommandInterface $command
	 *
	 * @return mixed
	 */
	public function __invoke(RegistrationCommandInterface $command);
}