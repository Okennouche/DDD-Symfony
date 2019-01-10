<?php

declare(strict_types=1);

/**
 *
 * @ Created on 06/01/19 12:36
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <dev.kennouche@gmail.com>
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
 * Class HomeAction
 *
 * @package App\DDD\UserInterface\WEB\Action\Home
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 * @Route({"en": "/homepage", "fr": "/accueil"}, name="home")
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