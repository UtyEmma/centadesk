<script>
    $(document).ready(() => {

        function parseTags (){
            const tags = {!! $tags !!}
            tags.map(tag => {
                const element = `<span class="badge rounded-pill bg-primary me-2 text-center">${tag.value}</span>`
                document.getElementById('{{$element}}').insertAdjacentHTML('afterEnd', element)
            })
        }

        parseTags()

    })
</script>
<div id="{{$element}}" class=""></div>
