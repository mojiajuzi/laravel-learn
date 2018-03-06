<!DOCTYPE html>
<html lang="zh-CN">
	@include('layouts.head')
  <body>
  @auth
    @include('layouts.nav')
  @endauth  
    <div class="container-fluid">
      <div class="row">
        @auth
          <div class="col-sm-3 col-md-2 sidebar">
                  @include('layouts.menu')
          </div>
        @endauth
        <div id="app" class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" style="border:1px solid #e9e9e9;">
		  	@yield('content')
        </div>
      </div>
    </div>
	@include('layouts.foot')
  <script>
  @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
        
        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
  @endif
</script>
  @yield('page_script')
  </body>
</html>