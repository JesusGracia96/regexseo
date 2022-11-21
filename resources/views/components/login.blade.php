<div id="login-form" class="">
    <form action="{{ route('login') }}" method="POST"
        class="text-center d-flex flex-column justify-content-center align-items-center">
        @csrf
        <div class="form-group">
            <label for="email">EMAIL</label>
            <input class="form-control" type="text" placeholder="YOUR EMAIL" name="email" value="{{ old('email') }}">
        </div>
        <div class="form-group">
            <label for="password">PASSWORD</label>
            <input class="form-control" type="password" placeholder="*******" name="password">
        </div>
        <button type="submit" class="btn btn-submit">SIGN IN</button>
    </form>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
