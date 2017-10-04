<div class="container-fluid">

	<div class="row">
		<h1>
			Games Played: {if isset($smarty.session.games_played)}{$smarty.session.games_played}{else}0{/if}
		</h1>
	</div>



	<div class="row">
		<div class="col-md-10">
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
								<div class="col-sm-{(12/$maxTeams)}">
									<h2>Team #{$team}</h2>
									<table>
										<tr>
										<th>Reaktor-Team</th>
										<th>Name</th>
										</tr>
										{foreach item=$player from=$roaster}
											<tr>
												<td>{if $player->getTeam()}{$player->getTeam()->getName()}{/if}</td>
												<td>{$player->getName()}</td>
											</tr>
										{/foreach}
									</table>
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



		<div class="col-md-2">
			<div>
				<form method="POST">
					{foreach item=player from=$players}
						<p>
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
					<input type="submit">
					<button type="button" id="select_all">Alle auswählen</button>
				</form>
			</div>
		</div>
	</div>

</div>
