<?php

declare(strict_types=1);

/**
 *
 * @ Created on 14/01/2019 09:44
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <dev.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Domain\Service\Token;

use App\DDD\Domain\Service\Token\Interfaces\GeneratorTokenInterface;

/**
 * Class GeneratorToken
 *
 * @package App\DDD\Domain\Service\Token
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
final class GeneratorToken implements GeneratorTokenInterface
{
	/**
	 * @inheritdoc
	 */
	public static function token(int $entropy = 256): string
	{
		$bytes = random_bytes($entropy / 8);

		return rtrim(strtr(base64_encode($bytes), '+/', '-_'), '=');
	}
}