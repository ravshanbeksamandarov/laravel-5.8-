@push('styles')
    <link rel="stylesheet" href="/dashboard/vendors/summernote/summernote-bs4.min.css">
@endpush

@push('scripts')
    <script type="text/javascript" src="/dashboard/vendors/summernote/summernote-bs4.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 350,
                tabsize: 2,
                followingToolbar: true,
            });
        });
    </script>
@endpush
