<nav {{$attributes}} >
  <ul class="flex space-x-4 text-slate-500">
    <li>
      <a href="/">Home</a>
    </li>
    @foreach($links as $label => $link)
      <li>→</li>
      <li>
        @if ($loop->last)
          <p class="font-bold">{{$label}}</p>
        @else
          <a href="{{$link}}">
            {{$label}}
          </a>
        @endif
      </li>
    @endforeach
  </ul>
</nav>
