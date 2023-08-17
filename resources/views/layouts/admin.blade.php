<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                MFJ Laravel
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                    <li>
                        <a class="nav-link fw-bold" href="{{ route('index_qna') }}">Q&A</a>
                    </li>
                    <li>
                        <a class="nav-link fw-bold" href="{{ route('about') }}">About</a>
                    </li>
                    <li>
                        <a class="nav-link fw-bold" href="{{ route('contact.create') }}" >Contact Us</a>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Admin Tools
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
 
                            <a class="dropdown-item" href="{{ route('articles.create') }}">
                                New Article
                            </a>
                            <a class="dropdown-item" href="{{ route('categories.create') }}">
                                New Category
                            </a>
                            <a class="dropdown-item" href="{{ route('questions.create') }}">
                                New Question
                            </a>
                            <a class="dropdown-item" href="" >
                                Promote User
                            </a>
                            <a class="dropdown-item" href="{{route('contact.index')}}" >
                                Contact Messages
                            </a>
                        </div>
                    </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('profile', Auth::user()->id) }}">
                                    My profile
                                </a>

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                </ul>
            </div>
        </div>
    </nav>