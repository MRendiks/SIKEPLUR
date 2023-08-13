@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        @if(session('failed'))
            <div class="alert alert-danger" id="errorAlert">
                {{ session('failed') }}
            </div>
            <script>
                $(document).ready(function() {
                    setTimeout(function() {
                        $('#errorAlert').fadeOut('slow');
                    }, 1000); 
                });
            </script>
        @endif

    </div>
@endsection