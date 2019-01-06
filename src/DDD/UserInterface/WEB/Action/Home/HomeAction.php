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

namespace App\DDD\UserInterface\WEB\Action\Home;

use Twig\Environment;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\DDD\UserInterface\WEB\Action\Home\Interfaces\HomeActionInterface;


/**
 * class HomeAction
 *
 * @author Omar Kennouche <o.kennouche@gmail.com>
 * @Route("/home", name="home")
 *
 */
final class HomeAction implements HomeActionInterface
{

	/**
	 * @var Environment
	 */
	private $twig;

	/**
	 * HomeAction constructor.
	 *
	 * @param Environment $twig
	 */
	public function __construct(
		Environment $twig
	) {
		$this->twig = $twig;
	}

	/**
	 * @param Request $request
	 *
	 * @return mixed
	 */
	public function __invoke(Request $request)
	{
		return new Response(
			$this->twig->render(
				"Home/home.html.twig"
			)
		);
	}
}