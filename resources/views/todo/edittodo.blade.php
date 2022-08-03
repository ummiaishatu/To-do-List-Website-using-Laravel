<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Todo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body style="text-align:center">
    <section class="container m-5">
        <h3>
            <x-alert />
        </h3>
        <form action="/update" method="post">
            <div class="col-12">
                <h2>Edit Todo</h2>
                @csrf
                @method('patch')
                <input type="text" class="form-control" name="todoname"  value="{{$todo->todoname}}">
                <input type="number" style="display:none;" class="form-control" name="id"  value="{{$todo->id}}">
                <label for="select">Select Group</label>
                <select name="group_id" id="select" class="form-select mt-5">
                    @foreach($grouptodos as $grouptodo)
                        <option value="{{ $grouptodo->id }}" {{($grouptodo->id == $todo->group_id) ? 'selected' : '' }} > 
                            {{$grouptodo->groupname}}
                        </option>
                    @endforeach    
                </select>
            </div>
            <div class="col-12 m-2">
                <button type="submit" class="btn btn-success btn-lg" value="Edit">Edit</button>
                <a class="btn btn-dark btn-lg" href="/todo" role="button">Back</a>
            </div>
        </form>
    </section>
    @extends('layouts.footer')