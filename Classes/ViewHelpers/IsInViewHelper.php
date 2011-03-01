<?php

/*                                                                        *
 * This script belongs to the FLOW3 package "Fluid".                      *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License as published by the *
 * Free Software Foundation, either version 3 of the License, or (at your *
 * option) any later version.                                             *
 *                                                                        *
 * This script is distributed in the hope that it will be useful, but     *
 * WITHOUT ANY WARRANTY; without even the implied warranty of MERCHAN-    *
 * TABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU Lesser       *
 * General Public License for more details.                               *
 *                                                                        *
 * You should have received a copy of the GNU Lesser General Public       *
 * License along with the script.                                         *
 * If not, see http://www.gnu.org/licenses/lgpl.html                      *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

/**
 * This view helper implements the in_array PHP function
 * @see http://en.php.net/manual/en/function.in-array.php
 *
 * = Conditions =
 *
 *
 * = Examples =
 *
 * <code title="Basic usage">
 * <h:isIn value="1" search="{0: 0, 1: 1, 2:2} />
 * </code>
 *
 * Everything inside the <f:if> tag is being displayed if the condition evaluates to TRUE.
 *
 * <code title="If / then / else">
 * <f:if condition="somecondition">
 *   <f:then>
 *     This is being shown in case the condition matches.
 *   </f:then>
 *   <f:else>
 *     This is being displayed in case the condition evaluates to FALSE.
 *   </f:else>
 * </f:if>
 * </code>
 *
 * Everything inside the "then" tag is displayed if the condition evaluates to TRUE.
 * Otherwise, everything inside the "else"-tag is displayed.
 *
 * <code title="inline notation">
 * {f:if(condition: someCondition, then: 'condition is met', else: 'condition is not met')}
 * </code>
 *
 * The value of the "then" attribute is displayed if the condition evaluates to TRUE.
 * Otherwise, everything the value of the "else"-attribute is displayed.
 *
 *
 * @version $Id: $
 * @package Fluid
 * @subpackage ViewHelpers
 * @license http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public License, version 3 or later
 */
class Tx_MaritDam_ViewHelpers_IsInViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {

	

	/**
	 * renders <f:then> child if $condition is true, otherwise renders <f:else> child.
	 *
	 * @param string $value value to search for
	 * @param array $search Array of values to search in
	 * @param boolean $negate negates the function
	 * @return boolean the rendered string
	 * @author Markus Kleinhenz <markus.kleinhenz@marit.ag>
	 */
	public function render($value, $search=array(), $negate=FALSE) {
		if ($negate){
			return !in_array($value, $search);
		}
		return in_array($value, $search);
	}

	
}

?>
