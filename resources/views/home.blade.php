@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <form action="{{route('process-post')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
					    <textarea name ="body" id="body" class="form control" rows="3" placeholder="hows your day"></textarea>
				    </div>             
                   <div class="form-group">
               	    	<button type="submit" class="btn btn-primary btn sm" > Post</button>
                   </div>
						 
                </form>
                <div class="panel-heading">My Wall</div>
                @if(empty($posts))

                    <div class="panel-body">
                        <div class="text-center">
                              No Posts Yet
                              </div>
                     </div>
                @else
                  <div class="panel-body">
                    <div class="list-group">
                        @foreach($posts as $post)
                         <div class="Post-group">
                        <div class="post-item">
                             {{$post->body}}
                            <span class="pull-right">{{$post->created_at}} </span>
                        </div>
                        <div>
                            <form action="{{route('process-comment',['post_id' => $post->id])}}" method="post">
                                {{csrf_field()}}
                                 <div class="form-group">
                                    <textarea name ="comment" id="comment" class="form control" rows="2" placeholder="Say something!"></textarea>
                                </div> 
                                <div class="form-group">
               	    	            <button type="submit" class="btn btn-primary btn sm" > Post</button>
                               </div>
                            </form>
                        </div>
                         @if(!empty($post->comments))
                        <ul>
                           @foreach($post->comments as $comment)
                            <li>{{$comment->body}}</li>
                            @endforeach
                        </ul> 
                        @endif 
                      </div>
                      @endforeach
                    </div>                  
                @endif  
               
            </div>
        </div>
    </div>
</div>
@endsection
