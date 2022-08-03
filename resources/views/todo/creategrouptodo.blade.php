@extends('layouts.headercreategroup')
<body style="text-align:center">
    <div class="container">
        <section class="container m-5">
            <h3>
                <x-alert/>
            </h3>
            <form action="/store" method="post">
                <div class="col-12">
                    @csrf
                    <input type="text" class="form-control" name="groupname" placeholder="Create Group todoname">
                </div>
                <div class="col-12 m-2">
                    <button type="submit" class="btn btn-success btn-lg" value="Creategroup">Create Group</button>
                    <a class="btn btn-dark btn-lg" href="/grouptodo" role="button">Back</a>
                </div>
            </form>
        </section>
        @extends('layouts.footer')