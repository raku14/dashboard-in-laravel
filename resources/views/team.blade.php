<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	
	@foreach($data as $team)
		<h1>Team: {{$team->name}}</h1>
			<h2>Player:
			@foreach($team->players as $player)
				{{$player->name}}
				@foreach($player->goals as $goal)
					(goals:{{$goal->no_of_goals}})
				@endforeach
			@endforeach
			</h2>
	@endforeach
</body>
</html>