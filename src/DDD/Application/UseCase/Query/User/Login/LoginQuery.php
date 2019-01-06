<?php

declare(strict_types=1);

/**
 *
 * @ created on 05/01/19 22:21
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <o.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Application\UseCase\Query\User\Login;

use App\DDD\Application\UseCase\Query\User\Login\Interfaces\LoginQueryInterface;


/**
 * class LoginQuery
 *
 * @author Omar Kennouche <o.kennouche@gmail.com>
 */
class LoginQuery implements LoginQueryInterface
{
	/**
	 * @var $email
	 */
	private $email;

	/**
	 * @var $plainPassword
	 */
	private $plainPassword;

	public function __construct(
		string $email,
		string $plainPassword
	) {
		$this->email = $email;
		$this->plainPassword = $plainPassword;
	}

	/**
	 * @inheritdoc
	 */
	public function getEmail(): string
	{
		return $this->email;
	}

	/**
	 * @inheritdoc
	 */
	public function getPlainPassword(): string
	{
		return $this->plainPassword;
	}
}