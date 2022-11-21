<div id="register-form" class="d-none">
    <form action="{{ route('register') }}" method="POST"
        class="text-center d-flex flex-column justify-content-center align-items-center">
        @csrf
        <div class="form-group">
            <label for="email">EMAIL</label>
            <input class="form-control" type="text" placeholder="YOUR EMAIL" name="reg-email" value="{{ old('reg-email') }}">
        </div>
        <div class="form-group">
            <label for="password">PASSWORD</label>
            <input class="form-control" type="password" placeholder="*******" name="password">
        </div>
        <div class="form-group">
            <label for="repeat-password">REPEAT PASSWORD</label>
            <input class="form-control" type="password" placeholder="*******" name="password_confirmation">
        </div>
        <div class="form-group w-100 d-flex flex-row justify-content-left align-items-center">
            <input type="checkbox" name="isAdmin" id="isAdmin" class="checkbox-input">
            <label for="isAdmin" class="pt-1 ml-1">IS ADMIN</label>
        </div>
        <button type="submit" class="btn btn-submit">SIGN UP</button>
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
