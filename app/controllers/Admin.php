<?php


class Admin extends Controller
{
    protected $userModel;
    protected $photoModel;
    public function __construct()
    {
        $this->userModel = $this->model('User');
        $this->photoModel = $this->model('Photo');
    }

    public function index()
    {
        if (!isLoggedIn()){
            redirect('admin/login');
        }
        $data =[];
        if ($this->userModel->countUsers()){
            $data[] = $this->userModel->countUsers();
        }
        if ($this->photoModel->countPhotos()){
            $data[] = $this->photoModel->countPhotos();
        }
        if ($this->photoModel->countComments()){
            $data[] = $this->photoModel->countComments();
        }
        $this->view('admin/index', $data);
    }

    public function users()
    {
        if ($this->userModel->allUsers()){
            $data = $this->userModel->allUsers();
        }else{
            $data = [];
        }
        $this->view('admin/users', $data);
    }

    public function photos()
    {
        $data = [];
        $id = $_SESSION['user_id'];
        if($this->photoModel->photosByUserId($id)){
            $data = $this->photoModel->photosByUserId($id);
        }else{
            $data['photos'] = '';
        }

        $this->view('admin/photos', $data);
    }

    public function comments()
    {
        if($this->photoModel->allComments()){
            $data = $this->photoModel->allComments();
        }else{
            $data = '';
        }

        $this->view('admin/comments', $data);
    }

    public function addcomment()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'photo_id' => $_POST['photo_id'],
                'author' => $_POST['author'],
                'comment' => $_POST['comment']
            ];

            if (!empty($data['photo_id']) && !empty($data['author']) && !empty($data['comment'])){

                if ($this->photoModel->addComment($data)){
                    redirect('pages/show/'. $data['photo_id']);
                }else{
                    redirect('pages/show/'. $data['photo_id']);
                }
            }else{
                echo 'Something went wrong';
            }
        }
    }


    public function deletePhoto($id)
    {
        if (isset($id)){
            if ($this->photoModel->deletePhoto($id)){
                redirect('admin/photos');
            }
        }
        $this->view('admin/photos');
    }

    public function editphoto($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'id' => $id,
                'title' => trim($_POST['title']),
                'caption' => trim($_POST['caption']),
                'alt_text' => trim($_POST['alt_text']),
                'desc' => trim($_POST['desc']),
            ];
            if (isset($data['title']) && isset($data['caption']) && isset($data['alt_text']) && isset($data['desc'])){

                if ($this->photoModel->update($data)){
                    flash('update_success',  'Your photo was updated');
                    redirect('/admin/photos');
                }else{
                    die('Something went wrong');
                }

            }else{
                flash('update_success', 'Please fill out', 'alert alert-danger');
                $this->view('admin/edit', $data);
            }
        }else{
            $data = [];
            if($this->photoModel->photoById($id)){
                $data = $this->photoModel->photoById($id);
            }
            $this->view('admin/edit', $data);
        }
    }

    public function uploads()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'user_id' => $_SESSION['user_id'],
                'title' => $_POST['title'],
                'file' => $_FILES['uploaded_file'],
                'desc' => $_POST['desc'],
                'title_err' => ''
            ];
            if (empty($data['title'])){
                $data['title_err'] = 'Please Enter Title';
            }

            if (empty($data['title_err']) && !empty($data['file']['name'])){

                if ($this->photoModel->upload($data)){
                    flash('picture_uploaded','Picture uploaded successfully');
                    redirect('admin/photos');
                }
            }else{
                $this->view('admin/uploads', $data);
            }
        }else{
            $data = [
                'title' => '',
                'file' => '',
                'title_err' => ''
            ];
            $this->view('admin/uploads', $data);
        }

        $this->view('admin/uploads', $data);
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'con_password' => trim($_POST['con_password']),
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'con_password_err' => ''
            ];

            if (empty($data['name'])){
                $data['name_err'] = 'Please Enter Name';
            }

            if (empty($data['email'])){
                $data['email_err'] = 'Please Enter Email';
            }

            if (empty($data['password'])){
                $data['password_err'] = 'Please Enter Password';
            }elseif (strlen($data['password']) < 6 ){
                $data['password_err'] = 'Password must be at least 5 characters';
            }

            if (empty($data['con_password'])){
                $data['con_password_err'] = 'Please Confirm Password';
            }else{
                if ($data['password'] != $data['con_password']){
                    $data['con_password_err'] = 'Password does not match';
                }
            }

            if (empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['con_password_err'])){
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                if ($this->userModel->register($data)){
                    flash('register_success', 'Your are registered and log in');
                    redirect('/admin/login');
                }else{
                    die('Something went wrong');
                }


            }else{
                $this->view('admin/register', $data);
            }
        }else{
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'con_password' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'con_password_err' => ''
            ];
            $this->view('admin/register', $data);
        }
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => '',
            ];


            if (empty($data['email'])){
                $data['email_err'] = 'Please Enter Email';
            }

            if (empty($data['password'])){
                $data['password_err'] = 'Please Enter Password';
            }
            if ($this->userModel->findUserByEmail($data['email'])){
                // User Found
            }else{
                $data['email_err'] = 'User not found';
            }

            if (empty($data['email_err']) && empty($data['password_err'])){
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);
                if ($loggedInUser){
                    $this->createUserSession($loggedInUser);
                }else{
                    $data['password_err'] = 'Please Enter Password';
                    $this->view('admin/login', $data);
                }

            }else{
                $this->view('admin/login', $data);
            }
        }else{
            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',
            ];
            $this->view('admin/login', $data);
        }
    }



    public function createUserSession($user)
    {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_name'] = $user->name;
        redirect('admin/index');
    }

    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        session_destroy();
        redirect('index');
    }
}