@include('dashboard.partials.nav')

<div class="container-fluid">
    <div class="row">

        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link @yield('dashActive')" href="/dashboard">
                            <span data-feather="home"></span>
                            Dashboard <span class="sr-only"></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('usersActive')" href="/users">
                            <span data-feather="user"></span>
                            Users
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('postsActive')" href="/posts">
                            <span data-feather="list"></span>
                            Posts
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('categoriesActive')" href="/categories">
                            <span data-feather="tag"></span>
                            Categories
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('consultationsActive')" href="/consultations">
                            <span data-feather="message-circle"></span>
                            Consultations
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

            {{--<canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>--}}
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">@yield('title')</h1>
                @yield('button')
            </div>
            @yield('content')
        </main>
    </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="/js/popper.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<!-- Icons -->
<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
<script>
    feather.replace()
</script>

<!-- Graphs -->
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>--}}
{{--<script>--}}
    {{--var ctx = document.getElementById("myChart");--}}
    {{--var myChart = new Chart(ctx, {--}}
        {{--type: 'line',--}}
        {{--data: {--}}
            {{--labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],--}}
            {{--datasets: [{--}}
                {{--data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],--}}
                {{--lineTension: 0,--}}
                {{--backgroundColor: 'transparent',--}}
                {{--borderColor: '#007bff',--}}
                {{--borderWidth: 4,--}}
                {{--pointBackgroundColor: '#007bff'--}}
            {{--}]--}}
        {{--},--}}
        {{--options: {--}}
            {{--scales: {--}}
                {{--yAxes: [{--}}
                    {{--ticks: {--}}
                        {{--beginAtZero: false--}}
                    {{--}--}}
                {{--}]--}}
            {{--},--}}
            {{--legend: {--}}
                {{--display: false,--}}
            {{--}--}}
        {{--}--}}
    {{--});--}}
{{--</script>--}}
</body>
</html>
