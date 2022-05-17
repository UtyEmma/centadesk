<script>
    function parseRepeaterData() {
        const value = $('.qualification').repeaterVal();
        const objectives = value.qualification
                                .filter(objective => objective['text-input'])
                                .map(objective => objective['text-input'])
        $('#qualification-input').val(JSON.stringify(objectives))
    }

    $(document).ready(function(){
        $('.qualification').repeater({
            show: function () {
                parseRepeaterData()
                $(this).slideDown();
            },
            hide: function(deleteElement){
                $(this).slideUp(deleteElement);
                parseRepeaterData()
            }
        });
    })
</script>

<div class="qualification">
    <div data-repeater-list="qualification">
        <div class="row d-flex align-items-end" data-repeater-item>
            <div class="col-md-11">
                <div class="row">
                    <div class="col-md-4">
                        <div class="single-form ">
                            <label for="" class="mb-1">Qualification</label>
                            <input type="text" id="qualification" placeholder="Qualification" />
                            <small id="qualification-error" class="text-danger"></small>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="single-form">
                            <label for="" class="mb-1">Awarding Institution</label>
                            <input type="text" id="institution" placeholder="Institution" />
                            <small id="institution-error" class="text-danger"></small>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="single-form ">
                            <label for="" class="mb-1">Year Acquired</label>
                            <input type="date" class="form-control" id="date" placeholder="Year Acquired" />
                            <small id="date-error" class="text-danger"></small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-1">
                <button data-repeater-delete type="button" class="btn btn-danger mb-2 btn-hover-dark h-auto btn-custom d-flex align-items-center justify-content-center py-2 px-2" >
                    <i class="icofont-trash ms-0 fs-5"></i>
                </button>
            </div>
        </div>
    </div>
    <button data-repeater-create type="button" class="w-auto mt-2 btn btn-primary btn-custom">Add</button>
    <input type="text" name="qualification" id="qualification-input" hidden>
</div>

