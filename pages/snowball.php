<?php
	$consulta = $SQL->query('SELECT `name`,`score`,`data`, `hora` FROM `snowballwar` ORDER BY `id` DESC LIMIT 20;'); 
	$consulta2 = $SQL->query('SELECT * FROM `players` ORDER BY `sbw_points` DESC LIMIT 3;'); 
	$number_of_rows = 0; 
	
	$main_content .= '
		<center><h2>Evento Snowball War</h2></center>
		</br>
		<center>
SO objetivo principal do evento é derrubar o némero máximo de jogadores durante uma partida - atirando bolas de neve contra seus inimigos. O top score points ao final da rodada será o vencedor.
		</br></br>	
		<iframe width="560" height="315" src="https://www.youtube.com/embed/hpreUYM7rVI" frameborder="0" allowfullscreen></iframe>
		</center>
		</br>
		<div class="TableContainer">
			<div class="CaptionContainer">
			<div class="CaptionInnerContainer">
				<span class="CaptionEdgeLeftTop" style="background-image:url(./layouts/tibiarl/images/content/box-frame-edge.gif)"></span>
				<span class="CaptionEdgeRightTop" style="background-image:url(./layouts/tibiarl/images/content/box-frame-edge.gif)"></span>
				<span class="CaptionBorderTop" style="background-image:url(./layouts/tibiarl/images/content/table-headline-border.gif)"></span>
				<span class="CaptionVerticalLeft" style="background-image:url(./layouts/tibiarl/images/content/box-frame-vertical.gif)"></span>
				<div class="Text">Informações</div>
				<span class="CaptionVerticalRight" style="background-image:url(./layouts/tibiarl/images/content/box-frame-vertical.gif)"></span>
				<span class="CaptionBorderBottom" style="background-image:url(./layouts/tibiarl/images/content/table-headline-border.gif)"></span>
				<span class="CaptionEdgeLeftBottom" style="background-image:url(./layouts/tibiarl/images/content/box-frame-edge.gif)"></span>
				<span class="CaptionEdgeRightBottom" style="background-image:url(./layouts/tibiarl/images/content/box-frame-edge.gif)"></span>
			</div>
		</div>
		
		<table class="Table1" cellpadding="0" cellspacing="0">
		
		<tbody><tr>
			<td>
				<div class="InnerTableContainer">
					<table width="100%">
						<tbody>
						<tr style="background-color:#af2126;">
							<td class="LabelV150"><b><font color="white">#</font></b></td>
							<td class="LabelV150"><b><font color="white">Descricao</font></b></td>
						</tr>
						<tr style="background-color:'.$config['site']['lightborder'].';">
							<td>
								Atirar
							</td>
							<td>
								Comando "!snowball atirar", lança 1 bola de neve em seu adversario.
							</td>
						</tr>
						<tr style="background-color:'.$config['site']['lightborder'].';">
							<td>
								Info. In-game
							</td>
							<td>
								Comando "!snowball info", mostra a quantia de bolas de neve que você tem e sua quantia de pontos. Também mostra o ranking atual do evento.
							</td>
						</tr>
						<tr style="background-color:'.$config['site']['lightborder'].';">
							<td>
								Recarregar
							</td>
							<td>
								Dirija-se até o centro do mapa do evento e recarregue clicando no gerador.
							</td>
						</tr>
						<tr style="background-color:'.$config['site']['lightborder'].';">
							<td>
								Prêmio
							</td>
							<td>
								<b>1º Lugar:</b> 3 Event Coins,    <b>2º Lugar:</b> 2 Event Coins,    <b>3º Lugar:</b> 1 Event Coins.
							</td>
						</tr>
			</tbody></table>
				</div>
			</td>
		</tr>
	</tbody></table>
		</div>
		</br>
		</br>
		
		<div class="TableContainer">
			<div class="CaptionContainer">
			<div class="CaptionInnerContainer">
				<span class="CaptionEdgeLeftTop" style="background-image:url(./layouts/tibiarl/images/content/box-frame-edge.gif)"></span>
				<span class="CaptionEdgeRightTop" style="background-image:url(./layouts/tibiarl/images/content/box-frame-edge.gif)"></span>
				<span class="CaptionBorderTop" style="background-image:url(./layouts/tibiarl/images/content/table-headline-border.gif)"></span>
				<span class="CaptionVerticalLeft" style="background-image:url(./layouts/tibiarl/images/content/box-frame-vertical.gif)"></span>
				<div class="Text">TOP Ranking</div>
				<span class="CaptionVerticalRight" style="background-image:url(./layouts/tibiarl/images/content/box-frame-vertical.gif)"></span>
				<span class="CaptionBorderBottom" style="background-image:url(./layouts/tibiarl/images/content/table-headline-border.gif)"></span>
				<span class="CaptionEdgeLeftBottom" style="background-image:url(./layouts/tibiarl/images/content/box-frame-edge.gif)"></span>
				<span class="CaptionEdgeRightBottom" style="background-image:url(./layouts/tibiarl/images/content/box-frame-edge.gif)"></span>
			</div>
		</div><table class="Table1" cellpadding="0" cellspacing="0">
		
		<tbody><tr>
			<td>
				<div class="InnerTableContainer">
					<table width="100%">
						<tbody>
						<tr>


						';

		foreach($consulta2 as $info2) { 
	if(!is_int($number_of_rows / 2)) { $bgcolor = $config['site']['darkborder']; } else { $bgcolor = $config['site']['lightborder']; }
		$number_of_rows++; 
	$main_content .= '
		<td bgcolor="'.$config['site']['lightborder'].'">
		<center>
		</br>
		<a href="index.php?subtopic=characters&name='.urlencode($info2['name']).'">
			<b> '.$info2['name'].' </b>
		</a>
			</br>
			<img align="center" src="/outfit.php?id='.$info2['looktype'].'&addons='.$info2['lookaddons'].'&head='.$info2['lookhead'].'&body='.$info2['lookbody'].'&legs='.$info2['looklegs'].'&feet='.$info2['lookfeet'].'" width="94" height="94" style="width: 94px; height: 94px; margin-top:-30px; margin-left:-65px;  background-repeat: no-repeat;">
			</br></br>

			';
			if ($number_of_rows == 1) {
				$main_content .= '
					<img align="center" src="http://www.tibiawiki.com.br/images/a/a7/Golden_Goblet.gif" />
				';
			}
			if ($number_of_rows == 2) {
				$main_content .= '
					<img align="center" src="http://www.tibiawiki.com.br/images/9/90/Silver_Goblet.gif" />
				';
				
			}
			if ($number_of_rows == 3) {
				$main_content .= '
					<img align="center" src="http://www.tibiawiki.com.br/images/4/41/Bronze_Goblet.gif" />
			';
			}
			$main_content .= '
			</br>
			<b>Pontos:</b> ' . $info2['sbw_points'] . '
		</td>
		</center>
		
		';
	}
	$main_content .= '
		</tr>
	</tbody></table>
				</div>
			</td>
		</tr>
	</tbody></table>
		</div>
		
		</br></br>

		
		
		<div class="TableContainer">
			<div class="CaptionContainer">
			<div class="CaptionInnerContainer">
				<span class="CaptionEdgeLeftTop" style="background-image:url(./layouts/tibiarl/images/content/box-frame-edge.gif)"></span>
				<span class="CaptionEdgeRightTop" style="background-image:url(./layouts/tibiarl/images/content/box-frame-edge.gif)"></span>
				<span class="CaptionBorderTop" style="background-image:url(./layouts/tibiarl/images/content/table-headline-border.gif)"></span>
				<span class="CaptionVerticalLeft" style="background-image:url(./layouts/tibiarl/images/content/box-frame-vertical.gif)"></span>
				<div class="Text">Últimos Ganhadores</div>
				<span class="CaptionVerticalRight" style="background-image:url(./layouts/tibiarl/images/content/box-frame-vertical.gif)"></span>
				<span class="CaptionBorderBottom" style="background-image:url(./layouts/tibiarl/images/content/table-headline-border.gif)"></span>
				<span class="CaptionEdgeLeftBottom" style="background-image:url(./layouts/tibiarl/images/content/box-frame-edge.gif)"></span>
				<span class="CaptionEdgeRightBottom" style="background-image:url(./layouts/tibiarl/images/content/box-frame-edge.gif)"></span>
			</div>
		</div><table class="Table1" cellpadding="0" cellspacing="0">
		
		<tbody><tr>
			<td>
				<div class="InnerTableContainer">
					<table width="100%">
						<tbody>
						<tr style="background-color:#af2126;">
							<td class="LabelV150"><b><font color="white">Nome</font></b></td>
							<td class="LabelV150"><b><font color="white">Pontos</font></b></td>
							<td class="LabelV150"><b><font color="white"> Data - Hora</font></b></td>
						</tr>
	';	
	foreach($consulta as $info) { 
	if(!is_int($number_of_rows / 2)) { $bgcolor = $config['site']['darkborder']; } else { $bgcolor = $config['site']['lightborder']; }
		$number_of_rows++; 
	$main_content .= '
	<tr bgcolor="'.$config['site']['lightborder'].'">
		<td>
			<a href="index.php?subtopic=characters&name='.urlencode($info['name']).'">
			<b> '.$info['name'].' </b></a>
		</td>
		<td>
			' . $info['score'] . ' 
		</td>
		<td>
				<b> ' . $info['data'] . '</b> - <b>' . $info['hora'] . '</b>
		</td>
	</tr>
		';
	}
	$main_content .= '
	</tbody></table>
				</div>
			</td>
		</tr>
	</tbody></table>
</div>
	</br>

	';
?>
