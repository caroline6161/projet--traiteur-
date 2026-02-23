<?php
require_once 'src/models/AllergeneModel.php';

class AllergeneController
{
    public function index()
    {
        $allergenes = AllergeneModel::getAll();
        include 'src/views/allergenes/index.php';
    }

    public function showCreateForm()
    {
        include 'src/views/allergenes/create.php';
    }

    public function create()
    {
        AllergeneModel::create($_POST);
        header("Location: index.php?page=allergenes");
        exit;
    }

    public function showEditForm()
    {
        $allergene = AllergeneModel::getById($_GET['id']);
        include 'src/views/allergenes/edit.php';
    }

    public function update()
    {
        AllergeneModel::update($_POST['id'], $_POST);
        header("Location: index.php?page=allergenes");
        exit;
    }

    public function delete()
    {
        AllergeneModel::delete($_GET['id']);
        header("Location: index.php?page=allergenes");
        exit;
    }
}
