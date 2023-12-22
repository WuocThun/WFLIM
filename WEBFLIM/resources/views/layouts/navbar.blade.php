    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{route('home')}}">Dashboard</a>
            <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navBarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item ">
                        <a href="{{route('category.create')}}" class="nav-link">Danh mục phim</a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{route('genre.create')}}" class="nav-link">Thể loại</a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{route('country.create')}}" class="nav-link">Quốc gia</a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{route('movie.create')}}" class="nav-link">Phim</a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{route('episode.create')}}" class="nav-link">Tập phim</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input type="search" class="form-control mr-sm-2" placeholder="..." aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm phim</button>
                </form>
            </div>
        </nav>
    </div>