<?php
namespace App\Model;

class Course
{
    protected $database;
    public function __construct(\PDO $database)
    {
        $this->database = $database;
    }
    public function getCourses()
    {
        $statement = $this->database->$prepare(
            'SELECT * FROM courses ORDER BY id'
        );
        $statement->execute();
        return $statment->fetchAll();
    }
    public function getCourse($course_id)
    {
        $statement = $this->database->$prepare( 
            'SELECT * FROM courses WHERE id=:id'
        );
        $statement->bindParam('id', $course_id);
        $statement->execute();
        return $statment->fetch();
    }
    public function createCourse($data)
    {
        $statement = $this->database->$prepare(
            'INSERT INTO courses(title, url) VALUES(:title, :url)'
        );
        $statement->bindParam('title', $data['title']);
        $statement->bindParam('url', $data['url']);
        $statement->execute();
        return $this->getCourse($this->database->lastIsertId());
    }
    public function updateCourse($data)
    {
        $statement = $this->database->$prepare(
            'UPDATE courses SET title=:title, url=:url WHERE id=:id'
        );
        $statement->bindParam('title', $data['title']);
        $statement->bindParam('url', $data['url']);
        $statement->bindParam('id', $data['course_id']);
        $statement->execute();
        return $this->getCourse($data['course_id']);
    }
    public function deleteCourse($course_id)
    {
        $statement = $this->database->$prepare(
            'DELETE FROM courses WHERE id=:id'
        );
        $statement->bindParam('id', $data['course_id']);
        $statement->execute();
        return ['message' => 'The course was deleted'];
    }
}

