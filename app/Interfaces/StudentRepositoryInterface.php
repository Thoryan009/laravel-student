<?php
namespace App\Interfaces;

interface StudentRepositoryInterface 
{
    // public function all();
    public function create($request);
    public function showAll();
    public function show($student);
    public function update($id, $request);
    public function delete($id);
}
