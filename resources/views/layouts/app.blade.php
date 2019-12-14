      {{-- navbar &sidebar --}}
      @include('layouts.navbar')
      	@if(!empty ($sidebar))
      		@include($sidebar)
      	@endif

      <!-- Main Content -->
      @if(!empty($page))
      	@include($page)
      @endif

      {{-- footer --}}
      @include('layouts.footer')