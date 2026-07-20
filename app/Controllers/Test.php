<?php

namespace App\Controllers;

use App\Models\TestModel;

class Test extends BaseController
{
    public function index()
    {
        $model = new TestModel();

        $data['mysql'] = $model->getMysql();
        $data['postgres'] = $model->getPostgres();
        $data['sqlite'] = $model->getSqlite();

        return view('test', $data);
    }
}