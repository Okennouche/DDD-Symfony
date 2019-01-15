<?php

declare(strict_types=1);

/**
 *
 * @ Created on 15/01/2019 16:18
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <dev.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Application\UseCase\Command\User\Registration\Interfaces;

use App\DDD\Shared\Token\Token;
use App\DDD\Shared\Uuid\Uuid;

/**
 * Interface AddTokenForAccountValidationCommandInterface
 *
 * @package App\DDD\Application\UseCase\Command\User\Registration\Interfaces
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
interface AddTokenForAccountValidationCommandInterface
{
	/**
	 * AddTokenForAccountValidationCommandInterface constructor.
	 *
	 * @param Uuid  $uuid
	 * @param Token $token
	 */
	public function __construct(Uuid $uuid, Token $token);

	/**
	 * @return Uuid
	 */
	public function getUuid(): Uuid;

	/**
	 * @return Token
	 */
	public function getToken(): Token;
}