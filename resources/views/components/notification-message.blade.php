@if (session()->has('alert-success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{session('alert-success')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @elseif(session()->has('alert-danger'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{session('alert-danger')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif