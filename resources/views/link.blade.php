@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">UPLOAD A LINK</div>
                	<div class="panel-body">

            	 <form class="form-horizontal" role="form" method="POST" action="{{ url('linkreg') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Link Title</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="title" value="">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Link URL</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="url" value="">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Upload
								</button>
							</div>
						</div>

				</form>

			</div>


                </div>
        </div>
    </div>
</div>
@endsection