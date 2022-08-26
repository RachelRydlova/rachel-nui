<?php

declare(strict_types=1);

namespace App\Presenters;

use Nette;
use Nette\Database\Explorer;


class HomepagePresenter extends BasePresenter
{
    private Explorer $db;

    public function __construct(Explorer $db)
    {
        $this->db = $db;
    }

    /**
     * do sablony posilam novinky/aktuality z databaze
     * @return void
     */
    public function beforeRender(): void
    {
        $this->template->posts = $this->db->table('post')
            ->order('created_at DESC')
            ->fetchAll();
    }

    /**
     * vykresleni novinky/aktuality z databaze
     * @param int $postId
     * @return void
     */
    public function renderDetailNew(int $postId): void
    {
        $this->template->post = $this->db->table('post')->get($postId);
    }


}
