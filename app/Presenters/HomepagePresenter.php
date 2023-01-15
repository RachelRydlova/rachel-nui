<?php

declare(strict_types=1);

namespace App\Presenters;

use Nette;
use Nette\Database\Explorer;
use Nette\Utils\Strings;
use Tracy\Debugger;

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
        $posts = $this->db->table('post')
            ->order('created_at DESC')
            ->limit(7)
            ->fetchAll();
        $massagePosts = $this->db->table('post')
            ->order('created_at DESC')
            ->limit(7)
            ->where('category','Masáže')
            ->fetchAll();
        $othersPosts = $this->db->table('post')
            ->order('created_at DESC')
            ->limit(7)
            ->where('category != "Masáže"')
            ->fetchAll();
        $this->template->posts = $posts;
        $this->template->massagePosts = $massagePosts;
        $this->template->otherPosts = $othersPosts;
        $this->template->projects = $this->db->table('project')
            ->order('created_at DESC')
            ->limit(4)
            ->fetchAll();
        $this->template->lastPosts = $this->db->table('post')
            ->order('created_at DESC')
            ->limit(4)
            ->fetchAll();

        $categList = [];
        foreach ($posts as $post) {
            if (!in_array($post->category, $categList)) 
                $categList[] = $post->category;
        }
        $this->template->categList = $categList;
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

    /**
     * v archivu filtruju podle kategorie
     * @param string $category
     * @return void
     */
    public function renderBlogArchive(string $category): void
    {
        $this->template->posts = $this->db->table('post')
            ->order('created_at DESC')
            ->where('category', $category)
            ->fetchAll();

    }

    /**
     * vytahnu projekty z databaze
     * @return void
     */
    public function renderDetailProject($projectId): void
    {
        $this->template->project = $this->db->table('project')->get($projectId);
        $this->template->lastProject = $this->db->table('project')
            ->order('created_at DESC')
            ->limit(1)
            ->fetch();
    }

    /**
     * do portfolia posilam vsechny projekty
     * @return void
     */
    public function renderPortfolio(): void
    {
        $this->template->projects = $this->db->table('project')
            ->order('created_at DESC')
            ->fetchAll();
    }


}
