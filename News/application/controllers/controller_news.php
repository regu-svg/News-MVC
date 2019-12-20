<?php

class controller_news extends Controller
{
    function __construct()
    {
        $this->model = new model_news();
        $this->view = new View();
    }

    function action_add()
    {
        $model = $this->model;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $model->title = isset($_POST['title']) ? $_POST['title'] : null;
            $model->short_description = isset($_POST['short_description']) ? $_POST['short_description'] : null;
            $model->full_description = isset($_POST['full_description']) ? $_POST['full_description'] : null;
            $model->image_url = isset($_POST['image_url']) ? $_POST['image_url'] : null;
            $model->IP = isset($_POST['IP']) ? $_POST['IP'] : null;
            $model->addRecord();
            return $this->view->generate(
                'main_view.php',
                'template_view.php',
                ['model' => $model]
            );
        }
        $this->view->generate('main_view.php', 'template_view.php', ['model' => $model]);
    }


}