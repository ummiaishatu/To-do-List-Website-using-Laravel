@extends('layouts.edittodoheader')
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