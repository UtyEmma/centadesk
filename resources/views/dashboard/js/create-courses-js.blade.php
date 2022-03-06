<script>

    $(function() {
        $('input[name="duration"]').daterangepicker({
            startDate: moment().startOf('hour')
        });
    })

    $(document).ready(function() {
        console.log("Summernote")
        $('#summernote').summernote({
            placeholder: 'Write a compelling description of your class here',
            height: 100,
            toolbar: [
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link']],
                ['view', ['fullscreen']]
            ]
        })
    });
</script>
