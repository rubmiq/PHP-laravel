<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Ruben Mikayelyan">

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/add/js/jquery-ui.js"></script>
    <link href="assets/add/css/jquery-ui.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

</head>

<body>
    <div class="container">
        <div class="col-md-12 main">
            <h3>TODO</h3>
            <div class="col-md-12 p-0 m-b-10">
                <form action="/add_row" method="post">
                    @csrf
                    <div class="col-md-4">
                        <input class="form-control" name="name" placeholder="Name">
                    </div>
                    <div class="col-md-6">
                        <input name="description" class="form-control" placeholder="Description">
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary">Add Row</button>
                    </div>
                </form>
            </div>
            <div class="col-md-12">
                @if(count($table)>0)
                <table class="table table-bordered">
                    <thead>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Tools</th>
                    </thead>
                    <tbody>
                        @foreach($table as $row)
                        <tr>
                            <td>{{$row['id']}}</td>
                            <td>{{$row['name']}}</td>
                            <td>{{$row['description']}}</td>
                            <th>
                                <button class="btn btn-primary" onclick="edit_row('<?php echo $row['id'] ?>')"><i class="fa fa-pencil"></i></button>
                                <a href="/delete_mirror/{{$row['id']}}">
                                    <button class="btn btn-danger">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </a>
                            </th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>
        </div>
        <div class="col-md-12 main">
            <h3>TODO Mirror</h3>
            <div class="col-md-12 p-0">
                <form action="/add_row" method="post">
                    @csrf
                    <div class="col-md-4">
                        <input class="form-control" name="name" placeholder="Name">
                    </div>
                    <div class="col-md-6">
                        <input name="description" class="form-control" placeholder="Description">
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary">Add Row</button>
                    </div>
                </form>
            </div>
            <div class="col-md-12 m-t-10">
                @if(count($mirror)>0)
                <table class="table table-bordered">
                    <thead>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Tools</th>
                    </thead>
                    <tbody>
                        @foreach($mirror as $row)
                        <tr>
                            <td>{{$row['id']}}</td>
                            <td>{{$row['name']}}</td>
                            <td>{{$row['description']}}</td>
                            <th>
                                <button class="btn btn-primary" onclick="edit_row('<?php echo $row['id'] ?>')"><i class="fa fa-pencil"></i></button>
                                <a href="/delete_mirror/{{$row['id']}}">
                                    <button class="btn btn-danger">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </a>
                            </th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>
        </div>
    </div>

    <!--modals-->
    <div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-hidden="true">

    </div>

    <script>
        function edit_row(id) {
            $('#edit_modal').load('/edit/' + id);
            $('#edit_modal').modal('show');
        }
    </script>

</body>

</html>