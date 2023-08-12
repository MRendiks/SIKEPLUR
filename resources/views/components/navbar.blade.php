<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
    <div class="container">
        <a class="navbar-brand" href="/">SISTEM KEPEGAWAIAN KELURAHAN PIYAMAN</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
</button>
</li>
            </ul>
            @guest
                <div class="d-flex align-items-center">
                    <a href="/login" class="me-4 text-decoration-none">Login</a>
                    <a href="/register">
                        <button class="btn btn-outline-primary">Register</button>
                    </a>
                </div>
            @endguest
            @auth
            <form action="/logout" method="POST">
                    @csrf
                    <button class="btn btn-danger" type="submit">Logout</button>
            </form>
            @endauth
        </div>
    </div>
</nav>