
@if( session('error-message') )
    <div class="row">
        <div class="col-12">
            <div class="mb-3">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fa fa-info-circle" aria-hidden="true"></i> {{session('error-message')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
    </div>
@endif
@if( session('success-message') )
    <div class="row">
        <div class="col-12">
            <div class="mb-3">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fa fa-info-circle" aria-hidden="true"></i> {{session('success-message')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
    </div>
@endif