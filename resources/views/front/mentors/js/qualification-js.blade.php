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
                date: document.querySelector('#date').value,
            }

            const validation = validator.init(data, __qualificationSchema)

            if(validation.fails()){
                const errors = validation.errors.errors
                return parseErrors(errors)
            }

            if(moment(data.date).isAfter(new Date())){
                return $(`#date-error`).text("Qualification date cannot fall after today")
            }

            id ? qualificationArray[id] = data : qualificationArray.push(data)

            $('#qualification-input').val(JSON.stringify(qualificationArray))

            $('#qualificationContainer').html("")

            qualificationArray.map(qualification => appendQualification(qualification))

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


        function appendQualification(data){
            const markup = `<div class="d-flex justify-content-between my-2" id="qualification-${qualificationArray.length - 1}">
                                <div>
                                    <h6 class="mb-0 mt-0">${data.qualification}  - <span class="mb-0">${data.date}</span> </h6>
                                    <p class="mt-0">${data.institution}</p>
                                </div>

                                <div>
                                    <button class="" onclick="deleteQualification(${qualificationArray.length - 1})" type="button">X</button>
                                    <button class="" onclick="editQualification(${qualificationArray.length - 1})" type="button">Edit</button>
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
            $('#qualification-input').val(JSON.stringify(qualificationArray))
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
