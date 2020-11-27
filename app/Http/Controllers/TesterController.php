<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Developer;
use Illuminate\Http\Request;

class TesterController extends Controller
{
    public function addDeveloper()
    {
        $developers=[
            ["name"=>"Derrick","email"=>"derrick@gmail.com","phone"=>"123456789"],
            ["name"=>"Orphée","email"=>"orphee@gmail.com","phone"=>"987456321"]
        ];
        Developer::insert($developers);
        return "Developers are added!";
    }
    public function addArticle()
    {
        $articles=[
            ["title"=>"The first title","body"=>"The first description"],
            ["title"=>"The second title","body"=>"The second description"]
        ];
        Article::insert($articles);
        return "Articles are added!";
    }
    public function getDeveloper()
    {
        $developers= Developer::all();
        return $developers;
    }
    public function getArticle()
    {
        $articles= Article::all();
        return $articles;
    }
}
