<?php

class VisibilityClass
{
	private $protected;

	protected function setProtected($protect)
	{
		$this->protected = $protect;
	}

	protected function getProtected()
	{
		return $this->protected;
	}
}

class ChildVisibilityClass extends VisibilityClass
{
	// public $getPro = $this->getProtected();
	function setPro($pro)
	{
		$this->setProtected($pro);
		// $this->protected = $pro;
	}

	function getPro()
	{
		echo $this->getProtected();
	}
}

$visible = new ChildVisibilityClass();
$visible->setPro("Hi Protected!");
$visible->getPro();
