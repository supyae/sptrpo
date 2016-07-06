@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Comments</div>
                	<div class="panel-body">
                    
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        
                       
                        <div class="post">
                         @if($comments != '')
                        
                            <ul>
                              @foreach($comments as $comment)
                               <li> 
                                <p align='left' style='color:#207FBA;font-size:9px;font-weight:bold'> {{$comment->name}}</p>
                                {{ $comment->message }}</li>
                                
                            @endforeach
                          </ul>
                        @else
                            <h4>There is no comment here.</h4>
                           
                        @endif
                            <input type="hidden" class="form-control" name="linkid" value="{{$linkid}}">
                         </div>
                       
                       <!--  <button class='btn btn-info'>Comment</button></a> -->
                       
                    <a href="{{ url() }}/guest_comment/{{$linkid}}"><button class='btn btn-info'>Post Comment</button></a>
                
                

                </div>

                </div>
        </div>
    </div>
</div>
@endsection
