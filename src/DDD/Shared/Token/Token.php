<?php

declare(strict_types=1);

/**
 *
 * @ Created on 15/01/2019 16:22
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <dev.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Shared\Token;

use App\DDD\Domain\Service\Token\GeneratorToken;


/**
 * Class Token
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
class Token
{
	/**
	 * @var string $token
	 */
	private $token;

	/**
	 * Token constructor.
	 *
	 * @param string $token
	 */
	public function __construct(string $token)
	{
		$this->token = $token;
	}

	/**
	 * @return Token
	 */
	public static function generate(): Token
	{
		return new Token(GeneratorToken::token());
	}

	/**
	 * @inheritdoc
	 */
	public function __toString(): string
	{
		return (string) $this->token;
	}
}