<?php

class PublicController extends BaseController 
{
	public function ads()
	{
		$title =  "Campaña de Anuncios";
		$description = "Lista de anuncios utilizados en las campañas de Icerlly";

		return View::make('public/ads', compact('title','description'));
	}

	public function welcome()
	{
		$title =  "Bienvenido a Icerlly";
		$description = "Bienvenido a Icerlly";

		return View::make('public/home', compact('title','description'));
	}

	public function action()
	{
		$title =  "Tomar Acción en Icerlly";
		$description = "Tomar Acción en Icerlly";

		return View::make('public/action', compact('title','description'));
	}

	public function showGuide()
	{
		$title =  "Guía inicial de Icerlly";
		$description = "En esta guía te enseñaremos las cosas básicas que necesitas saber para utilizar icerlly y ganar dinero en internet";

		return View::make('public/guide', compact('title','description'));
	}

	public function showFeature()
	{
		$title =  "Funcionalidades de Icerlly";
		$description = "Lista de funciones de Icerlly que te permiten saber en que estado se encuentra la plataforma y como agregaremos formas de trabajar en internet";

		return View::make('public/feature', compact('title','description'));
	}

	public function search()
	{
		$title =  "Buscar Personas en Icerlly";
		$description = "Buscar Personas en Icerlly";

		return View::make('public/search/engine', compact('title','description'));
	}

	public function search_t()
	{
		$title =  "Buscar Tweets en Icerlly";
		$description = "Buscar Tweets en Icerlly";

		return View::make('public/search/posts', compact('title','description'));
	}

}