<?php
require_once 'src/models/RegimeModel.php';

class RegimeController
{
    public function index()
    {
        $regimes = RegimeModel::getAll();
        include 'src/views/regimes/index.php';
    }

    public function showCreateForm()
    {
        include 'src/views/regimes/create.php';
    }

    public function create()
    {
        RegimeModel::create($_POST);
        header("Location: index.php?page=regimes");
        exit;
    }

    public function showEditForm()
    {
        $regime = RegimeModel::getById($_GET['id']);
        include 'src/views/regimes/edit.php';
    }

    public function update()
    {
        RegimeModel::update($_POST['id'], $_POST);
        header("Location: index.php?page=regimes");
        exit;
    }

    public function delete()
    {
        RegimeModel::delete($_GET['id']);
        header("Location: index.php?page=regimes");
        exit;
    }
}
