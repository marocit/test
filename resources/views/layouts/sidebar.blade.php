{{-- <categories></categories> --}}

<div class="panel panel-default">
        <div class="panel-heading">Example Component</div>

        <div class="panel-body">
             <ul class="list-group">
             @foreach($categories as $category)
              <li class="">
                <span class="badge">{{$category->links()->count()}}</span>
                <a href="{{route('category', $category->id)}}">{{$category->name}}</a>                
              </li>
              @endforeach
              </ul>
        </div>
       
        
    </div>