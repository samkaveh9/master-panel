<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

               @if($errors->any())
                 <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                        </ul>
                 </div>
               @endif

                <div class="card-body">
                    <form action="{{ route('home.store') }}" method="post">
                        @csrf
                        <input type="text" name="title" placeholder="title" class="form-control">
                        <input type="text" name="status" value="inactive" class="form-control" disabled>
                        <input type="file" name="banner"  class="form-control">
                        <button class="btn" type="submit">submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
