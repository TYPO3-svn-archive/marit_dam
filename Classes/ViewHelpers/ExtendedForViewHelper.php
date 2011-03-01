<?php

/**
 * Loop view helper which can be used to interate over array.
 * Implements what a basic foreach()-PHP-method does.
 *
 * = Examples =
 *
 * <code title="Simple Loop">
 * <f:for each="{0:1, 1:2, 2:3, 3:4}" as="foo">{foo}</f:for>
 * </code>
 * <output>
 * 1234
 * </output>
 *
 * <code title="Output array key">
 * <ul>
 *   <f:for each="{fruit1: 'apple', fruit2: 'pear', fruit3: 'banana', fruit4: 'cherry'}" as="fruit" key="label">
 *     <li>{label}: {fruit}</li>
 *   </f:for>
 * </ul>
 * </code>
 * <output>
 * <ul>
 *   <li>fruit1: apple</li>
 *   <li>fruit2: pear</li>
 *   <li>fruit3: banana</li>
 *   <li>fruit4: cherry</li>
 * </ul>
 * </output>
 * 
 * Qauthor Lina Wolf <lwo@marit.ag>
 * @version $Id:
 * @package MaritDam
 * @subpackage ViewHelpers\Format
 * @license http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public License, version 3 or later
 */
class Tx_MaritDam_ViewHelpers_ExtendedForViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {

	/**
	 * Iterates through elements of $each and renders child nodes
	 *
	 * @param array $each The array or SplObjectStorage to iterated over
	 * @param string $as The name of the iteration variable
	 * @param string $key The name of the variable to store the current array key
	 * @param int $limit Max. number of arguments to be dispplayed 
	 * @param int $start first number of arguments to be dispplayed 
	 * @param boolean $reverse If enabled, the iterator will start with the last element and proceed reversely
	 * @return string Rendered string
	 * @author Sebastian Kurfürst <sebastian@typo3.org>
	 * @author Bastian Waidelich <bastian@typo3.org>
	 * @author Robert Lemke <robert@typo3.org>
	 * @api
	 */
	public function render($each, $as, $key = '', $limit=0, $start=0, $reverse = FALSE) {
		$output = '';
		if ($each === NULL) {
			return '';
		}
		if (is_object($each)) {
			if (!$each instanceof Traversable) {
				throw new Tx_Fluid_Core_ViewHelper_Exception('ForViewHelper only supports arrays and objects implementing Traversable interface' , 1248728393);
			}
			$each = $this->convertToArray($each);
		}

		if ($reverse === TRUE) {
			$each = array_reverse($each);
		}

		$output = '';
		$count = 0;
		foreach ($each as $keyValue => $singleElement) {
			$count++;
			if($count > $start) {
				$this->templateVariableContainer->add($as, $singleElement);
				if ($key !== '') {
					$this->templateVariableContainer->add($key, $keyValue);
				}
				$output .= $this->renderChildren();
				$this->templateVariableContainer->remove($as);
				if ($key !== '') {
					$this->templateVariableContainer->remove($key);
				}
			}
			if($limit > 0 && $count >= ($limit+$start))
				return $output;
		}
		return $output;
	}

	/**
	 * Turns the given object into an array.
	 * The object has to implement the Traversable interface
	 *
	 * @param Traversable $object The object to be turned into an array. If the object implements Iterator the key will be preserved.
	 * @return array The resulting array
	 * @author Bastian Waidelich <bastian@typo3.org>
	 */
	protected function convertToArray(Traversable $object) {
		$array = array();
		foreach ($object as $keyValue => $singleElement) {
			$array[$keyValue] = $singleElement;
		}
		return $array;
	}
}
?>
