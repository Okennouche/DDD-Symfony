<?php

declare(strict_types=1);

/**
 *
 * @ Created on 28/12/18 05:14
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <dev.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Application\UseCase\Command\User\Registration;

use App\DDD\Shared\Uuid\Uuid;
use App\DDD\Shared\Token\Token;
use App\DDD\Application\UseCase\Command\User\Registration\Interfaces\AddTokenForAccountValidationCommandInterface;


/**
 * Class AddTokenForAccountValidationCommand
 *
 * @package App\DDD\Application\UseCase\Command\User\Registration
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
final class AddTokenForAccountValidationCommand implements AddTokenForAccountValidationCommandInterface
{
	/**
	 * @var Uuid $uuid
	 */
	protected $uuid;

	/**
	 * @var Token $token
	 */
	protected $token;

	/**
	 * @inheritdoc
	 */
	public function __construct(
		Uuid $uuid,
		Token $token
	) {
		$this->uuid = $uuid;
		$this->token = $token;
	}

	/**
	 * @inheritdoc
	 */
	public function getUuid(): Uuid
	{
		return $this->uuid;
	}

	/**
	 * @inheritdoc
	 */
	public function getToken(): Token
	{
		return $this->token;
	}
}