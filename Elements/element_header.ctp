<div class="container">
	<div class="row">
		<div class="col-md-4">
		</div>
		<div class="col-md-4">
		</div>
		<div class="col-md-4 box-serveur">
			<div class="title">PLAY.EPICUBE.FR</div>
			<div class="desc_box"><?php $get = $Server->call(array('GET_PLAYER_COUNT' => array(), 'GET_MAX_PLAYERS' => array()), $value['Server']['id']); echo $get['GET_PLAYER_COUNT']; ?> joueurs connectés</div>
		</div>
	</div>
</div>		