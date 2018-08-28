<!-- app/views/passports/index.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Look! I'm CRUDding</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('passports') }}">Passport Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('passports') }}">View All passports</a></li>
        <li><a href="{{ URL::to('passports/create') }}">Create a Passport</a>
    </ul>
</nav>

<h1>All the passports</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th> 
            <th>Mobile No.</th>
            <th>D.O.B</th>
            <th><center>Actions</center></th>

        </tr>
    </thead>
    <tbody>
    <?php $i=0; ?>
    @foreach($passports as $key => $value)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->email }}</td>
            <td>{{ $value->number }}</td>
            <td>{{ $value->date }}</td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- delete the passport (uses the destroy method DESTROY /passports/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->
                {{ Form::open(array('url' => 'passports/' . $value->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}

                <!-- show the passport (uses the show method found at GET /passports/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('passports/' . $value->id) }}">Show</a>

                <!-- edit this passport (uses the edit method found at GET /passports/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('passports/' . $value->id . '/edit') }}">Edit</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
</body>
</html>