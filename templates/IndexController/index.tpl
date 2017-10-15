<div class="container-fluid">

	<div class="row">
		<h1>
			<!-- Games Played: {if isset($smarty.session.games_played)}{$smarty.session.games_played}{else}0{/if}-->
		</h1>
	</div>



	<div class="row">
		<div class="col-md-9">
			{if isset($matchup) && $matchup instanceof Exceptions\NotEnoughPlayerException}
				<div class="error">
					{$matchup->getMessage()}
				</div>
			{elseif (isset($matchup))}
				<div class="matchup">
					<div class="row">
						<h2>Map: {$matchup->getMap()}</h2>
						{foreach item=$roaster key=$team from=$matchup->getTeams()}
							{if $team != 0}
							<div class="col-sm-6">
								<div class="team box {if ($team%2 === 0)}left{else}right{/if}">
									<div class="background" style="background: url(assets/img/bg/{$matchImage[$team]}.png);">
										{foreach item=$player from=$roaster}
										<div class="player">
											{if ($team%2 === 0)}
												<span class="player_image">
													{if $player->getTeam()}
														<img
																src="assets/img/team/{$player->getTeam()->getId()}.png"
																class="team_image"
																alt="Team #{$player->getTeam()->getId()}"
																title="Team #{$player->getTeam()->getId()}"
														/>
													{/if}
												</span>
												<span class="player_name">{$player->getName()}</span>
											{else}
												<span class="player_name">{$player->getName()}</span>
												<span class="player_image">
													{if $player->getTeam()}
														<img
																src="assets/img/team/{$player->getTeam()->getId()}.png"
																class="team_image"
																alt="Team #{$player->getTeam()->getId()}"
																title="Team #{$player->getTeam()->getId()}"
														/>
													{/if}
												</span>
											{/if}
										</div>
										{/foreach}
									</div>
								</div>
							</div>
							{/if}
						{/foreach}
					</div>
					{if count($matchup->getWatcher()) > 0}
						<h2>Viewer</h2>
						<table>
							<tr>
								<th>Reaktor-Team</th>
								<th>Name</th>
							</tr>
							{foreach item=$player from=$matchup->getWatcher()}
								<tr>
									<td>{if $player->getTeam()}{$player->getTeam()->getName()}{/if}</td>
									<td>{$player->getName()}</td>
								</tr>
							{/foreach}
						</table>
					{/if}
				</div>
			{/if}
		</div>



		<div class="col-md-3">
			<div class="box">
				<form method="POST">
					<div class="row">
						{foreach item=player from=$players}
							<p class="col-md-6">
								<input
										type="checkbox"
										id="player_checkbox_{$player->getId()}"
										class="player_checkbox"
										name="matchup_players[{$player->getId()}]"
										{if isset($smarty.session.matchup_players) && $player->getId()|array_key_exists:$smarty.session.matchup_players}
											checked
										{/if}
								>
								<label for="player_checkbox_{$player->getId()}">{$player->getName()}</label>
							</p>
						{/foreach}
						</div>
						<div class="row">
							<div class="text-center">
								<button type="submit" class="submit">Generate</button>
								<div class="checkboxbutton">
									<label>
										<input type="checkbox" name="check_all" id="select_all"
											{if isset($smarty.session.check_all)}checked{/if}
										/>
										<span>alle auswählen</span>
									</label>
								</div>
							</div>
						</div>
				</form>
			</div>
		</div>
	</div>

</div>
