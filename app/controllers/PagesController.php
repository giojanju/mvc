<?php
class PagesController extends Controller 
{
    public $page;

    public function __construct()
    {
        $this->page = $this->model('Page');
    }

    public function index() 
    {
        $posts = $this->page->getPosts();

        $data = [
            'posts' => $posts
        ];
        return $this->view('index', $data);
    }

    
    public function about() 
    {
        return $this->view('about');
    }
}