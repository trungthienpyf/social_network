@if ($errors->any())
    <div class="row">
        <div class="col-md-6">

            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>

        </div>
    </div>
@endif

@if(session()->has('message'))
    <div class="row">
        <div class="col-md-6">

            <div class="success alert alert-success">
                {{session()->get('message')}}

            </div>

        </div>
    </div>
@endif
