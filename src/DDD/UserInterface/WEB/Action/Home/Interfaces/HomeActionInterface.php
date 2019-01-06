<?php

declare(strict_types=1);

/**
 *
 * @ created on 06/01/19 12:36
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <o.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\UserInterface\WEB\Action\Home\Interfaces;

use Symfony\Component\HttpFoundation\Request;


/**
 * class HomeActionInterface
 *
 * @author Omar Kennouche <o.kennouche@gmail.com>
 */
interface HomeActionInterface
{

	/**
	 * @param Request $request
	 *
	 * @return mixed
	 */
	public function __invoke(Request $request);
}