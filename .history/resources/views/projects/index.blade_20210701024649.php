<!DOCTYPE html>

<html>

<head>
  <title></title>

</head>

<body>

  <h1>Birdboard</h1>

  <ul>

      @forelse ($projects as $project)

          <li>
          
              <a href="{{ $project->path() }}">{{ $project->title }} </a>
              
          </li>
        
      @empty

          <l1>No projects yet</l1>

      @endforelse

  </ul>
  
</body>

</html>