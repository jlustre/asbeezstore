@if (session('successMsg'))
	<div class="alert alert-success alert-dismissible fade show" role="alert">
	  <strong>Success!</strong> {{ session('successMsg') }}
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    <span aria-hidden="true">&times;</span>
	  </button>
	</div>
@elseif (session('errorMsg'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong> {{ session('errorMsg') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@else

@endif

