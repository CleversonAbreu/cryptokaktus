@if ($message = Session::get('success'))
<div class="alert alert-success alert-block" >
	<i class="typcn typcn-input-checked" style="font-size: 18PX;"></i>
	 <strong>{{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
	<i class="typcn typcn-delete-outline" style="font-size: 18PX;"></i>
	<strong>{{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-block">
	<i class="typcn typcn-info-outline" style="font-size: 18PX;"></i>
	<strong>{{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('info'))
<div class="alert alert-info alert-block">
	<strong>{{ $message }}</strong>
</div>
@endif


@if ($errors->any())
<div class="alert alert-danger">
	Please check the form below for errors
</div>
@endif
