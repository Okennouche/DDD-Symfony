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

use App\DDD\Application\UseCase\Command\User\Registration\Interfaces\RegistrationCommandInterface;


/**
 * Class RegistrationCommand
 *
 * @package App\DDD\Application\UseCase\Command\User\Registration
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
class RegistrationCommand implements RegistrationCommandInterface
{

	/**
	 * @var string
	 */
	protected $uuid;

	/**
	 * @var string
	 */
	protected $username;

	/**
	 * @var string
	 */
	protected $email;

	/**
	 * @var string
	 */
	protected $password;

	/**
	 * RegistrationCommand constructor.
	 *
	 * @param string        $uuid
	 * @param string        $username
	 * @param string        $email
	 * @param string        $password
	 */
	public function __construct(
		string $uuid,
		string $username,
		string $email,
		string $password
	) {
		$this->uuid = $uuid;
		$this->username = $username;
		$this->email = $email;
		$this->password = $password;
	}

	/**
	 * @inheritdoc
	 */
	public function getUuid(): string
	{
		return $this->uuid;
	}

	/**
	 * @inheritdoc
	 */
	public function getUsername(): string
	{
		return $this->username;
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
	public function getPassword(): string
	{
		return $this->password;
	}
}