<?php

require_once 'src/models/MenuModel.php';

class MenuController
{
    public function index()
    {
        $menus = MenuModel::getAll();
        include 'src/views/menus/menus.php';
    }

    public function showCreateForm()
    {
        include 'src/views/menus/create.php';
    }

    public function create()
    {
        // ton code de création
    }

    public function showEditForm()
    {
        // ton code
    }

    public function update()
    {
        // ton code
    }

    public function delete()
    {
        // ton code
    }

    public function addPlat()
    {
        // ton code
    }

    public function removePlat()
    {
        // ton code
    }
}
