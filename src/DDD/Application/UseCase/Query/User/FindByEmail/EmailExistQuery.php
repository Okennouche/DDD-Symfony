<?php

declare(strict_types=1);

/**
 *
 * @ Created on 10/01/2019 15:35
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <dev.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Application\UseCase\Query\User\FindByEmail;

use App\DDD\Application\UseCase\Query\User\FindByEmail\Interfaces\EmailExistQueryInterface;

/**
 * Class EmailExistQuery
 *
 * @package App\DDD\Application\UseCase\Query\User\FindByEmail
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
class EmailExistQuery implements EmailExistQueryInterface
{
	/**
	 * @var $email string
	 */
	private $email;

	/**
	 * EmailExistQuery constructor.
	 *
	 * @param string $email
	 */
	public function __construct(string $email)
	{
		$this->email = $email;
	}

	/**
	 * @inheritdoc
	 */
	public function getEmail(): string
	{
		return $this->email;
	}
}