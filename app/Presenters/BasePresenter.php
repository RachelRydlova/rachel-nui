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
        ':Homepage:default' => 'Domů',
        ':Homepage:rozcestnik' => 'O mně',
        ':Homepage:portfolio' => 'Portfolio',
        ':Homepage:novinky' => 'Novinky',
        ':Homepage:kontakt' => 'Kontakt'
    ];


    public function beforeRender(): void
    {

        // Zakladni labely
        $this->template->baseTitle = 'Rachel Rydlova';

    }

}