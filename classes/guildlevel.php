<?php  
// Guild Level System by Dwarfer

$bonuslevel = array(
    array('Level 2 ao 5', '5%'),
    array('Level 6 ao 10', '10%'),
    array('Level 11 ao 15', '15%'),
    array('Level 16 ao 20', '20%'),
    array('Level 20+', '25%')
);


$main_content .='
<style>
.tableMatch_guildLevel {
    flex: 0 0 20;
    width: 30;
    height: 30;
    display: inline-flex;
    justify-content: center;
    align-items: center;
}

.guildlevel_badge {
    border: 1px solid rgba(255,255,255,.2);
    -webkit-border-radius: 50%;
    -moz-border-radius: 100%;
    border-radius: 100%;
    font-size: 10px;
    text-shadow: 0 1px 0 rgba(0,0,0,.5);
    width: 28px;
    height: 28px;
    line-height: 18px;
    border-radius: 100%;
    padding: 0;
    min-width: auto;
    text-align: center;
    position: relative;
}

.guildlevel-1 {
    background-color: #3e9cb7;
    border: 1px solid #327e94;
}

.guildlevel-2 {
    background-color: #3e9cb7;
    border: 1px solid #327e94;
}

.guildlevel-3 {
    background-color: #3e9cb7;
    border: 1px solid #327e94;
}

.guildlevel-4 {
    background-color: #3e9cb7;
    border: 1px solid #327e94;
}

.guildlevel-5 {
    background-color: #3e9cb7;
    border: 1px solid #327e94;
}

.guildlevel-6 {
    background-color: #53a18b;
    border: 1px solid #417d6c;
}

.guildlevel-7 {
    background-color: #53a18b;
    border: 1px solid #417d6c;
}

.guildlevel-8 {
    background-color: #53a18b;
    border: 1px solid #417d6c;
}

.guildlevel-9 {
    background-color: #53a18b;
    border: 1px solid #417d6c;
}

.guildlevel-10 {
    background-color: #53a18b;
    border: 1px solid #417d6c;
}

.guildlevel-11 {
    background-color: #68a761;
    box-shadow: 0 0 1px #1aff00;
    border: 1px solid #51824b;
}

.guildlevel-12 {
    background-color: #68a761;
    box-shadow: 0 0 1px #1aff00;
    border: 1px solid #51824b;
}

.guildlevel-13 {
    background-color: #68a761;
    box-shadow: 0 0 2px #1aff00;
    border: 1px solid #52854d;
}

.guildlevel-14 {
    background-color: #7cac35;
    box-shadow: 0 0 2px #98ff00;
    border: 1px solid #62872a;
}

.guildlevel-15 {
    background-color: #91b20a;
    box-shadow: 0 0 3px #cdff00;
    border: 1px solid #728c07;
}

.guildlevel-16 {
    background-color: #bdb700;
    box-shadow: 0 0 3px #fff700;
    border: 1px solid #999402;
}

.guildlevel-17 {
    background-color: #f0bc00;
    box-shadow: 0 0 4px #ffc800;
    border: 1px solid #c49a00;
}

.guildlevel-18 {
    background-color: #f89a06;
    box-shadow: 0 0 4px #ff9c00;
    border: 1px solid #d68402;
}

.guildlevel-19 {
    background-color: #f46e12;
    box-shadow: 0 0 4px #ff6800;
    border: 1px solid #cc5c0e;
}

