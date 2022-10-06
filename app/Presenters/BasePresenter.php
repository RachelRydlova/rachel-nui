<?php

declare(strict_types=1);

namespace App\Presenters;


use Nette\Application\UI\Presenter;


/**
 * Class BasePresenter
 * @package App\Presenters
 */
class BasePresenter extends Presenter
{


    public static $mainMenu = [
        ':Homepage:kodovani' => 'Webovky',
        ':Homepage:masaze' => 'Masáže',
        ':Homepage:portfolio' => 'Projekty',
        ':Homepage:novinky' => 'Novinky a články',
        ':Homepage:kontakt' => 'Kontakt'
    ];


    public function beforeRender(): void
    {

        // Zakladni labely
        $this->template->baseTitle = 'Rachel Rydlova';

    }

}