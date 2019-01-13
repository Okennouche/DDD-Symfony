<?php

declare(strict_types=1);

/**
 *
 * @ Created on 12/01/19 17:29
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <dev.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Application\UseCase\Query\User\Handler;

use App\DDD\Application\UseCase\Query\User\Handler\Interfaces\FindByEmailQueryHandlerInterface;
use App\DDD\Application\UseCase\Query\User\Interfaces\FindByEmailQueryInterface;
use App\DDD\Domain\Exception\User\EmailAlreadyExistException;
use App\DDD\Domain\Repository\User\Interfaces\UserQueryRepositoryInterface;
use Symfony\Contracts\Translation\TranslatorInterface;


/**
 * Class FindByEmailQueryHandler
 *
 * @package App\DDD\Application\UseCase\Query\User\Handler
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
final class FindByEmailQueryHandler implements FindByEmailQueryHandlerInterface
{
	/**
	 * @var $queryRepository UserQueryRepositoryInterface
	 */
	private $queryRepository;
	/**
	 * @var TranslatorInterface
	 */
	private $translator;

	/**
	 * @inheritdoc
	 */
	public function __construct(
		UserQueryRepositoryInterface $queryRepository,
		TranslatorInterface $translator
	) {
		$this->queryRepository = $queryRepository;
		$this->translator = $translator;
	}

	/**
	 * @inheritdoc
	 */
	public function __invoke(FindByEmailQueryInterface $query): ?string
	{
		$email = $this->queryRepository->findByEmail($query->getEmail());

		if ($email) {
			throw new EmailAlreadyExistException(
				$this->translator->trans('registration_email_exist', [], 'security_registration')
			);
		}

		return $email['uuid'];
	}
}