@if(isset($actions))
  @foreach($actions as $action)

    @php
      $route = (isset($action['route']) ? route($action['route']) :'#');
    @endphp
    <a href="{{ $route ?? '#' }}" class="btn btn-icon btn-sm btn-outline-{{$action['color'] ?? 'primary'}}" >
      <span class="btn-inner--icon"><i class="fa {{ $action['icon'] ?? 'fa-info' }}"></i></span>
      <span class="btn-inner--text">{{ $action['title'] ?? 'Error' }}</span>
    </a>
  @endforeach
@else
  @php
    $valid_route = (isset($route) ? route($route) :'#');
  @endphp
  <a href="{{ $valid_route }}" class="btn btn-icon btn-sm btn-outline-primary" >
    <span class="btn-inner--icon"><i class="fa fa-plus"></i></span>
    <span class="btn-inner--text">{{ $title ?? 'Error' }}</span>
  </a>
@endif
