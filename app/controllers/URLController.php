<?php


namespace Controllers;

use Controllers\AppController;
use Models\Link;
use Services\LinkService;

class URLController extends AppController
{
	public  function index()
	{
		$links = Link::all();

		$this->render("url/index",["links"=>$links]);
	}

	/**
	 * @param string $short_url
	 */
	public function show($short_url)
	{
		$link = Link::where('exp_at','>=',date("Y-m-d H:i"))->find($short_url);
		if ($link) {
			$link->increment('counter');
			header('location:'.$link->long_url);
		}
		echo "Ссылка не найдена или просрочена";
	}
	
	public function store(...$data)
	{
		if (empty($_POST['long_url']) || empty($_POST['exp_at'])) {
			header("location:".$_SERVER['HTTP_HOST']);
		}

		$linkService = new LinkService();
		$linkService->urlToShortCode($_POST['long_url'],$_POST['exp_at']);

		header("location:".$_SERVER['HTTP_HOST']);

	}
}