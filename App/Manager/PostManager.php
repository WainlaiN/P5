<?php

namespace App\Manager;

use App\Core\Database;
use App\Model\Post;

/**
 * PostManager Queries for Posts
 */

class PostManager extends Database
{


    private $model = Post::class;
    private $table_name = 'posts';


    /**
     * Return All Posts
     *
     * @return array
     */
    public function getPosts()
    {
        $posts = 'SELECT id, title, chapo, description, author, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation, DATE_FORMAT(date_update, \'%d/%m/%Y\') AS date_update FROM ' . $this->table_name . ' ORDER BY date_creation DESC';
        $result = $this->sql($posts);

        while ($datas = $result->fetchObject($this->model)) {
            $custom_array[] = $datas;
        }
        return $custom_array;

    }

    /**
     * Return one Post from ID
     *
     * @param $postId
     * @return mixed
     */
    public function getPost($postId)
    {
        $post = 'SELECT id, title, chapo, description, author, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation, DATE_FORMAT(date_update, \'%d/%m/%Y\') AS date_update FROM ' . $this->table_name . ' WHERE id= :postId';
        $parameters = [':postId' => $postId];
        $result = $this->sql($post, $parameters);
        return $result->fetchObject($this->model);

    }

    /**
     * Add a Post
     *
     * @param $post
     * @return bool|false|\PDOStatement
     */
    public function addPost($post)
    {
        $newPost = 'INSERT INTO ' . $this->table_name . '( title, chapo, description, author, date_creation, author_id) VALUES (:title, :chapo, :description, :author, NOW(), :author_id)';
        $parameters = [
            ':title' => $post['title'],
            ':chapo' => $post['chapo'],
            ':description' => $post['description'],
            ':author' => $post['author'],
            ':author_id' => $post['author_id'],

        ];

        $result = $this->sql($newPost, $parameters);
        return $result;

    }

    /**
     * Delete a Post
     *
     * @param $postId
     * @return bool|false|\PDOStatement
     */
    public function deletePost($postId)
    {
        $post = 'DELETE FROM ' . $this->table_name . ' WHERE id= :id';
        $parameters = [':id' => $postId];
        $result = $this->sql($post, $parameters);
        return $result;
    }

    /**
     * Update a Post
     *
     * @param $postId
     * @return bool|false|\PDOStatement
     */
    public function updatePost($postId, $datas)
    {

        $editedPost = 'UPDATE ' . $this->table_name . ' SET author=:author, title=:title, chapo=:chapo, description=:description, date_update=NOW() WHERE id=:id';
        $parameters = [
            ':id' => $postId,
            ':author' => $datas['author'],
            ':title' => $datas['title'],
            ':chapo' => $datas['chapo'],
            ':description' => $datas['description'],

        ];
        $result = $this->sql($editedPost, $parameters);
        return $result;
    }
}