.guildlevel-20 {
    background: linear-gradient(#e32222, #b31919);
    box-shadow: 0 0 5px #ff0000;
    border: 1px solid #b31919;
    animation: redPulse 1.5s infinite;
}


.guildlevel_lvlfont {
    font-family: Poppins;
    font-size: 15px;
    font-weight: 700;
    color: #fff;
    position: relative;
    top: 20%;
    left: 0;
    width: 100%;
    height: 100%;
    text-align: center;
    text-shadow: 1px 1px 1px rgba(0,0,0,.4);
}
</style>
';
    $main_content .= '
    <div class="TableContainer">
       <div class="CaptionContainer">
          <div class="CaptionInnerContainer">
             <span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);"></span>
             <span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);"></span>
             <span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);"></span>
             <span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);"></span>
             <div class="Text">Guild Level System</div>
             <span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);"></span>
             <span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);"></span>
             <span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);"></span>
             <span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);"></span>
          </div>
       </div>
        <table class="Table3" cellpadding="0" cellspacing="0">
            <tbody>
                <tr>
                <td>
                   <div class="InnerTableContainer">
                      <table style="width:100%;">
                         <tbody>	
                            <tr>
                               <td>
                                  <div class="TableShadowContainerRightTop" >
                                     <div class="TableShadowRightTop" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rt.gif);" ></div>
                                  </div>
                                  <div class="TableContentAndRightShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rm.gif);">
                                     <div class="TableContentContainer" >
                                        <table class="TableContent" width="100%"  style="border:1px solid #faf0d7;">
                                           <tr>
                                                <td width="100%" align="justify" valign="top">
                                                    &#8614; Nesse sistema, as guilds avan&ccedilar&atildeo de n&iacutevel a depender do desempenho dos membros.<br>
                                                    &#8614; Experi&ecircncia &eacute recebida cada vez que um membro da guild derrota um membro de <b>outra</b> guild.<br>
                                                    &#8614; A experi&ecircncia depende do level da <b>pr&oacutepria guild</b>.<br>
                                                    &#8614; <b>N&atildeo</b> ser&atildeo contabilizadas mortes de membros da <b>mesma guild</b> ou com <b>mesmo IP</b> <i>(Internel Protocol)</i><br>
                                                    &#8614; Os membros da guild receber&atildeo <b>b&ocircnus de experi&ecircncia</b>, <b>itens</b> ou <b>acessos exclusivos</b> com base no n&iacutevel da guild.<br>
                                                </td>
                                           </tr>									
                                        </table>
                                     </div>
                                  </div>											
                                  <div class="TableShadowContainer">
                                     <div class="TableBottomShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-bm.gif);" >
                                        <div class="TableBottomLeftShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-bl.gif);" ></div>
                                        <div class="TableBottomRightShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-br.gif);" ></div>
                                     </div>
                                  </div>
                               </td>
                            </tr>
                         </tbody>
                      </table>
                  <table style="width:100%;">
                    <tbody>	
                    <tr>
                       <td>
                          <div class="TableShadowContainerRightTop" >
                             <div class="TableShadowRightTop" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rt.gif);" ></div>
                          </div>
                          <div class="TableContentAndRightShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rm.gif);" >
                             <div class="TableContentContainer" >
                                <table class="TableContent" width="100%"  style="border:1px solid #faf0d7;" >
                                   <tr class="Label-DarkBorder" style="background-color: #d4c0a1;">
                                      <td colspan="2" style="width: 10%; border: 1px; border-style: solid; border-color: #FAF0D7;" align="center"><strong>&Iacutecones de identifica&ccedil&atildeo de level</strong></td>
                                   </tr>
                                   <tr class="Label-LightBorder" style="background-color: #f1e0c6;">
                                        <td style="width: 50%; border: 1px; border-style: solid; border-color: #FAF0D7;" align="center">
                                            <div class="tableMatch_guildLevel"><span title="level 1" class="guildlevel_badge guildlevel-1"><span class="guildlevel_lvlfont">1</span></span></div> 
                                            <div class="tableMatch_guildLevel"><span title="level 2" class="guildlevel_badge guildlevel-2"><span class="guildlevel_lvlfont">2</span></span></div>
                                            <div class="tableMatch_guildLevel"><span title="level 3" class="guildlevel_badge guildlevel-3"><span class="guildlevel_lvlfont">3</span></span></div>
                                            <div class="tableMatch_guildLevel"><span title="level 4" class="guildlevel_badge guildlevel-4"><span class="guildlevel_lvlfont">4</span></span></div>
                                            <div class="tableMatch_guildLevel"><span title="level 5" class="guildlevel_badge guildlevel-5"><span class="guildlevel_lvlfont">5</span></span></div>
                                            <div class="tableMatch_guildLevel"><span title="level 6" class="guildlevel_badge guildlevel-6"><span class="guildlevel_lvlfont">6</span></span></div>
                                            <div class="tableMatch_guildLevel"><span title="level 7" class="guildlevel_badge guildlevel-7"><span class="guildlevel_lvlfont">7</span></span></div>
                                            <div class="tableMatch_guildLevel"><span title="level 8" class="guildlevel_badge guildlevel-8"><span class="guildlevel_lvlfont">8</span></span></div>
                                            <div class="tableMatch_guildLevel"><span title="level 9" class="guildlevel_badge guildlevel-9"><span class="guildlevel_lvlfont">9</span></span></div>
                                            <div class="tableMatch_guildLevel"><span title="level 10" class="guildlevel_badge guildlevel-10"><span class="guildlevel_lvlfont">10</span></span></div>
                                            <div class="tableMatch_guildLevel"><span title="level 11" class="guildlevel_badge guildlevel-11"><span class="guildlevel_lvlfont">11</span></span></div>
                                            <div class="tableMatch_guildLevel"><span title="level 12" class="guildlevel_badge guildlevel-12"><span class="guildlevel_lvlfont">12</span></span></div>
                                            <div class="tableMatch_guildLevel"><span title="level 13" class="guildlevel_badge guildlevel-13"><span class="guildlevel_lvlfont">13</span></span></div>
                                            <div class="tableMatch_guildLevel"><span title="level 14" class="guildlevel_badge guildlevel-14"><span class="guildlevel_lvlfont">14</span></span></div>
                                            <div class="tableMatch_guildLevel"><span title="level 15" class="guildlevel_badge guildlevel-15"><span class="guildlevel_lvlfont">15</span></span></div>
                                            <div class="tableMatch_guildLevel"><span title="level 16" class="guildlevel_badge guildlevel-16"><span class="guildlevel_lvlfont">16</span></span></div>
                                            <div class="tableMatch_guildLevel"><span title="level 17" class="guildlevel_badge guildlevel-17"><span class="guildlevel_lvlfont">17</span></span></div>
                                            <div class="tableMatch_guildLevel"><span title="level 18" class="guildlevel_badge guildlevel-18"><span class="guildlevel_lvlfont">18</span></span></div>
                                            <div class="tableMatch_guildLevel"><span title="level 19" class="guildlevel_badge guildlevel-19"><span class="guildlevel_lvlfont">19</span></span></div>
                                            <div class="tableMatch_guildLevel"><span title="level 20+" class="guildlevel_badge guildlevel-20"><span class="guildlevel_lvlfont">20+</span></span></div> 
                                        </td>   
                                   </tr>
                                </table>
                             </div>
                          </div>
                          <div class="TableShadowContainer" >
                             <div class="TableBottomShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-bm.gif);" >
                                <div class="TableBottomLeftShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-bl.gif);" ></div>
                                <div class="TableBottomRightShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-br.gif);" ></div>
                             </div>
                          </div>
                       </td>
                    </tr>
                         </div>
                      </td>
                    </tr>
                    </tbody>
                    </table>
                   </div>										
                </td>
             </tr>
            </tbody>
        </table>
