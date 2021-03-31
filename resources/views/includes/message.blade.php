@if(session('message'))
    <div class="alert alert-success alert-dismissible fade show font-weight-boldest" role="alert">
        {{ session('message')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif