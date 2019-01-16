<?php

declare(strict_types=1);

/**
 *
 * @ Created on 14/01/2019 11:47
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <dev.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Infrastructure\Service\MessageBag;

use App\DDD\Infrastructure\Service\MessageBag\Interfaces\OnSuccessAuthenticationInterface;


/**
 * Class OnSuccessAuthentication
 *
 * @package App\DDD\Infrastructure\Service\MessageBag
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
final class OnSuccessAuthentication implements OnSuccessAuthenticationInterface
{
	/**
	 * @var string $username
	 */
	protected $username;

	/**
	 * OnSuccessAuthentication constructor.
	 *
	 * @param string $username
	 */
	public function __construct(string $username)
	{
		$this->username = $username;
	}

	/**
	 * @inheritdoc
	 */
	public function getUsername(): string
	{
		return $this->username;
	}
}