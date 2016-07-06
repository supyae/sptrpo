@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Comments</div>
                	<div class="panel-body">
                     <form class="form-horizontal" role="form" method="POST" action="{{ url('post_comment') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label class="col-md-4 control-label">Your Comment</label>
                            <div class="col-md-6">
                                <textarea rows=5 cols=50 name='message'></textarea>
                               
                            </div>
                        </div>                      

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-info">
                                    Post
                                </button>
                            </div>
                        </div>
                        <hr>
                        <div class="post">
                        @if($comments != '')
                        
                            <ul>
                              @foreach($comments as $comment)
                               <li>
                                 <p align='left' style='color:#207FBA;font-size:9px;font-weight:bold'> {{$comment->name}}</p>
                                {{ $comment->message }}
                               </li>
                                
                            @endforeach
                        </ul>
                        @else
                            <h4>There is no comment here.</h4>
                           
                        @endif
                         <input type="hidden" class="form-control" name="linkid" value="{{$linkid}}"> 


                         </div>
                       




                 </form>
                

                </div>

                </div>
        </div>
    </div>
</div>
@endsection
