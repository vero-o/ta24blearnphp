<?php

namespace App\Controllers;

use App\DB;
use App\Models\Post;
use App\Models\User;

class PublicController
{
    public function index()
    {
        $posts = Post::all();
        $title = 'World';
        view('index', compact('title', 'posts'));
    }

    public function us()
    {
        $posts = Post::all();
        view('us', compact('posts'));
    }


    /**
     * Technology lehekulg (/tech).
     * Postitused on siin kaes kirjutatud massiivis, mitte andmebaasist - nii on
     * leht naha ka siis, kui andmebaasi konteiner ei kai. Vaade views/tech.php
     * kasutab sama partial'i views/partials/posts.php, mis kaib $post->title,
     * $post->created_at ja $post->body kallale, seega teen igast postitusest objekti.
     */
    public function tech()
    {
        $title = 'Technology';

        $posts = [
            (object) [
                'title' => 'PHP 8.5 tuli valja - mis seal uut on',
                'created_at' => '2026-10-02',
                'body' => 'PHP 8.5 lisas pipe-operaatori |&gt;, uue #[\NoDiscard] atribuudi ja '
                    . 'kiiremad massiivifunktsioonid. Kirjutasin selle lehe PHP 8.5 peal ja '
                    . 'vana koodi muutma ei pidanud - taganemisuhilduvus on hea.',
            ],
            (object) [
                'title' => 'Miks ma hoian andmebaasi Dockeris',
                'created_at' => '2026-09-28',
                'body' => 'Selle projekti docker-compose.yml kaivitab MariaDB nimega volume\'iga. '
                    . 'Nii ei pea ma andmebaasi oma arvutisse installima ja kui midagi katki laheb, '
                    . 'saab konteineri lihtsalt uuesti luua - andmed jaavad volume\'i alles.',
            ],
            (object) [
                'title' => 'Router 30 realt: kuidas see projekt URL-i leiab',
                'created_at' => '2026-09-20',
                'body' => 'Fail routes.php paneb kokku nimekirja marsruutidest, public/index.php '
                    . 'votab $_SERVER[\'REQUEST_URI\'] ja otsib sobiva. Kui vastet ei ole, tuleb 404. '
                    . 'Just seeparast ei tootanud /tech enne, kui ma marsruudi lisasin.',
            ],
            (object) [
                'title' => 'Clipboard API - brauser ei lase niisama lugeda',
                'created_at' => '2026-09-14',
                'body' => 'Tegin teises aines Vue lehe, mis kasutab Clipboard API-t. Kirjutamine '
                    . 'tootab kohe, lugemine kusib luba ja viskab muidu NotAllowedError. '
                    . 'Loogiline - muidu loeks iga leht sinu lõikelaua ara.',
            ],
        ];

        view('tech', compact('title', 'posts'));
    }

    public function forms()
    {
        view('forms');
    }

    public function answer()
    {
        dump($_GET, $_POST);
    }
}
