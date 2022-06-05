<div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px; height: 100vh; position: fixed; top: 0; left: 0;">
    <a href="{{ route('dashboard') }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
        <img class="bi me-2" width="32" height="32" src="{{ asset('favicon-32x32.png') }}" alt="Logo of a dog emoji" />
        <h4 class="mb-0">Hyde Buddy</h4>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        @foreach ($items as $item)
        @if($active === $item->route)
            <li class="nav-item">
                <a href="{{ route($item->route) }}" class="nav-link active d-flex align-items-center" aria-current="page">
                    {!! $item->icon !!}
                    <span class="ms-1" style="line-height: 24px;">{{ $item->label }}</span>
                </a>
            </li>
            @else
            <li>
                <a href="{{ route($item->route) }}" class="nav-link link-dark d-flex align-items-center">
                    {!! $item->icon !!}
                    <span class="ms-1" style="line-height: 24px;">{{ $item->label }}</span>
                </a>
            </li>
            @endif
        @endforeach
    </ul>
    <hr>
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
            <strong>Project: {{ (basename(Buddy::hyde()->getPath())) }}</strong>
        </a>
        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
            <li><a class="dropdown-item" href="#">New project...</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="https://hydephp.github.io/docs" target="_blank">Hyde Documentation</a></li>
        </ul>
    </div>
</div>