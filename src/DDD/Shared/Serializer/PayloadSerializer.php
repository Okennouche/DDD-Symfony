<?php

declare(strict_types=1);

/**
 *
 * @ Created on 15/01/2019 11:54
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <dev.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Shared\Serializer;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\PropertyNormalizer;
use App\DDD\Shared\Serializer\Interfaces\PayloadSerializerInterface;


/**
 * Class PayloadSerializer
 *
 * @package App\DDD\Shared\Serializer
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
final class PayloadSerializer implements PayloadSerializerInterface
{
	/**
	 * @var Serializer
	 */
	private $serializer;

	/**
	 * PayloadSerializer constructor.
	 */
	public function __construct()
	{
		$this->serializer = new Serializer([new PropertyNormalizer()],[new JsonEncoder()]);
	}

	/**
	 * @inheritdoc
	 */
	public function serialize($data, $format, array $context = array())
	{
		return $this->serializer->serialize($data, 'json');
	}

	/**
	 * Deserializes data into the given type.
	 *
	 * @param mixed  $data
	 * @param string $type
	 * @param string $format
	 * @param array  $context
	 *
	 * @return object
	 */
	public function deserialize($data, $type, $format, array $context = array())
	{
		return $this->serializer->deserialize($data, $type, 'json');
	}
}