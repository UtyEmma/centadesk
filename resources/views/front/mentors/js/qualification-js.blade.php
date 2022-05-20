@push('scripts')
    <script>

        const qualificationArray = []

        const __qualificationSchema = {
            rules: {
                qualification: "required|string",
                institution: "required|string",
                date: "required|date"
            },

            attributes: {
                qualification: "Qualification",
                institution: "Institution",
                date: "Date"
            }
        }

        const values = ['qualification', 'institution', 'date']

        function addQualificationItem(){
            clearErrors(values)

            const id = $('#qualification_id').val()

            const data = {
                qualification: document.querySelector('#qualification').value,
                institution: document.querySelector('#institution').value,
                date: document.querySelector('#date').value ,
            }

            const validation = validator.init(data, __qualificationSchema)

            if(validation.fails()){
                const errors = validation.errors.errors
                return parseErrors(errors)
            }


            if(moment(data.date).isAfter(new Date())){
                return $(`#date-error`).text("Qualification date cannot fall after today")
            }

            data.date = moment(data.date).format("Do MMM, YYYY")

            id ? qualificationArray[id] = data : qualificationArray.push(data)

            $('#qualification-input').val(JSON.stringify(qualificationArray))
            displayQualifications()
            clearQualificationForms()
        }

        function clearQualificationForms(){
            $('#qualification').val("")
            $('#institution').val("")
            $('#date').val("")
            $('#qualification_id').val("")
            $("#qualification-error").html("")
            $("#institution-error").html("")
            $("#date-error").html("")
            $('#qualification-section-error').text("")
        }


        function appendQualification(data, index){
            const markup = `<div class="d-flex justify-content-between align-items-center mb-2 bg-light border border-primary radius p-3" id="qualification-${index}">
                        <div>
                            <h6 class="mb-0 mt-0">${data.qualification}</h6>
                            <p class="mt-0 mb-0 lh-0">${data.institution}
                                <br>
                                <span style="font-size: 13px;">
                                    ${data.date}
                                </span>
                            </p>
                        </div>

                        <div class="d-flex align-items-center">
                            <button onclick="deleteQualification(${index})" type="button" class="btn btn-danger btn-hover-dark h-auto btn-custom d-flex align-items-center justify-content-center py-2 px-2 mx-1" >
                                <i class="icofont-trash ms-0"></i>
                            </button>
                            <button onclick="editQualification(${index})" type="button" class="mx-1 btn btn-primary btn-hover-dark btn-hover-dark h-auto btn-custom d-flex align-items-center justify-content-center py-2 px-2" >
                                <i class="icofont-edit-alt ms-0"></i>
                            </button>
                        </div>
                    </div>`


            $('#qualificationContainer').append(markup)
        }

        function checkForQualifications(){
            const check = qualificationArray.length > 0
            const element = $('#qualification-section-error')
            check ? element.text("") : element.text("Please fill in at least one qualification information")
            return check
        }

        function deleteQualification(id){
            qualificationArray.splice(id, 1)
            const element = document.getElementById(`qualification-${id}`).remove()
            displayQualifications()
            $('#qualification-input').val(JSON.stringify(qualificationArray))
        }

        function displayQualifications(){
            $('#qualificationContainer').html("")
            if(qualificationArray.length < 1){
                return $('#qualificationContainer').html(`<div id="qualificationDefault">
                                <div class="d-flex justify-content-center align-items-center">
                                    <div class="mb-2 p-5 text-center">
                                        <div class="col-6 mx-auto mb-3">
                                            <img src="{{asset('images/icon/education.svg')}}" alt="">
                                        </div>

                                        <h5 class="my-2" >Add Your Qualifications</h5>
                                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsam totam commodi odio voluptatibus minus ducimus culpa sed, fugiat.</p>
                                    </div>
                                </div>
                            </div>`)
            }
            qualificationArray.map((qualification, index) => appendQualification(qualification, index))
        }

        function editQualification(id) {
            qualification = qualificationArray[id];
            $('#qualification_id').val(id)
            $('#qualification').val(qualification.qualification),
            $('#institution').val(qualification.institution),
            $('#date').val(qualification.date)
        }
    </script>
@endpush
