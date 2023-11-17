<header>
		<nav class="navbar navbar-expand-lg bg-body-tertiary">
			<div class="container">
				<a class="navbar-brand" href="#">Course</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="#">О нас</a>
						</li>
                        @guest

                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{route('signup')}}">Регистрация</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{route('signin')}}">Вход</a>
                            </li>

                            @else

                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{route('signout')}}">Выход</a>
                            </li>

                        @endguest
						<li class="nav-item">
							<a class="nav-link" href="#">Курсы</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Записаться</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
