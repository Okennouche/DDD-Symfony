<?php

declare(strict_types=1);

/**
 *
 * @ created on 05/01/19 23:20
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <o.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\UserInterface\WEB\Action\User\Login\Interfaces;

use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;


/**
 * class LoginActionInterface
 *
 * @author Omar Kennouche <o.kennouche@gmail.com>
 */
interface LoginActionInterface
{
	/**
	 * @param AuthenticationUtils $authenticationUtils
	 *
	 * @return mixed
	 */
	public function __invoke(AuthenticationUtils $authenticationUtils);
}