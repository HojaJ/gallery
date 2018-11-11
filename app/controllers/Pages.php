<?php


class Pages extends Controller
{
    protected $photoModel;
    public function __construct()
    {
        $this->photoModel = $this->model('Photo');
    }

    public function show($id=null)
    {
        if  (!isset($id)){
            redirect('pages/index');
        }
        $data = [];
        if ($this->photoModel->photoById($id)){
            $data[] = $this->photoModel->photoById($id);
        }else{
            $photosCount = $this->photoModel->countPhotos()->photosC;
            $id = intval($photosCount);
        }
        if ($this->photoModel->commentsById($id)){
            $data[] = $this->photoModel->commentsById($id);
        }
        $this->view('pages/show', $data);
    }

    public function index($id = 1)
    {
        $limit = 4;
        $page = is_null($id) ? 1 : intval($id);
        $photos = $this->photoModel->countPhotos()->photosC;
        $pages = ceil(intval($photos) / $limit);
        if (empty($page) or $page < 0) $page = 1;
        if ($page > $pages) { header("Location: " . URLROOT); }
        $offset = ($page - 1) * $limit;

        $data = $this->photoModel->limitPhotos($offset,$limit);

        $data['page'] = array($page, $pages, $id);

        $this->view('pages/index',$data);
    }

    public function about()
    {
        $data = ['title' => 'About us'];
        $this->view('pages/about', $data);
    }
}