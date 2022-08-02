<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Todo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
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
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> 
</body>
</html>