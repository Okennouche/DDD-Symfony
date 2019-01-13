<?php

declare(strict_types=1);

/**
 *
 * @ Created on 12/01/19 17:30
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <dev.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Application\UseCase\Query\User;

use App\DDD\Application\UseCase\Query\User\Interfaces\FindByEmailQueryInterface;


/**
 * Class FindByEmailQuery
 *
 * @package App\DDD\Application\UseCase\Query\User
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
final class FindByEmailQuery implements FindByEmailQueryInterface
{
	/**
	 * @var string $email
	 */
	private $email;

	/**
	 * FindByEmailQuery constructor.
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