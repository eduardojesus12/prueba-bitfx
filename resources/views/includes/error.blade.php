@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show font-weight-boldest" role="alert">
        {{ session('error')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif