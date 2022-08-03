@extends('layouts.createtodoheader')
<body style="text-align:center">
    <section class="container m-5">
        <h3>
            <x-alert />
        </h3>
        <form action="/store" method="post">
            <div class="col-12">
                @csrf
                <input type="text" class="form-control" name="todoname" placeholder="ADD Task">
                <label for="select">Select Group</label>
                <select name="group_id" id="select" class="form-select mt-5">
                    <option value="">Groups</option>
                    @foreach($grouptodos as $grouptodo)            
                        <option value="{{ $grouptodo->id }}" {{($grouptodo->id == old('group_id')) ? 'selected' : '' }} > 
                            {{$grouptodo->groupname}}
                        </option>
                    @endforeach    
                </select>
            </div>
            <div class="col-12 m-2">
                <button type="submit" class="btn btn-success btn-lg" value="Create">Create</button>
                <a class="btn btn-dark btn-lg" href="/todo" role="button">Back</a>
            </div>
        </form>
    </section>
    @extends('layouts.footer')