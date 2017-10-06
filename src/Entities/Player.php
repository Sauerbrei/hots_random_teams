<?php

namespace Entities;

use Doctrine\ORM\Mapping AS ORM;

/**
 * Class Player
 * @package Entities
 *
 * @ORM\Entity
 * @ORM\Table(name="hots_random_teams_player")
 */
class Player {
	/**
	 * @var int
	 *
	 * @ORM\Id()
	 * @ORM\GeneratedValue(strategy="AUTO")
	 * @ORM\Column(type="integer")
	 */
	private $id;

	/**
	 * @var Team
	 *
	 * @ORM\ManyToOne(targetEntity="Team")
	 * @ORM\JoinColumn(name="team_id", referencedColumnName="id", nullable=true)
	 */
	private $team;

	/**
	 * @var string
	 *
	 * @ORM\Column(type="string")
	 */
	private $name;

	/**
	 * @var int
	 *
	 * @ORM\Column(type="integer")
	 */
	private $games = 0;

	/**
	 * @var int
	 *
	 * @ORM\Column(type="integer")
	 */
	private $wins = 0;

	/**
	 * @var int
	 *
	 * @ORM\Column(type="integer")
	 */
	private $loss = 0;

	/**
	 * @return int
	 */
	public function getId(): int {
		return $this->id;
	}

	/**
	 * @param int $id
	 * @return Player
	 */
	public function setId(int $id): Player {
		$this->id = $id;
		return $this;
	}

	/**
	 * @return Team|null
	 */
	public function getTeam() {
		return $this->team;
	}

	/**
	 * @param Team $team
	 * @return Player
	 */
	public function setTeam(Team $team): Player {
		$this->team = $team;
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
	 * @return Player
	 */
	public function setName(string $name): Player {
		$this->name = $name;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getGames(): int {
		return $this->games;
	}

	/**
	 * @param int $games
	 * @return Player
	 */
	public function setGames(int $games): Player {
		$this->games = $games;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getWins(): int {
		return $this->wins;
	}

	/**
	 * @param int $wins
	 * @return Player
	 */
	public function setWins(int $wins): Player {
		$this->wins = $wins;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getLoss(): int {
		return $this->loss;
	}

	/**
	 * @param int $loss
	 * @return Player
	 */
	public function setLoss(int $loss): Player {
		$this->loss = $loss;
		return $this;
	}
}