@extends('layouts.admin')
@section('content')
<div><livewire:admin.crypto.index /></div>
@endsection
@push('script')
<script>
    $('div.alert').not('.alert-important').delay(4000).fadeOut(350)
    window.addEventListener('close-modal', event => {
        $('#deleteModal').modal('hide')
        $('div.alert').not('.alert-important').delay(4000).fadeOut(350)
    })
</script>
@endpush
