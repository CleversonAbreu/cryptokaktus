@extends('layouts.admin')
@section('content')
  <div><livewire:admin.dashboard.index /></div>
@endsection
@push('script')
    <script>
        $('div.alert').not('.alert-important').delay(4000).fadeOut(350)
    </script>
@endpush
