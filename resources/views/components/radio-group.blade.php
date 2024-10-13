<div>
  @if($allOption)
    <label for="{{$name}}" class="mb-1 flex items-center">
      <input type="radio" name="{{$name}}" value="" @checked(!request($name)) />
      <span class="ml-2">All</span>
    </label>
  @endif

  @foreach($optionsWithLabels as $label => $option)
    <label for="{{$name}}" class="mb-1 flex items-center">
      <input type="radio" name="{{$name}}" value="{{$option}}" @checked(($value ?? request($name)) === $option) />
      <span class="ml-2">{{$label}}</span>
    </label>
  @endforeach
    @error($name)
    <div class="mt-1 text-red-500">
      {{$message}}
    </div>
    @enderror
</div>
