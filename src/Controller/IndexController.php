<?php

/**
 * Created by PhpStorm.
 * User: PaarBreakdowns
 * Date: 18.04.2017
 * Time: 14:56
 */

namespace Controller;

use Doctrine\ORM\EntityManager;
use Entities\Aufgabe;
use Entities\Player;
use Services\MatchupService;

class IndexController extends ABaseController {


	protected function indexAction() {
		/** @var EntityManager $em */
		$em = $this->db;
		$qb = $em->createQueryBuilder()
			->select('p')
			->from(Player::class, 'p')
			->orderBy('p.name')
		;
		$query 	= $qb->getQuery();
		$players= $query->getResult();

		$this->getTemplateengine()->assign('players', $players);

		if (isset($_POST['matchup_players']) && !empty($_POST['matchup_players'])) {
			$_SESSION['matchup_players'] = $_POST['matchup_players'];
			$playerIds = array_keys($_POST['matchup_players']);
			$matchPlayers = $em->getRepository(Player::class)->findBy(
				[
					'id' => $playerIds,
				]
			);
			$matchupService = new MatchupService($matchPlayers);
			$matchup = $matchupService->build();

			$this->getTemplateengine()->assign('matchup', $matchup);
			$this->getTemplateengine()->assign('maxTeams', $matchupService::MAX_TEAMS);
		}
	}
}