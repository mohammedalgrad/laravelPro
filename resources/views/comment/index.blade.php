@extends('comment.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel Pro : Comments</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('dashboard') }}"> DashBoard</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>Id</th>
            <th>Post Id</th>
            <th>Comment</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($comments as $comment)
        <tr>
            <td>{{ $comment->id }}</td>            
            <td>{{ $comment->post_id }}</td>
            <td>{{ $comment->comment }}</td>
            <td>
                <form action="{{ route('comments.destroy',$comment->id) }}" method="POST">
                     
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $comments->links() !!}
      
@endsection