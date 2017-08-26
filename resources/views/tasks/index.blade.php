<!DOCTYPE html>
<html>
  <head>
    <title>Greeting</title>
  </head>
  <body>
    <ul>
      @foreach ($tasks as $task)
        <li>
          <a href="../public/tasks/{{ $task->id }}">
            {{ $task->body }}
          </a>
        </li>
      @endforeach
    </ul>
  </body>
</html>
