<?php
require_once 'src/models/PlatModel.php';

class PlatController
{
    public function index()
    {
        $plats = PlatModel::getAllPlats();
        include 'src/views/plats/index.php';
    }

    public function showCreateForm()
    {
        include 'src/views/plats/create.php';
    }

    public function create()
    {
        PlatModel::createPlat($_POST);
        header("Location: index.php?page=plats");
        exit;
    }

    public function showEditForm()
    {
        $plat = PlatModel::getPlatById($_GET['id']);
        include 'src/views/plats/edit.php';
    }

    public function update()
    {
        PlatModel::updatePlat($_POST['id'], $_POST);
        header("Location: index.php?page=plats");
        exit;
    }

    public function delete()
    {
        PlatModel::deletePlat($_GET['id']);
        header("Location: index.php?page=plats");
        exit;
    }
    public function addAllergene()
{
    PlatModel::addAllergeneToPlat($_POST['plat_id'], $_POST['allergene_id']);
    header("Location: index.php?page=plat-edit&id=" . $_POST['plat_id']);
    exit;
}

public function removeAllergene()
{
    PlatModel::removeAllergeneFromPlat($_GET['plat_id'], $_GET['allergene_id']);
    header("Location: index.php?page=plat-edit&id=" . $_GET['plat_id']);
    exit;
}

}
