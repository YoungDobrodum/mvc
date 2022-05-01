<?php

namespace Controllers;

use Core\View;
use Models\NoteModel;

class Note extends AbstractController
{

    protected $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new NoteModel();
    }

    public function index()
    {

        $this->view->render('note_index_page',
            ['notes' => $this->model->all(),
            ]);
    }

    public function create()
    {
        $this->view->render('note_create_page', ['errors' => \Route::getErrors()]);
    }

    public function store()
    {
        $noteText = filter_input(INPUT_POST, 'note');
        $errors = [];
        if(empty($noteText)){
            $errors[] = 'Note can not be empty';
            \Route::addErrors($errors);
            \Route::redirect($_SERVER['HTTP_REFERER']);
        }
        $this->model->add($noteText);
        \Route::redirect(\Route::url('note'));
    }

    public function edit()
    {
        $index = filter_input(INPUT_POST, 'index');
        $note = filter_input(INPUT_POST, 'note');
        $this->view->render('note_edit_page', ['note' => $note, 'index' => $index]);
    }

    public function update()
    {
        $index = filter_input(INPUT_POST, 'indexNote');
        $note = filter_input(INPUT_POST, 'editNote');
        $this->model->edit($index, $note);
        \Route::redirect(\Route::url('note'));
    }

    public function destroy()
    {
        $index = filter_input(INPUT_POST, 'index');
        $this->model->delete($index);
        \Route::redirect(\Route::url('note'));
    }
}