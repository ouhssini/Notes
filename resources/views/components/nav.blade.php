<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="/">Notes management</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto">
                <a class="nav-link active" aria-current="page" href="{{ route('homepage') }}">Home</a>
                @auth
                    <a class="nav-link" href="{{ route('note.index') }}">Notes</a>
                    <a class="nav-link" href="{{ route('note.deleted') }}">Deleted Notes</a>
                    <a href="{{ route('logout') }}" class="nav-link">Logout</a>
                @else
                    <a href="{{ route('loginForm') }}" class="nav-link">login</a>
                    <a href="{{ route('signupForm') }}" class="nav-link">Register</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
