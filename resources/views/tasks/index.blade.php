<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <ul>
    @foreach ($tasks as $task)
        <li> 
        	<a href="/tasks/{{ $task->id}}">
        		 {{ $task-> body}}</li> <!--task is a collection of object-->
        	</a>
    @endforeach
    </ul>
</body>
</html>