</div><br>';

 $main_content .='
    <div class="TableContainer">
			<div class="CaptionContainer">
				<div class="CaptionInnerContainer"> 
					<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
					<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
					<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);"></span> 
					<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);"></span>
					<div class="Text">B&ocircnus de experi&ecircncia</div>
					<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);"></span> 
					<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);"></span> 
					<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
					<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
				</div>
			</div>
			<table class="Table3" cellpadding="0" cellspacing="0">
				<tbody>
					<tr>
						<td>
							<div class="InnerTableContainer">
								<table style="width:100%;">
									<tbody><tr>
										<td>
											<div class="TableShadowContainerRightTop">
												<div class="TableShadowRightTop" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rt.gif);"></div>
											</div>
											<div class="TableContentAndRightShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rm.gif);">
												<div class="TableContentContainer">
													<table class="TableContent" width="100%">
														<tbody>
                                          <tr bgcolor="#D4C0A1">
															<td class="LabelV" width="50%">Faixa de level</td>
															<td class="LabelV">B&ocircnus</td>
														</tr>';
                                          $number_of_rows = 0;
                                          for($x = 0; $x < count($bonuslevel); $x++)
                                          {
                                            $main_content .='
                                                <tr bgcolor="'.(($number_of_rows % 2) == 0 ? '#F1E0C6' : '#D4C0A1').'">
                                                <td>'.$bonuslevel[$x][0].'</td>
                                                <td><b><font color="green">'.$bonuslevel[$x][1].'</font></b> a mais de experi&ecircncia</td>
                                            ';
                                            $number_of_rows++;
                                          }
                                        $main_content .='
													</tbody></table>
												</div>
											</div>
											<div class="TableShadowContainer">
												<div class="TableBottomShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-bm.gif);">
													<div class="TableBottomLeftShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-bl.gif);"></div>
													<div class="TableBottomRightShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-br.gif);"></div>
												</div>
											</div>
										</td>
									</tr>
								</tbody></table>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		</div><br>
';

