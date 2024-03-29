<?php

declare(strict_types=1);

namespace App\Router;

use Nette;
use Nette\Application\Routers\RouteList;


final class RouterFactory
{
	use Nette\StaticClass;

	public static function createRouter(): RouteList
	{
		$router = new RouteList;
        $router->addRoute('/', 'Homepage:default');

        // Vlastni routy
//        $router[] = new Nette\Application\Routers\Route('/o-mne-rozcestnik', 'Homepage:rozcestnik');
        $router[] = new Nette\Application\Routers\Route('/tvorba-webovek', 'Homepage:kodovani');
        $router[] = new Nette\Application\Routers\Route('/masaze', 'Homepage:masaze');
        $router[] = new Nette\Application\Routers\Route('/portfolio', 'Homepage:portfolio');
        $router[] = new Nette\Application\Routers\Route('/novinky', 'Homepage:novinky');
        $router[] = new Nette\Application\Routers\Route('/kontakt', 'Homepage:kontakt');
        $router[] = new Nette\Application\Routers\Route('/detailProjektu', 'Homepage:detailProject');
        $router[] = new Nette\Application\Routers\Route('/detailClanku', 'Homepage:detailNew');
        $router[] = new Nette\Application\Routers\Route('/blog', 'Homepage:blog');
        $router[] = new Nette\Application\Routers\Route('/archiv', 'Homepage:blogArchive');

        $router[] = new Nette\Application\Routers\Route('/clanek', 'Homepage:post');
		$router->addRoute('<presenter>/<action>[/<id>]', 'Homepage:default');

		return $router;
	}
}
