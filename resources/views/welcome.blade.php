@extends('app')

@section('content')
<div class="container">
    <div class="row" id="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Home</div>
                
                    @if(Auth::guest())
                        <input type='hidden' value='1' name='guest'>
                    @else
                       
                    @endif
                    @foreach ($links as $link)
                    <div class="item" data-postid="{{$link->id}}" data-score="{{$link->vote}}">

                            <div class="vote-span"><!-- voting-->

                                <div class="vote" data-action="up" title="Vote up" id="voteup{{$link->id}}">
                                    <i class="icon-arrow-up"></i>
                                </div><!--vote up-->

                                <div class='vote-score'>{{$link->vote}}</div>

                                <div class="vote" data-action="down" title="Vote down" id="votedown{{$link->id}}">
                                    <i class="icon-arrow-down"></i>
                                </div><!--vote down-->
                            </div>

                            <div class="post"><!-- post data -->
                                {{ $link->title }}<br/>
                            <a href={{$link->url}} target="_blank">{{$link->url}}</a> <br/>
                            <a href="comment/{{$link->id}}">{{$link->comment}} &nbsp;comments</a>
                           <p align='right' style='font-size:10px;color: #ff0000;'> <b> </b></p>
                            </div>
                    </div>

                    <div id="info{{$link->id}}">

                    </div>
                    @endforeach
                    <div align='center'><?php echo $links->render(); ?></div>



                    <!--  for register and login panel-->
                        <div id="modal" class="modal fade">
 
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                aria-hidden="true">×</span></button>
                                    <h4 class="modal-title">Please Sign in to vote!</h4>
                                </div>
                                <div class="modal-body">
                                   

                                    <!-- Signin Panel-->
                                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                            <div class="form-group">
                                                <label class="col-md-4 control-label">E-Mail </label>
                                                <div class="col-md-6">
                                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Password</label>
                                                <div class="col-md-6">
                                                    <input type="password" class="form-control" name="password">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-md-6 col-md-offset-4">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="remember"> Remember Me
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-md-6 col-md-offset-4">
                                                    <button type="submit" class="btn">Login</button>

                                                    <a class="btn btn-link" href="{{ url('/password/email') }}">Forgot Your Password?</a>
                                                </div>
                                            </div>
                                        </form>
                                        <hr/>
                                        <h4 class="modal-title">If you don't have an account, Please register</h4><br/>


                                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Name</label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-4 control-label">E-Mail </label>
                                                <div class="col-md-6">
                                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Password</label>
                                                <div class="col-md-6">
                                                    <input type="password" class="form-control" name="password">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Confirm Password</label>
                                                <div class="col-md-6">
                                                    <input type="password" class="form-control" name="password_confirmation">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-md-6 col-md-offset-4">
                                                    <button type="submit" class="btn">
                                                        Register
                                                    </button>
                                                </div>
                                            </div>
                                        </form>

                                   
                                        

                                    
                    <!-- end of register and login panel--> 

                   <!--  <ul>
                    @foreach ($links as $link)
                        <li>{{ $link->title }}<br/>
                            <a href={{$link->url}}>{{$link->url}}</a> <br/>
                            <a href="comment/{{$link->id}}">Comment</a>

                        </li>
                     @endforeach
                    </ul> -->


                </div>
        </div>
    </div>
</div>



</div></div></div></div>
@endsection

