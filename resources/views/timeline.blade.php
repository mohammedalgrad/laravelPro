<!DOCTYPE html>
<html>
<head>
    <title>LaravelPro-TimeLine</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
</head>
<body>
  
<div class="container" style="margin-top: 15px;">
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>LaravelPro : TimeLine</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('posts.create') }}"> Create New Post</a>
                <a class="btn btn-success" href="{{ route('dashboard') }}">Dashboard</a>
            </div>
        </div>
    </div>
    <div  style="color:blue" >
        {{ 'Name: ' . auth()->user()->name. '- Gender :' . auth()->user()->gender}}   
     </div>   
        @foreach ($posts as $post)

          @if  ( $post->gender == auth()->user()->gender ) 

            <div style="border:1px solid #ddd ;background:#eee">Post Id : {{ $post->id }}</div>
            
            <div  style="border:1px solid #ddd ;background:#ccc">Post Title : {{ $post->title }}</div>
           
            <div style="border:1px solid #ddd ;background:#eee">The Post</div>
            <div>{{ $post->body }}</div>
            <hr>
            <div> 

            @foreach ($comments as $comm) 
              @if  ($comm->post_id == $post->id )           
              <div style="padding:5px ;margin-bottom:5px;border:1px solid #ddd ;background:#aff">{{ $comm->comment }}</div> 
              @endif 
            @endforeach

                 <form action="{{ route('comments.store') }}" method="POST"> 

                    <textarea name="comment" rows="3" cols="50"></textarea> <br>          
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <input class="btn btn-primary" type="submit" value="Add Comment">
   
                    @csrf
                   
                </form>
            </div>
            <hr>

         @endif 
        @endforeach
       
</div>
   
</body>
</html>