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
 * Normalized dating of the work in question
 */
class Tx_Catalogueraisonne_Domain_Model_DateRanges extends Tx_Extbase_DomainObject_AbstractValueObject {

	/**
	 * Date in text form
	 *
	 * @var string $dateComment
	 * @validate NotEmpty
	 */
	protected $dateComment;

	/**
	 * The start date of the normalized time period
	 *
	 * @var string $startDate
	 * @validate NotEmpty
	 */
	protected $startDate;

	/**
	 * The end date of the normalized time period
	 *
	 * @var string $endDate
	 * @validate NotEmpty
	 */
	protected $endDate;

	/**
	 * A specific date sorting key for special dating circumstances
	 *
	 * @var string $dateKey
	 */
	protected $dateKey;

	/**
	 * A specific sorting string for special dating circumstances
	 *
	 * @var integer $beforeAfterChrist
	 */
	protected $beforeAfterChrist;

	/**
	 * The parent record to which this date belongs
	 *
	 * @var integer $parentRecord
	 */
	protected $parentRecord;

	/**
	 * The parent table to which this date belongs
	 *
	 * @var string $ident
	 */
	protected $ident;

	/**
	 * __construct
	 *
	 * @return void
	 */
	public function __construct() {
	
	}

	/**
	 * Sets the dateComment
	 *
	 * @param string $dateComment
	 * @return void
	 */
	public function setDateComment($dateComment) {
		$this->dateComment = $dateComment;
	}

	/**
	 * Returns the dateComment
	 *
	 * @return string
	 */
	public function getDateComment() {
		return $this->dateComment;
	}

	/**
	 * Sets the startDate
	 *
	 * @param string $startDate
	 * @return void
	 */
	public function setStartDate($startDate) {
		$this->startDate = $startDate;
	}

	/**
	 * Returns the startDate
	 *
	 * @return string
	 */
	public function getStartDate() {
		return $this->startDate;
	}

	/**
	 * Sets the endDate
	 *
	 * @param string $endDate
	 * @return void
	 */
	public function setEndDate($endDate) {
		$this->endDate = $endDate;
	}

	/**
	 * Returns the endDate
	 *
	 * @return string
	 */
	public function getEndDate() {
		return $this->endDate;
	}

	/**
	 * Sets the dateKey
	 *
	 * @param string $dateKey
	 * @return void
	 */
	public function setDateKey($dateKey) {
		$this->dateKey = $dateKey;
	}

	/**
	 * Returns the dateKey
	 *
	 * @return string
	 */
	public function getDateKey() {
		return $this->dateKey;
	}

	/**
	 * Sets the beforeAfterChrist
	 *
	 * @param integer $beforeAfterChrist
	 * @return void
	 */
	public function setBeforeAfterChrist($beforeAfterChrist) {
		$this->beforeAfterChrist = $beforeAfterChrist;
	}

	/**
	 * Returns the beforeAfterChrist
	 *
	 * @return integer
	 */
	public function getBeforeAfterChrist() {
		return $this->beforeAfterChrist;
	}

	/**
	 * Sets the parentRecord
	 *
	 * @param integer $parentRecord
	 * @return void
	 */
	public function setParentRecord($parentRecord) {
		$this->parentRecord = $parentRecord;
	}

	/**
	 * Returns the parentRecord
	 *
	 * @return integer
	 */
	public function getParentRecord() {
		return $this->parentRecord;
	}

	/**
	 * Returns the ident
	 *
	 * @return string
	 */
	public function getIdent() {
		return $this->ident;
	}

	/**
	 * Sets the ident
	 *
	 * @param string $ident
	 * @return void
	 */
	public function setIdent($ident) {
		$this->ident = $ident;
	}

}
?>