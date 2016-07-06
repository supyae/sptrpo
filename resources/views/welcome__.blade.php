@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Home</div>

                   

                    <ul>
                    @foreach ($links as $link)
                        <li>{{ $link->title }}<br/>
                            <a href={{$link->url}}>{{$link->url}}</a> <br/>
                            <a href="comment/{{$link->id}}">Comment</a>

                                

                            
                        </li>
                     @endforeach
                    </ul>


                </div>
        </div>
    </div>
</div>
@endsection