$main_content .='
        <div class="TableContainer">
            <div class="CaptionContainer">
                <div class="CaptionInnerContainer">
                    <span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);"></span>
                    <span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);"></span>
                    <span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);"></span>
                    <span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);"></span>
                    <div class="Text">Top 10 Guilds Level</div>
                    <span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);"></span>
                    <span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);"></span>
                    <span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);"></span>
                    <span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);"></span>
                </div>
            </div>
            <table class="Table2" cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>
                            <div class="InnerTableContainer">
                                <table style="width:100%;">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="TableShadowContainerRightTop">
                                                    <div class="TableShadowRightTop" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rt.gif);"></div>
                                                </div>
                                                <div class="TableContentAndRightShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rm.gif);">
                                                    <div class="TableContentContainer">
                                                        <table id="lastwinners" class="TableContent" width="100%">
                                                            <tbody>
                                                                <tr bgcolor="#505050">
                                                                    <td width="5%" class="LabelI"><font color="white"><b><center>#</center></b><font></font></font></td>
                                                                    <td colspan="2" width="30%" class="LabelI"><font color="white"><b><center>Guild</center></b></td>
                                                                    <td width="5%" class="LabelI"><font color="white"><b><center>Level</center></b></font></td>
                                                                    <td width="15%" class="LabelI"><font color="white"><b><center>Experience</center></b></font></td>
                                                                    <td width="15%" class="LabelI"><font color="white"><b><center>Members</center></b></font></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="TableShadowContainer">
                                                    <div class="TableBottomShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-bm.gif);">
                                                        <div class="TableBottomLeftShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-bl.gif);"></div>
                                                        <div class="TableBottomRightShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-br.gif);"></div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>';
                                        $guildsLevel = $SQL->query('SELECT * FROM `guilds` ORDER BY `level` DESC, `experience` DESC LIMIT 0,10')->fetchAll();
                                        if(!empty($guildsLevel)) {
                                            $place = 0;
                                            $guildLevelMaxTemplate = 20;
                                            foreach ($guildsLevel as $guildLevel) {
                                                    $guild = new Guild();
                                                    $guild->load($guildLevel['id']);
                                                    if(!$guild->isLoaded())
                                                        continue;
                                                    $place++;
                                                    $members = $SQL->query( 'SELECT COUNT(`gr`.`id`) AS `total` FROM `players` AS `p` LEFT JOIN `guild_ranks` AS `gr` ON `gr`.`id` = `p`.`rank_id` WHERE `gr`.`guild_id` = '.$guildLevel['id'])->fetch( );
                                                    $level = $guildLevel['level'];
                                                    $exp = $guildLevel['experience'];
                                                    $main_content .= '
                                                        <tr>
                                                            <td>
                                                                <div class="TableShadowContainerRightTop">
                                                                    <div class="TableShadowRightTop" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rt.gif);"></div>
                                                                </div>
                                                                <div class="TableContentAndRightShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rm.gif);">
                                                                    <div class="TableContentContainer">
                                                                        <table class="TableContent" width="100%">
                                                                            <tbody>
                                                                                <tr bgcolor="#F1E0C6">
                                                                                     <td width="5%" align="center" valign="center">'.$place.'</td>
                                                                                    <td width="5%" align="center" valign="center">
                                                                                        <a href="?subtopic=guilds&action=show&guild='.$guild->getId().'">
                                                                                        <img src="'.$guild->getGuildLogoLink().'" width="32" height="32" border="0" align="middle"/></a>
                                                                                    </td>
                                                                                    <td width="24%" align="center" valign="center">
                                                                                        <a href="?subtopic=guilds&action=show&guild='.$guild->getId().'">'.htmlspecialchars($guild->getName()).'</a>
                                                                                    </td>
                                                                                    <TD width="6%"><center><div class="tableMatch_guildLevel">
                                                                                        <span class="guildlevel_badge guildlevel-'.($level >= $guildLevelMaxTemplate ? $guildLevelMaxTemplate : $level).'">
                                                                                        <span title="guild level" class="guildlevel_lvlfont">'.$level.'</span></span>
                                                                                        </div>
                                                                                        </center>
                                                                                    </TD>
                                                                                    <td width="15%"><center>'.$exp.'</center></td>
                                                                                    <td width="15%"><center>'.$members['total'].'</center></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <div class="TableShadowContainer">
                                                                    <div class="TableBottomShadow" style="background-image:url(./layouts/tibiarl/images/global/content/table-shadow-bm.gif);">
                                                                        <div class="TableBottomLeftShadow" style="background-image:url(./layouts/tibiarl/images/global/content/table-shadow-bl.gif);"></div>
                                                                        <div class="TableBottomRightShadow" style="background-image:url(./layouts/tibiarl/images/global/content/table-shadow-br.gif);"></div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>  ';  
                                            
                                            }
                                        }
$main_content .='
                                    </tbody>
                                </table>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>               
        </div>
	';
?>