<!DOCTYPE html>
<html lang="zh-CN">
	@include('layouts.head')
  <body>
	@include('layouts.nav')
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
			@include('layouts.menu')
        </div>
        <div id="app" class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			@yield('content')
        </div>
      </div>
    </div>
	@include('layouts.foot')
  </body>
</html>