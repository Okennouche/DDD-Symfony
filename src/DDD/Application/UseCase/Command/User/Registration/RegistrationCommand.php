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
use App\DDD\Application\UseCase\Command\User\Registration\Interfaces\RegistrationCommandInterface;


/**
 * Class RegistrationCommand
 *
 * @package App\DDD\Application\UseCase\Command\User\Registration
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
final class RegistrationCommand implements RegistrationCommandInterface
{
	/**
	 * @var Uuid $uuid
	 */
	protected $uuid;

	/**
	 * @var string $username
	 */
	protected $username;

	/**
	 * @var string $email
	 */
	protected $email;

	/**
	 * @var string $password
	 */
	protected $password;

	/**
	 * @var string $token
	 */
	protected $token;

	/**
	 * @inheritdoc
	 */
	public function __construct(
		array $dataForms
	) {
		$this->uuid = $dataForms['uuid'];
		$this->username = $dataForms['username'];
		$this->email = $dataForms['email'];
		$this->password = $dataForms['password'];
		$this->token = $dataForms['token'];
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

	/**
	 * @inheritdoc
	 */
	public function getToken(): string
	{
		return $this->token;
	}
}