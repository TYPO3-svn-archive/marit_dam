<?php
/**
 * Formats a number with custom precision, decimal point and grouped thousands.
 * @see http://www.php.net/manual/en/function.number-format.php
 *
 * = Examples =
 *
 * <code title="Defaults">
 * <f:format.byte>1024</f:format.byte>
 * </code>
 *
 * Output:
 * 1 K
 *
 * <code title="With all parameters">
 * <f:format.byte labels="B|K|M|G">1024</f:format.byte>
 * </code>
 *
 * Output:
 * 1 K
 *
 * @version $Id:
 * @package MaritDam
 * @subpackage ViewHelpers\Format
 * @license http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public License, version 3 or later
 */
class Tx_MaritDam_ViewHelpers_Format_ByteViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {

	/**
	 * Format the numeric value as a number with grouped thousands, decimal point and
	 * precision.
	 *
	 * @param string $labels The labels for the output
	 * @return string The calculated number with label
	 * @author Markus Kleinhenz <mkl@marit.ag>
	 * @api
	 */
	public function render($labels = '') {
		$stringToFormat = $this->renderChildren();
		return t3lib_div::formatSize($stringToFormat, $labels);
	}
}