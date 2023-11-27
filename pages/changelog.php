<?php
if(!defined('INITIALIZED'))
	exit;

$main_content .= '
<a name="info"></a>
<div class="TableContainer">
	<div class="CaptionContainer">
		<div class="CaptionInnerContainer">
			<span class="CaptionEdgeLeftTop" style="background-image:url(./layouts/tibiarl/images/content/box-frame-edge.gif);"></span>
			<span class="CaptionEdgeRightTop" style="background-image:url(./layouts/tibiarl/images/content/box-frame-edge.gif);"></span>
			<span class="CaptionBorderTop" style="background-image:url(./layouts/tibiarl/images/content/table-headline-border.gif);"></span>
			<span class="CaptionVerticalLeft" style="background-image:url(./layouts/tibiarl/images/content/box-frame-vertical.gif);"></span>
			<div class="Text">Resumo</div>
			<span class="CaptionVerticalRight" style="background-image:url(./layouts/tibiarl/images/content/box-frame-vertical.gif);"></span>
			<span class="CaptionBorderBottom" style="background-image:url(./layouts/tibiarl/images/content/table-headline-border.gif);"></span>
			<span class="CaptionEdgeLeftBottom" style="background-image:url(./layouts/tibiarl/images/content/box-frame-edge.gif);"></span>
			<span class="CaptionEdgeRightBottom" style="background-image:url(./layouts/tibiarl/images/content/box-frame-edge.gif);"></span>
			</div>
		</div>
		<h3 style="font-size:14px;"> ::1.0.2 - SS 11.06.21</h3>
		<br>
			<b style="font-size:12px;">OT:</b>
			<br>
			<p style="font-size:12px;">
			- Novos spawns no castle 48h, Os monstros dão a mesma exp que os frosts/roshamuul/oramond apenas foi trocado o mosntro e removidos os de task. Para acessar os monstros com a mesma exp de roshamuul é necessario ter 15RR, e para os monstros com a mesma exp de oramond é necessario ter 30rr. Novos spawns estão em construção.
			<br>
			<br>
			- Melhorado os spawns de Oramond. Ainda estão em contrução as casas e subterraneo de oramond.
			<br>
			<br>
			</p>
		<br>
		<br>
		<h3 style="font-size:14px;"> ::1.0.1 - SS 07.06.21</h3>
		<br>
			<b style="font-size:12px;">OT:</b>
			<br>
			<p style="font-size:12px;">
			
			- Como decidido pela maioria do servidor, roshamuul passou a ter o seu acesso por quest, agora para acessar roshamuul basta fazer a quest e ter 15RR;
			<br>
			<br>
			- Foram ajustados os respawns das tasks, bem como a exp e o drops de alguns monstros;
			<br>
			<br>
			- Alguns monstros estavam dando debug por conta do tempo de apodrecimento dos corpos, foi ajustado. Caso você ainda tome debug em alguma hunt informe a staff.
			<br>
			<br>
			</p>
		<br>
		<br>
		<h3 style="font-size:14px;"> ::1.0.0 - SS 01.06.21</h3>
		<br>
			<b style="font-size:12px;">OT:</b>
			<br>
			<p style="font-size:12px;">
			
			- Rebalanceado o dano das armas do Knight;
			<br>
			Anteriormente o dano do ataque básico do Knight era de <b>40k média por turno</b> com as armas Donate e Hyper. Se comparado com as outras vocações <b>Pally (220k por turno)</b> e <b>Mages (200k por turno)</b>. Para não alterar o dano das magias, pois estas já estavam balanceadas, foi alterado o dano das armas do knight para chegar ao dano próximo das outras vocações.
			<br>
			<br>
			Sempre iremos fazer o balanceamento das vocações para manter o equilibrio entre vocações no jogo de modo que todos os jogadores tenham a mesma experiencia dentro do jogo.
			<br>
			<br>
			- Rebalanceado o dano Fusion SD, Agora o dano é baseado no ML e não mais no LVL. Knight segue não podendo usar Fusion SD, Pally redução de 40% do dano e Mages redução de 10% do dano;
			<br>
			<br>
			Como todos sabem as únicas vocações que batem critico são Paladin e Knight, com isso o dano por turno destas vocações é considerevelmente maior do que os Mages (dif 20%). Enquanto nao arrumarmos o critical para os mages tivemos que rebalancear os danos dos turnos. Assim que fizermos a correção dos criticals iremos rebalancear as vocações novamente;
			<br>
			<br>
			- Ajustado Loot e Exp dos monstros Super Supremo Sapphire, Supremo Midnight Asura, Super Supremo Hellhound, Supremo Earth Elemental, Supremo Dawnfire Asura, Wild Ninja Supremo, Supremo Glacial Giant.
			<br>
			<br>
			- Ajustado Bug que permitia todas as vocações usarem a strong health potion. Agora somente o kina pode usar.
			</p>
		<br>
		<br>
		<h3 style="font-size:14px;"> ::0.0.3 - SS 30.05.21</h3>
		<br>
			<b style="font-size:12px;">SITE:</b>
			<br>
			<p style="font-size:12px;">
			
			- Arumamos o popup da promoção de pontos;
			<br>
			</p>
		<br>
		<br>
			<b style="font-size:12px;">NPCs:</b>
			<br>
			<p style="font-size:12px;">
				
			- Ajustado NPC Magias 40 Resets;
			<br>
			</p>
		<br>
		<br>
			<b style="font-size:12px;">OT:</b>
			<br>
			<p style="font-size:12px;">
			
			- Ajustado os acessos as quests do conjure;
			<br>
			- Removido a quest da promotion, agora todos os players ja tem promotion ao criar a conta;
			<br>
			- Ajustado os preços do remove frag e stamina potion do templo;
			<br>
			- Ajustado dano da Magia do 25rr druid;
			<br>
			- Ajustado comando !fly;
			<br>
			- Ajustado comando /elfbot;
			<br>
			- Ajustado acesso ao barco para somente 1kkk, não é mais necessária a quest da promotion;
			<br>
			- Ajustado Bug do castle onde os acessos as áreas de hunt estavam sem o acesso da task;
			<br>
			</p>
		<br>
		<br>
		<h3 style="font-size:14px;"> ::0.0.2 - SS 26.05.21</h3>
		<br>
			<b style="font-size:12px;">SITE:</b>
			<br>
			<p style="font-size:12px;">
			
			- Inserido método de doação por pix;
			<br>
		<br>
		<h3 style="font-size:14px;"> ::0.0.1 - SS 25.05.21</h3>
			<br>
				<b style="font-size:12px;">NPCs:</b>
				<br>
				<p style="font-size:12px;">
				
				- Riona Vendendo todas BPs e machete;
				<br>
				- Mestre Minerador ajustado o valor de dodge e critical em -50%;
				<br>
				- Captain Braga adicionado no barco levando para area de hunt free por 1kkk;
				</p>
			<br>
			<br>
				<b style="font-size:12px;">OT:</b>
				<br>
				<p style="font-size:12px;">
				
				- Criado tp para pega a arma donate de 3h no templo;
				<br>
				- Ajustado spawn do castle 48h;
				<br>
				- Removido reset minimo das quests, agora todas podem ser acessadas em qualquer reset;
				<br>
				- Novas husts para free;
				<br>
				- Para entrar no barco é necessario fazer a quest da promotion;
				<br>
				</p>
			<br>
			<br>
				<b style="font-size:12px;">SITE:</b>
				<br>
				<p style="font-size:12px;">
				
				- Corrigido os frags para pegar RED e BLACK skull;
				<br>
				- Corrigido os EXP stages;
				<br>
				- Criada página de changelog;
				<br>
				</p>
</div><br>';