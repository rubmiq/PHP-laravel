<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use App\Todo_mirror;

class Todo_Controller extends Controller
{
    public function index()
    {
        $todo = new Todo();
        $mirror = new Todo_mirror();

        $table = $todo->get()->toArray();
        $mirrored_table = $mirror->get()->toArray();

        $data = ['table' => $table, 'mirror' => $mirrored_table];
        return view('welcome', $data);
    }

    public function add(Request $request)
    {
        $todo = new Todo();
        $todo->description = $request->input('description');
        $todo->name = $request->input('name');
        $todo->save();

        //Mirroring

        $todo = new Todo_mirror();
        $todo->description = $request->input('description');
        $todo->name = $request->input('name');
        $todo->save();
        return redirect('/');
    }

    public function delete_row($id)
    {
        $todo = new Todo();
        $todo->where('id', $id)->delete();
        //Mirroring
        $todo = new Todo_mirror();
        $todo->where('id', $id)->delete();
        return redirect('/');
    }

    public function edit($id)
    {
        $todo = new Todo();
        $row = $todo->where('id', $id)->get()->toArray();
        $data = ['row' => $row];
        return view('edit', $data);
    }

    public function update(Request $request)
    {

        $todo = new Todo();
        $id = $request->input('id');
        $description = $request->input('description');
        $name = $request->input('name');
        $todo->where('id', $id)->update(array('name' => $name, 'description' => $description));

        //Mirroring
        $todo = new Todo_mirror();
        $todo->where('id', $id)->update(array('name' => $name, 'description' => $description));
        return redirect('/');
    }
}
