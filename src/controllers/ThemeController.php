<?php
require_once 'src/models/ThemeModel.php';

class ThemeController
{
    public function index()
    {
        $themes = ThemeModel::getAll();
        include 'src/views/themes/index.php';
    }

    public function showCreateForm()
    {
        include 'src/views/themes/create.php';
    }

    public function create()
    {
        ThemeModel::create($_POST);
        header("Location: index.php?page=themes");
        exit;
    }

    public function showEditForm()
    {
        $theme = ThemeModel::getById($_GET['id']);
        include 'src/views/themes/edit.php';
    }

    public function update()
    {
        ThemeModel::update($_POST['id'], $_POST);
        header("Location: index.php?page=themes");
        exit;
    }

    public function delete()
    {
        ThemeModel::delete($_GET['id']);
        header("Location: index.php?page=themes");
        exit;
    }
}
