<?php

/*                                                                        *
 * This script is part of the TYPO3 project - inspiring people to share!  *
 *                                                                        *
 * TYPO3 is free software; you can redistribute it and/or modify it under *
 * the terms of the GNU General Public License version 2 as published by  *
 * the Free Software Foundation.                                          *
 *                                                                        *
 * This script is distributed in the hope that it will be useful, but     *
 * WITHOUT ANY WARRANTY; without even the implied warranty of MERCHAN-    *
 * TABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General      *
 * Public License for more details.                                       *
 *                                                                        */

/**
 * A view helper for creating URIs to resources.
 *
 * = Examples =
 *
 * <code title="Defaults">
 * <h:flowPlayer flv="fileadmin/test/movie.flv"
 width="520"
 height="330"
 lightBoxReady="true"
 lightBoxId="inline2"/>
 * </code>
 *
 *
 * @version $Id:$
 * @license http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public License, version 3 or later
 */
class Tx_MaritDam_ViewHelpers_FlowPlayerViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {

	/**
	 * @var	tslib_cObj
	 */
	protected $contentObject;

	/**
	 * Constructor. Used to create an instance of tslib_cObj used by the render() method.
	 *
	 * @param tslib_cObj $contentObject injector for tslib_cObj (optional)
	 * @return void
	 */
	function  __construct($contentObject = NULL) {
		$this->contentObject = $contentObject !== NULL ? $contentObject : t3lib_div::makeInstance('tslib_cObj');
	}


	/**
	 * Render the FlowPlayer
	 *
	 * @param string $flv The path and filename of the resource (relative to Public resource directory of the extension).
	 * @param string $width width of the movie in px
	 * @param string $height height of the movie in px
	 * @param string $player url of the player
	 * @param string $image url of the splash image
	 * @param boolean $lightBoxReady minimum height of the image
	 * @param string $player minimum width of the image

	 * @return string html and js for flowplayer
	 * @author Markus Kleinhenz <markus.kleinhenz@marit.ag>
	 */
	public function render($flv, $width=NULL, $height = NULL, $player='EXT:marit_dam/Resources/Public/Swf/flowplayer-3.1.5.swf', $image='', $lightBoxReady=FALSE, $lightBoxId='inline1') {

		if (stristr($player, 'EXT:')) {
			//$uri = 'EXT:' . t3lib_div::camelCaseToLowerCaseUnderscored($extensionName) . '/Resources/Public/' . $path;
		}
		$id = rand(0,50);
		$player = t3lib_div::getFileAbsFileName($player);
		$player = substr($player, strlen(PATH_site));

		//check if absRefPrefix is set
		if(	substr($flv, 4) != 'http:'&&
				substr($flv, 5) != 'https:' &&
				substr($flv, 4) != 'rtmp:') {

			if ($GLOBALS['TSFE']->absRefPrefix) {
				$flv = $GLOBALS['TSFE']->absRefPrefix.$flv;
			}elseif($GLOBALS['TSFE']->tmpl->setup['config.']['baseURL']) {
				$flv = $GLOBALS['TSFE']->tmpl->setup['config.']['baseURL'].$flv;
			}
		}
		if (!file_exists($player)) {
			throw new Tx_Fluid_Core_ViewHelper_Exception('Could not find file for flowplayer' , 1253191060);
		}
		//generate player content
		$content = '
		<a	class="player" id="player'.$id.'"href="'.t3lib_div::rawUrlEncodeFP($flv).'"
			style="display:block;width:'.$width.'px;height:'.$height.'px;';
		if (!empty($image)) {
			$content .= 'background-image:url(\''.$image.'\');';
		}
		$content .=	'" >
		</a>
		<script type="text/javascript">
			flowplayer("player'.$id.'", "'.t3lib_div::rawUrlEncodeFP($player).'");
		</script>';
		
		//TODO: add playlist feature
		//, "{playlist: [\'/img/demos/national.jpg\', \'http://releases.flowplayer.org/data/fake_empire.mp3\']}"
		if ($lightBoxReady) {
			$content = '<div style="display: none;">
						<div id="'.htmlspecialchars($lightBoxId).'" style="overflow:auto;">'.
					$content.'</div>
						</div>';
		}
		return $content;
	}
}

?>
