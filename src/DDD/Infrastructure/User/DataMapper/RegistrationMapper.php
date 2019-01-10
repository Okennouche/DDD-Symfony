<?php

declare(strict_types=1);

/**
 *
 * @ Created on 05/01/19 17:47
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <dev.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Infrastructure\User\DataMapper;

use Assert\AssertionFailedException;
use Symfony\Component\Form\FormError;
use Symfony\Component\Form\Exception;
use App\DDD\Domain\Service\Uuid\Uuid;
use Symfony\Component\Form\FormInterface;
use App\DDD\Domain\ValueObject\User\Email;
use App\DDD\Domain\ValueObject\User\Username;
use App\DDD\Domain\ValueObject\User\Password;
use App\DDD\Domain\ValueObject\User\PasswordConfirm;
use App\DDD\Application\UseCase\Command\User\Registration\RegistrationCommand;
use App\DDD\Infrastructure\User\DataMapper\Interfaces\RegistrationMapperInterface;

/**
 * Class RegistrationMapper
 *
 * @package App\DDD\Infrastructure\User\DataMapper
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
final class RegistrationMapper implements RegistrationMapperInterface
{
	/**
	 * Maps properties of some data to a list of forms.
	 *
	 * @param mixed                        $data Structured data
	 * @param FormInterface[]|\Traversable $forms A list of {@link FormInterface} instances
	 *
	 * @throws Exception\UnexpectedTypeException if the type of the data parameter is not supported
	 */
	public function mapDataToForms($data, $forms)
	{
		// there is no data yet, so nothing to prepopulate
		if (null === $data) {
			return;
		}

		// invalid data type
		if (!$data instanceof RegistrationCommand) {
			throw new Exception\UnexpectedTypeException($data, RegistrationCommand::class);
		}

		/** @var FormInterface[] $forms */
		$forms = iterator_to_array($forms);

		// initialize form field values
		$forms['username']->setData($data->getUsername());
		$forms['email']->setData($data->getEmail());
		$forms['password']->setData($data->getPassword());
	}

	/**
	 * Maps the data of a list of forms into the properties of some data.
	 *
	 * @param FormInterface[]|\Traversable $forms A list of {@link FormInterface} instances
	 * @param mixed                        $data Structured data
	 *
	 * @throws Exception\UnexpectedTypeException if the type of the data parameter is not supported
	 * @return mixed
	 */
	public function mapFormsToData($forms, &$data)
	{
		$forms = iterator_to_array($forms);

		try {
			/** @var $username */
			$username = Username::fromString($forms['username']->getData());
		} catch (AssertionFailedException $exception) {
			$error = new FormError($exception->getMessage());
			return $forms['username']->addError($error);
		}

		try {
			/** @var $email */
			$email = Email::fromString($forms['email']->getData());
		} catch (AssertionFailedException $exception) {
			$error = new FormError($exception->getMessage());
			return $forms['email']->addError($error);
		}

		try {
			/** @var $password */
			$password = Password::fromString($forms['password']->getData());
		} catch (AssertionFailedException $exception) {
			$error = new FormError($exception->getMessage());
			return $forms['password']->addError($error);
		}

		try {
			PasswordConfirm::fromString($password->toString(), $forms['confirm_password']->getData());
		} catch (AssertionFailedException $exception) {
			$error = new FormError($exception->getMessage());
			$forms['password']->addError($error);
			return $forms['confirm_password']->addError($error);
		}

		$data = [
			'uuid' => Uuid::uuid(),
			'username' => $username->toString(),
			'email' => $email->toString(),
			'password' => $password->toString()
		];

		return $forms;
	}
}