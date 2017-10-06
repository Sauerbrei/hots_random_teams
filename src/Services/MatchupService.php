<?php

/**
 * Created by PhpStorm.
 * User: PaarBreakdowns
 * Date: 03.10.2017
 * Time: 15:53
 */

namespace Services;

use Entities\Player;
use Exceptions\NotEnoughPlayerException;

/**
 * Class MatchupService
 * @package Service
 */
class MatchupService {
	/** @var int */
	const MAX_TEAMS = 2;

	/** @var int */
	const MAX_PLAYER_PER_TEAM = 5;

	const MAPS = [
		'Sky Temple',
		'Infernal Shrines',
		'Hanamura',
		'Volskaya Foundry',
		'Haunted Mines',
		'Towers of Doom',
		'Battlefield of Eternity',
		'Tomb of the Spider Queen',
		'Garden of Terror',
		'Blackhearts Bay',
		'Dragon Shire',
		'Cursed Hollow',
		'Braxis Holdout',
		'Warhead Junction'
	];

	/** @var array */
	var $players;

	/**
	 * @var array
	 */
	var $matchup;

	/**
	 * MatchupService constructor.
	 * @param array $player
	 */
	public function __construct(array $players) {
		$this->players = $players;
	}

	/**
	 * @return $this|NotEnoughPlayerException
	 */
	public function build() {
		if (!$this->check($this->players)) {
			return new NotEnoughPlayerException('Not enough Players.');
		}
		$playerIds = array_keys($this->players);
		$this->selectMap();

		while (!empty($playerIds)) {
			$playerId = array_rand($playerIds);
			if (isset($this->players[$playerId])) {
				$player = $this->players[$playerId];
				$team = mt_rand(1, $this::MAX_TEAMS);
				if ($this->getCurrentTeamCount($team) >= $this::MAX_PLAYER_PER_TEAM) {
					$team = $this->getFreeSlot();
				}
				$this->add($team, $player);
				unset($playerIds[$playerId]);
			}
		}
		ksort($this->matchup['teams']);

		return $this;
	}

	/**
	 * @param array $players
	 */
	public function check(array $players) {
		return (count($players) >= ($this::MAX_TEAMS * $this::MAX_PLAYER_PER_TEAM));
	}


	/**
	 * @param int $team
	 * @param Player $player
	 */
	public function add(int $team, Player $player) {
		$this->matchup['teams'][$team][] = $player;
	}

	/**
	 * @param int $team
	 * @return array|null
	 */
	public function getTeam(int $team) {
		if (isset($this->matchup['teams'][$team])) {
			return $this->matchup['teams'][$team];
		}
		return null;
	}

	/**
	 * @param int $team
	 * @return array|null
	 */
	public function getTeams() {
		if (isset($this->matchup['teams'])) {
			return $this->matchup['teams'];
		}
		return null;
	}

	/**
	 * @return array|null
	 */
	public function getWatcher() {
		return $this->getTeam(0);
	}

	/**
	 * @param int $team
	 * @return int
	 */
	public function getCurrentTeamCount(int $team): int {
		return $this->getTeam($team) ? count($this->getTeam($team)) : 0;
	}

	/**
	 * @return null|string
	 */
	public function getMap() {
		if (isset($this->matchup['map'])) {
			return $this->matchup['map'];
		}
	}

	/**
	 * @param string $map
	 */
	public function setMap(string $map) {
		if (array_search($map, $this::MAPS) > -1) {
			$this->matchup['map'] = $map;
		}
	}

	/**
	 * @return null|string
	 */
	public function selectMap() {
		$this->setMap($this::MAPS[array_rand($this::MAPS)]);
		return $this->getMap();
	}

	/**
	 * @return int
	 */
	public function getFreeSlot(): int {
		$availableSlots = [];
		for ($i=1; $i<=$this::MAX_TEAMS; $i++) {
			if (!$this->getTeam($i) || count($this->getTeam($i)) < $this::MAX_PLAYER_PER_TEAM) {
				$availableSlots[] = $i;
			}
		}
		if (empty($availableSlots)) {
			$availableSlots = [0];
		}
		return $availableSlots[array_rand($availableSlots)];
	}

	/**
	 * @return array
	 */
	public function getMatchup(): array {
		return $this->matchup;
	}
}