<?php

declare(strict_types=1);

/**
 *
 * @ Created on 30/12/18 12:14
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <dev.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\UserInterface\WEB\Action\User\Registration\Interfaces;

use Symfony\Component\HttpFoundation\Request;

/**
 * Interface RegistrationActionInterface
 *
 * @package App\DDD\UserInterface\WEB\Action\User\Registration\Interfaces
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
interface RegistrationActionInterface
{
	/**
	 * @param Request $request
	 *
	 * @return mixed
	 */
	public function __invoke(Request $request);
}