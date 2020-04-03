<footer class="main-footer">
    @php
        $data = App\Setting::first()->copy_rights;
    @endphp

    <strong>{!!$data!!}</strong>
 </footer>
