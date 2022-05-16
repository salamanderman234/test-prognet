@extends('dashboard.user.template')

@section('content')
    <div class="container p-5">
        <div class="row">
            <div class="col-12">
                <h3>Notifications</h3>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @forelse ($unreads as $notification)
                    <div class="p-3 container bg-{{ $notification->data['type']=='review' ? 'success' : 'warning' }} rounded mt-3">
                        <a href="{{ $notification->data['link'] != null ? $notification->data['link'] : ''  }}">
                            {{ $notification->data["message"] }}
                        </a>
                    </div>    
                @empty
                    <div class="container rounded mt-3 d-flex justify-content-center">
                        <span>Tidak ada notifikasi</span>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $('.notification-icon').click(function(){
                request = $.ajax({
                    url: "{{ route('user.notification.read') }}",
                    type: "post"
                });
            });
        });
    </script>
@endsection