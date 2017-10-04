<?php
/**
 * Created by PhpStorm.
 * User: PaarBreakdowns
 * Date: 03.10.2017
 * Time: 14:58
 */

namespace Entities;

use Doctrine\ORM\Mapping AS ORM;

/**
 * Class Team
 * @package Entities
 *
 * @ORM\Entity
 * @ORM\Table(name="hots_random_teams_team")
 */
class Team {
	/**
	 * @var int
	 *
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 * @ORM\Column(type="integer")
	 */
	private $id;

	/**
	 * @var string
	 *
	 * @ORM\Column(type="string")
	 */
	private $name;

	/**
	 * @return int
	 */
	public function getId(): int {
		return $this->id;
	}

	/**
	 * @param int $id
	 * @return Team
	 */
	public function setId(int $id): Team {
		$this->id = $id;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getName(): string {
		return $this->name;
	}

	/**
	 * @param string $name
	 * @return Team
	 */
	public function setName(string $name): Team {
		$this->name = $name;
		return $this;
	}
}