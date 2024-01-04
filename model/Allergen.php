<?php

/**
 * Entitat Allergen
 * 
 * Emmagatzema la informació dels alergens dels productes
 */
class Allergen {

	/**
	 * Propietats
	 */
	private $id;
	private $code;
	private $name;
	private $description;
	private $img_path;

	public function __construct() {}

	/**
	 * Get the value of id
	 */ 
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Set the value of id
	 *
	 * @return  self
	 */ 
	public function setId($id)
	{
		$this->id = $id;

		return $this;
	}

	/**
	 * Get the value of code
	 */ 
	public function getCode()
	{
		return $this->code;
	}

	/**
	 * Set the value of code
	 *
	 * @return  self
	 */ 
	public function setCode($code)
	{
		$this->code = $code;

		return $this;
	}

	/**
	 * Get the value of name
	 */ 
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Set the value of name
	 *
	 * @return  self
	 */ 
	public function setName($name)
	{
		$this->name = $name;

		return $this;
	}

	/**
	 * Get the value of description
	 */ 
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * Set the value of description
	 *
	 * @return  self
	 */ 
	public function setDescription($description)
	{
		$this->description = $description;

		return $this;
	}

	/**
	 * Get the value of img_path
	 */ 
	public function getImgPath()
	{
		return $this->img_path;
	}

	/**
	 * Set the value of img_path
	 *
	 * @return  self
	 */ 
	public function setImgPath($img_path)
	{
		$this->img_path = $img_path;

		return $this;
	}

}

?>