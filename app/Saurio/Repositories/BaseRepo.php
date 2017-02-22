<?php

//Consulta las entidades y las hace disponibles

namespace Saurio\Repositories;

abstract class BaseRepo 
{
	protected $model;

	public function __construct()
	{
		$this->model = $this->getModel();
	}

	abstract public function getModel();

	public function find($id)
	{
		return $this->model->find($id);
	}

}