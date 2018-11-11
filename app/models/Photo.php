<?php

class Photo
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function countPhotos()
    {
        $this->db->query('SELECT COUNT(id) AS photosC FROM photos');
        $this->db->execute();
        $count = $this->db->single();
        return $count;
    }

    public function countComments()
    {
        $this->db->query('SELECT COUNT(id) AS commentsC FROM comments');
        $this->db->execute();
        $count = $this->db->single();
        return $count;
    }

    public function limitPhotos($start, $limit)
    {
        $this->db->query('SELECT * FROM photos LIMIT :limit OFFSET :offset');
        $this->db->bind(':offset', $start);
        $this->db->bind(':limit', $limit);
        $this->db->execute();
        $result = $this->db->resultSet();
        return $result;
    }

    public function allPhotos()
    {
        $this->db->query('SELECT * FROM photos ORDER BY id ASC');
        $this->db->execute();
        $result = $this->db->resultSet();
        return $result;
    }


    public function upload($data)
    {
        $uploads_dir = dirname(APPROOT) . '/public/uploads/'. $data['file']['name'];
        if ($data['file']['error'] == 0){
            $tmp_name = $data['file']['tmp_name'];
            move_uploaded_file($tmp_name, $uploads_dir);

            $this->db->query('INSERT INTO photos (user_id, title, caption,description, filename, alternate_text, type, size) VALUES (:user_id, :title, :caption,:description, :filename, :alternate_text, :type, :size)');
            $this->db->bind(':user_id', $data['user_id']);
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':caption', $data['title']);
            $this->db->bind(':description', $data['desc']);
            $this->db->bind(':filename', $data['file']['name']);
            $this->db->bind(':alternate_text', $data['title']);
            $this->db->bind(':type', $data['file']['type']);
            $this->db->bind(':size', $data['file']['size']);

            if ($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }else{
            die('SomeThing went Wrong');
        }

    }

    public function photosByUserId($id)
    {
        $this->db->query('SELECT * FROM photos WHERE user_id=:user_id ORDER BY uploaded_at DESC');
        $this->db->bind(':user_id', $id);
        $photos = $this->db->resultSet();
        if ($this->db->rowCount() > 0){
            return $photos;
        }else{
            return false;
        }
    }

    public function update($data)
    {
        $data = [
            'id' => $data['id'],
            'title' => trim($_POST['title']),
            'caption' => trim($_POST['caption']),
            'alt_text' => trim($_POST['alt_text']),
            'desc' => trim($_POST['desc']),
        ];
        $this->db->query('UPDATE photos SET title = :title, caption = :caption, alternate_text = :alt_text, description = :desc WHERE id=:id');

        $this->db->bind(':id', $data['id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':caption', $data['caption']);
        $this->db->bind(':alt_text', $data['alt_text']);
        $this->db->bind(':desc', $data['desc']);

        if ($this->db->execute()) {
            return true;
        }else{
            return false;
        }
    }

    public function addComment($data)
    {

        $this->db->query('INSERT INTO comments (photo_id,author,body) VALUES (:photo_id, :author, :body)');
        $this->db->bind(':photo_id', $data['photo_id']);
        $this->db->bind(':author', $data['author']);
        $this->db->bind(':body', $data['comment']);

        if ($this->db->execute()) {
            return true;
        }else{
            return false;
        }
    }

    public function commentsById($id)
    {
        $this->db->query('SELECT * FROM comments WHERE photo_id=:photo_id');
        $this->db->bind(':photo_id', $id);
        $comments = $this->db->resultSet();
        if ($this->db->rowCount() > 0){
            return $comments;
        }else{
            return false;
        }
    }


    public function allComments()
    {
        $this->db->query('SELECT * FROM comments');
        $comments = $this->db->resultSet();
        if ($this->db->rowCount() > 0){
            return $comments;
        }else{
            return false;
        }
    }

    public function photoById($id)
    {
        $this->db->query('SELECT * FROM photos WHERE id=:id');
        $this->db->bind(':id', $id);
        $photo = $this->db->single();
        if ($this->db->rowCount() > 0){
            return $photo;
        }else{
            return false;
        }
    }

    public function deletePhoto($id)
    {
        if ($this->photoById($id)){
            $photo = $this->photoById($id);
            $file = dirname(APPROOT) . '/public/uploads/'. $photo->filename;
        }else{
            die('Something went wrong');
        }

        $this->db->query('DELETE FROM photos WHERE id=:id');
        $this->db->bind(':id', $id);
        if ($this->db->execute()){
            unlink($file);
            flash('photo_deleted', 'Photo Successfully Deleted');
            return true;
        }else{
            return false;
        }
    }


}