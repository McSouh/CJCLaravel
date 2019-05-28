<div class="d-flex">
    <div class="page-navigation">
        <ul class="mx-auto d-flex list-unstyled">
            <li class="mx-md-4 h4"><a class="text-dark text-decoration-none text-uppercase {{ request()->is('*cercle*') ? 'active' : '' }}" href="/cercle">à propos</a></li>
            <li class="mx-md-4 h4"><a class="text-dark text-decoration-none text-uppercase {{ request()->is('*comite*') ? 'active' : '' }}" href="/comites">comités</span></a></li>
            <li class="mx-md-4 h4"><a class="text-dark text-decoration-none text-uppercase {{ request()->is('*statuts*') ? 'active' : '' }}" href="/statuts">statuts</span></a></li>
            <li class="mx-md-4 h4"><a class="text-dark text-decoration-none text-uppercase {{ request()->is('*pv*') ? 'active' : '' }}" href="/pv">pv</span></a></li>
        </ul> <!-- end home-sidelinks -->
    </div>
</div>
<div class="mt-5 pt-5" style="height: 50px;"></div>