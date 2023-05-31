<footer class="footer footer-transparent d-print-none">
    <div class="container">
        <div class="row">
            <div class="text-center">
                <ul class="list-inline list-inline-dots mb-0">
                    <li class="list-inline-item">
                        {{ __('Copyright') }} &copy; <span id="year"></span>
                        <a href="{{ route('admin.dashboard') }}" class="link-secondary">{{ config('app.name') }}</a>.
                        {{ __('All rights reserved.') }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
