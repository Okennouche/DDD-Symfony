<?php

declare(strict_types=1);

/**
 *
 * @ Created on 05/01/19 18:54
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <dev.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Domain\ValueObject\User;

use Assert\Assertion;
use App\DDD\Domain\ValueObject\User\Interfaces\UuidInterface;

/**
 * Class Uuid
 *
 * @package App\DDD\Domain\ValueObject\User
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
final class Uuid implements UuidInterface
{
	/**
	 * @var $uuid
	 */
	private $uuid;

	/**
	 * @inheritdoc
	 */
	public static function fromString(string $uuid): Uuid
	{
		Assertion::uuid($uuid, 'This uuid is not valid');

		$uuidVO = new self();

		$uuidVO->uuid = $uuid;

		return $uuidVO;
	}

	/**
	 * @inheritdoc
	 */
	public function toString(): string
	{
		return $this->uuid;
	}
}