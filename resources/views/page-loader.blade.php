<!--begin::Page loading-->
<div class="page-loader flex-column bg-dark bg-opacity-25"
     style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 9999; display: none; justify-content: center; align-items: center;">
    <div class="text-center">
        <span class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></span>
        <span class="text-gray-800 fs-6 fw-semibold mt-5 d-block">Loading...</span>
    </div>
</div>
<!--end::Page loading-->

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const loadingEl = document.querySelector('.page-loader');

        function showPageLoading() {
            loadingEl && (loadingEl.style.display = 'flex');
        }

        function hidePageLoading() {
            loadingEl && (loadingEl.style.display = 'none');
        }

        // Show loader on form submit
        document.querySelectorAll('form').forEach(function (form) {
            form.addEventListener('submit', function () {
                showPageLoading();
            });
        });

        // Show loader on any click with data-kt-page-loading
        document.querySelectorAll('[data-kt-page-loading]').forEach(function (el) {
            el.addEventListener('click', function (e) {
                showPageLoading();
                if (el.tagName === 'A') {
                    e.preventDefault();
                    setTimeout(() => {
                        window.location.href = el.href;
                    }, 300);
                }
            });
        });

        // Hide loader when everything is loaded
        window.addEventListener('load', function () {
            hidePageLoading();
        });

        // Laravel flash session check to hide loader
        @if(Session::has('success') || Session::has('error') || Session::has('toastr'))
        hidePageLoading();
        @endif

        // Handle AJAX globally with jQuery (if jQuery is being used)
        if (typeof jQuery !== 'undefined') {
            $(document).ajaxStart(function () {
                showPageLoading();
            }).ajaxStop(function () {
                hidePageLoading();
            });
        }
    });
</script>
