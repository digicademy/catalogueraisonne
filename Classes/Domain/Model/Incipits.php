<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2011 Torsten Schrade <Torsten.Schrade@adwmainz.de>, Academy of Sciences and Literature, Mainz
*  
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 3 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/


/**
 * The subparts a part of the work consists
 */
class Tx_Catalogueraisonne_Domain_Model_Incipits extends Tx_Extbase_DomainObject_AbstractValueObject {

	/**
	 * Information about the instrumentation and cast of this incipit
	 *
	 * @var string $instrumentation
	 */
	protected $instrumentation;

	/**
	 * The tempo of the incipit
	 *
	 * @var string $tempo
	 */
	protected $tempo;

	/**
	 * The whole length of this piece
	 *
	 * @var integer $length
	 */
	protected $length;

	/**
	 * Textual information of this piece
	 *
	 * @var string $textinfos
	 */
	protected $textinfos;

	/**
	 * Musicological information
	 *
	 * @var string $score
	 */
	protected $score;

	/**
	 * __construct
	 *
	 * @return void
	 */
	public function __construct() {
	}

	/**
	 * getInstrumentation
	 *
	 * @return string
	 */
	public function getInstrumentation() {
		return $this->instrumentation;
	}

	/**
	 * setInstrumentation
	 *
	 * @param string $instrumentation
	 * @return void
	 */
	public function setInstrumentation($instrumentation) {
		$this->instrumentation = $instrumentation;
	}

	/**
	 * Returns the tempo
	 *
	 * @return string
	 */
	public function getTempo() {
		return $this->tempo;
	}

	/**
	 * Sets the tempo
	 *
	 * @param string $tempo
	 * @return void
	 */
	public function setTempo($tempo) {
		$this->tempo = $tempo;
	}

	/**
	 * Returns the textinfos
	 *
	 * @return string $textinfoinfos
	 */
	public function getTextinfos() {
		return $this->textinfos;
	}

	/**
	 * Sets the textinfos
	 *
	 * @param string $textinfoinfos
	 * @return void
	 */
	public function setTextinfos($textinfos) {
		$this->textinfos = $textinfos;
	}

	/**
	 * Returns the score
	 *
	 * @return string $score
	 */
	public function getScore() {
		return $this->score;
	}

	/**
	 * Sets the score
	 *
	 * @param string $score
	 * @return void
	 */
	public function setScore($score) {
		$this->score = $score;
	}

	/**
	 * Returns the length
	 *
	 * @return integer
	 */
	public function getLength() {
		return $this->length;
	}

	/**
	 * Sets the length
	 *
	 * @param integer $length
	 * @return void
	 */
	public function setLength($length) {
		$this->length = $length;
	}

}
?>