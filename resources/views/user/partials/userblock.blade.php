<div class="media">
    <a href="" class="pull-left">
        <img src="" alt="" class="media-object">
    </a>
    <div class="media-body">
        <h4 class="media-heading">
            <a href="">{{ $user->name }}</a>
        </h4>
        @if ($user->location)
            <p>{{ $user->location }}</p>
        @endif
    </div>
</div>