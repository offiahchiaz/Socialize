<div class="media pb-4">
    <a href="/user/{{ $user->name }}" class="pull-left">
        <img src="{{ $user->getAvartarUrl() }}" alt="" class="media-object">
    </a>
    
    <div class="media-body">
        <h4 class="media-heading">
            <a href="/user/{{ $user->name }}">{{ $user->name }}</a>
        </h4>
        @if ($user->location)
            <p>{{ $user->location }}</p>
        @endif
    </div>
</div>