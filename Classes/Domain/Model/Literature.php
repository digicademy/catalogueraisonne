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
 * Relevant secondary literature for the works
 */
class Tx_Catalogueraisonne_Domain_Model_Literature extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * The author of the reference
	 *
	 * @var string $aut
	 */
	protected $aut;

	/**
	 * The title of the work
	 *
	 * @var string $titel
	 */
	protected $titel;

	/**
	 * Series or collection
	 *
	 * @var string $series
	 */
	protected $series;

	/**
	 * place of publication
	 *
	 * @var string $ort
	 */
	protected $ort;

	/**
	 * year of publication
	 *
	 * @var string $jahr
	 */
	protected $jahr;
	
	/**
	 * page number of publication
	 *
	 * @var string $page
	 */
	protected $page;

	/**
	 * isbn/issn of publication
	 *
	 * @var string $isbn
	 */
	protected $isbn;
	
	/**
	 * bibtype and/or information of/about the reference
	 *
	 * @var string $cod
	 */
	protected $cod;

	/**
	 * quoted from
	 *
	 * @var string $qn
	 */
	protected $qn;

	/**
	 * Library in which it is kept
	 *
	 * @var string $bib
	 */
	protected $bib;

	/**
	 * The type of material (copy or original)
	 *
	 * @var string
	 */
	protected $ar;

	/**
	 * __construct
	 *
	 * @return void
	 */
	public function __construct() {
	}

	/**
	 * Sets the aut
	 *
	 * @param string $aut
	 * @return void
	 */
	public function setAut($aut) {
		$this->aut = $aut;
	}

	/**
	 * Returns the aut
	 *
	 * @return string
	 */
	public function getAut() {
		return $this->aut;
	}

	/**
	 * Sets the titel
	 *
	 * @param string $titel
	 * @return void
	 */
	public function setTitel($titel) {
		$this->titel = $titel;
	}

	/**
	 * Returns the titel
	 *
	 * @return string
	 */
	public function getTitel() {
		return $this->titel;
	}

	/**
	 * Sets the ort
	 *
	 * @param string $ort
	 * @return void
	 */
	public function setOrt($ort) {
		$this->ort = $ort;
	}

	/**
	 * Returns the ort
	 *
	 * @return string
	 */
	public function getOrt() {
		return $this->ort;
	}

	/**
	 * Sets the jahr
	 *
	 * @param string $jahr
	 * @return void
	 */
	public function setJahr($jahr) {
		$this->jahr = $jahr;
	}

	/**
	 * Returns the jahr
	 *
	 * @return string
	 */
	public function getJahr() {
		return $this->jahr;
	}
	
	/**
	 * Sets the page
	 *
	 * @param string $page
	 * @return void
	 */
	public function setPage($page) {
		$this->jahr = $page;
	}
	
	/**
	 * Returns the page
	 *
	 * @return string
	 */
	public function getPage() {
		return $this->page;
	}

	/**
	 * Sets the isbn/issn
	 *
	 * @param string $isbn
	 * @return void
	 */
	public function setISBN($isbn) {
		$this->isbn = $isbn;
	}
	
	/**
	 * Returns the isbn/issn
	 *
	 * @return string
	 */
	public function getISBN() {
		return $this->isbn;
	}

	/**
	 * Sets the cod
	 *
	 * @param string $cod
	 * @return void
	 */
	public function setCod($cod) {
		$this->cod = $cod;
	}

	/**
	 * Returns the cod
	 *
	 * @return string
	 */
	public function getCod() {
		return $this->cod;
	}

	/**
	 * Sets the qn
	 *
	 * @param string $qn
	 * @return void
	 */
	public function setQn($qn) {
		$this->qn = $qn;
	}

	/**
	 * Returns the qn
	 *
	 * @return string
	 */
	public function getQn() {
		return $this->qn;
	}

	/**
	 * Sets the bib
	 *
	 * @param string $bib
	 * @return void
	 */
	public function setBib($bib) {
		$this->bib = $bib;
	}

	/**
	 * Returns the bib
	 *
	 * @return string
	 */
	public function getBib() {
		return $this->bib;
	}

	/**
	 * getSeries
	 *
	 * @return strseriesg
	 */
	public function getSeries() {
		return $this->series;
	}

	/**
	 * setSeries
	 *
	 * @param strseriesg $series
	 * @return void
	 */
	public function setSeries($series) {
		$this->series = $series;
	}

	/**
	 * Returns the ar
	 *
	 * @return string $ar
	 */
	public function getAr() {
		return $this->ar;
	}

	/**
	 * Sets the ar
	 *
	 * @param string $ar
	 * @return void
	 */
	public function setAr($ar) {
		$this->ar = $ar;
	}

}
?>