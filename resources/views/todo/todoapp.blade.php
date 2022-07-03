<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<div class="">
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand">Todo List</a>
                <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-light mx-2" type="submit">Search</button>
            </form>
        </div>
    </nav>
</div>
<body>
    <div class="container">
        <div style="margin-left: 80%; margin-top: 50px;">
            <a class="btn btn-success btn-lg" href="/create" role="button" >Add Task</a>
        </div>
        <h3>
            <x-alert/>
        </h3>
        <h1>ToDo List</h1>
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Update At</th>
                    <th scope="col">Actions</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($todos as $todo)
                    <tr>
                        @if($todo->completed)
                            <span><td style="text-decoration:line-through">{{$todo->todoname}}</td></span>
                        @else
                            <td>{{$todo->todoname}}</td>  
                        @endif     
                        <td>{{$todo->created_at}}</td>
                        <td>{{$todo->updated_at}}</td>
                        <td><a class="btn btn-primary" href="{{asset('/'.$todo->id.'/edit')}}" role="button" >Edit</a></td>
                        <td><a class="btn btn-danger" href="{{asset('/'.$todo->id.'/delete')}}" role="button" >Delete</a></td>
                        @if($todo->completed)
                            <td><a class="btn btn-info" href="{{asset('/'.$todo->id.'/completed')}}" role="button" >Completed</a></td>
                        @else
                            <td><a class="btn btn-success" href="{{asset('/'.$todo->id.'/completed')}}" role="button" >Complete</a></td>
                        @endif 
                    </tr>
                @endforeach
            </tbody> 
        </table>   
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>