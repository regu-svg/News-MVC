<?php

class model_news
{
    public $title;
    public $short_description;
    public $full_description;
    public $image_url;
    public $errors;

    public function addRecord()
    {
        if (empty($this->title)) {
            $errors['title'] = 'значение отсутствует!';
        }
        if (empty($this->short_description)) {
            $errors['short_description'] = 'значение отсутствует!';
        }
        if (empty($this->full_description)) {
            $errors['full_description'] = 'значение отсутствует!';
        }
        if (empty($this->image_url)) {
            $errors['image_url'] = 'значение отсутствует!';
        }
        if (empty($errors)) {

            $connection = (new connect())->database();
            return $connection->query("INSERT INTO `news` (`title`, `short_description`, `full_description`,`image_url`)
                                              VALUES ('$this->title','$this->short_description','$this->full_description','$this->image_url')");
        }
        $this->errors = $errors;
        return false;

    }
}