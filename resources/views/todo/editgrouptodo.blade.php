@extends('layouts.editgrouptodoheader')
<body style="text-align:center">

    <section class="container m-5">
        <h3>
            <x-alert />
        </h3>
        <form action="/update" method="post">
            <div class="col-12">
                <h2>Edit GroupName</h2>
                @csrf
                @method('patch')
                <input type="text" class="form-control" name="groupname"  value="{{$grouptodo->groupname}}">
                <input type="number" style="display:none;" class="form-control" name="id"  value="{{$grouptodo->id}}">
            </div>
            <div class="col-12 m-2">
                <button type="submit" class="btn btn-success btn-lg" value="Editgroup">Edit</button>
                <a class="btn btn-dark btn-lg" href="/grouptodo" role="button">Back</a>
            </div>
        </form>
    </section>
    @extends('layouts.footer')