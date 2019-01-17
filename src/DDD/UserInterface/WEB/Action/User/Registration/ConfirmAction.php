<?php

declare(strict_types=1);

/**
 *
 * @ Created on 16/01/19 20:58
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <dev.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\UserInterface\WEB\Action\User\Registration;

use Symfony\Component\Routing\Annotation\Route;
use App\DDD\UserInterface\WEB\Action\User\Registration\Interfaces\ConfirmActionInterface;


/**
 * Class ConfirmAction
 *
 * @package App\DDD\UserInterface\WEB\Action\User\Registration
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 * @Route({"en": "/confirm", "fr": "/confirmation"}, name="confirm_registration", methods={"GET"})
 */
final class ConfirmAction implements ConfirmActionInterface
{

}