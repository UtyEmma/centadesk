@push('scripts')
    <script src="{{asset('js/plugins/pagination.js')}}"></script>

    <script>

        var data = () => {
            const data = {!! json_encode($categories) !!}
            return data.map(item => {
                return {...item, selected: false}
            })
        }

        const paginationData = data()

        const updateStatus = (event, slug) => {
            const i = paginationData.findIndex(item => item.slug === slug)
            paginationData[i].selected = event.target.checked
        }

        const markup = (data) => {
            return `<input type="checkbox" class="category-select" ${data.selected ? 'checked' : ''} oninput="updateStatus(event, '${data.slug}')" value="${data.name}" id="${data.slug}" name="categories[]" hidden>
                    <label for="${data.slug}" style="margin: 3px" class="p-2 m-md-1 my-md-2 radius cursor-pointer bg-secondary border border-primary">
                        <small>${data.name}</small>
                    </label>`
        }

        const template = (data) => {
            var html = '<ul class="d-flex flex-wrap text-center justify-content-md-center">'
            data.forEach((item) => html += markup(item))
            return html += '</ul>'
        }

        const initPagination =  (data) => {
            $('#category-container').pagination({
                dataSource: data,
                callback: function(data, pagination) {
                    $('.categories').html(template(data));
                },
                pageSize: 20,
                className: 'paginationjs-theme-green paginationjs-big d-flex justify-content-md-center mt-3',
                ulClassName: ''
            })
        }

        const search = (event) => {
            const filter = event.target.value.toUpperCase();
            const filtered = paginationData.filter((item) => item.name.toUpperCase().indexOf(filter) > -1);
            initPagination(filtered)
        }

        $(document).ready(() => {
            initPagination(paginationData)
        })
    </script>
@endpush

@push('styles')
    <link href="{{asset('css/plugins/paginationjs.css')}}" rel="stylesheet" />
@endpush

<div class="row mt-4">
    <div class="col-md-8 mx-auto">
        <div class="courses-search search-2 m-0 w-100" style="max-width: 100% !important" >
            <input name="keyword" class="w-100" onkeyup="search(event)" type="text" placeholder="Search for categories...">
            <button type="submit">
                <i class="icofont-search mx-auto"></i>
            </button>
        </div>
    </div>
</div>

<div class="text-center mt-3">
    @error('categories')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<form action="/categories/update" method="post">
    @csrf
    <div class="col-md-11 mx-auto p-5 px-0 text-center" id="category-container">
        <div class="categories"></div>
    </div>

    <div class="d-flex justify-content-md-center mt-3">
        <x-btn type='submit' classes="btn-primary btn-hover-dark">Save and Continue</x-btn>
    </div>
</form>
