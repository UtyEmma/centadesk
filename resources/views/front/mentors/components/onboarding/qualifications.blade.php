<div class="row">

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

        function parseErrors(errors){
            const keys = Object.keys(errors)
            keys.map(key => {
                $(`#${key}-error`).text(errors[key][0])
            })
        }



        function addItem(){
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

            qualificationArray.push(data)

            $('#qualification-input').val(JSON.stringify(qualificationArray))

            $('#qualification-section-error').text("")
            return appendHtml(data)

        }

        function clearForms(){
            $('#qualification').val("")
            $('#institution').val("")
            $('#date').val("")

            $("#qualification-error").html("")
            $("#institution-error").html("")
            $("#date-error").html("")
        }

        function appendHtml(data){
            const experience = `<div class="d-flex justify-content-between my-2" id="qualification-${qualificationArray.length - 1}">
                                    <div>
                                        <h6 class="mb-0 mt-0">${data.qualification}  - <span class="mb-0">${data.date}</span> </h6>
                                        <p class="mt-0">${data.institution}</p>
                                    </div>

                                    <div>
                                        <button class="" onclick="deleteItem(${qualificationArray.length - 1})" type="button">X</button>
                                        <button class="" onclick="editItem(${qualificationArray.length - 1})" type="button">Edit</button>
                                    </div>
                                </div>`

            clearForms()



            $('#qualificationContainer').append(experience)
        }

        function handleQualificationNext(){
            if(qualificationArray.length < 1) return $('#qualification-section-error').text("Please fill in at least one qualification information")
            next()
        }


        function deleteItem(id){
            qualificationArray.splice(id, 1)
            const element = document.getElementById(`qualification-${id}`).remove()
            $('#qualification-input').val(JSON.stringify(qualificationArray))
        }


    </script>

    <div class="col-md-9 mx-auto px-0 row row-cols-1 gy-3">
        <div class="px-0">
            <h4>Your Qualifications</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente, nemo.</p>
        </div>

        <div class="border p-3 py-5 p-md-5 radius">
            <div>
                <h6 class="p-0">Skills</h6>
            </div>

            <small id="qualification-section-error" class="text-danger text-capitalize">
                @error('payment_method')
                    {{$message}}
                @enderror
            </small>

            <div id="qualificationContainer">

            </div>

            <textarea name="qualification" hidden id="qualification-input" cols="30" rows="10"></textarea>

            <div id="qualificationItem">
                <div class="single-form">
                    <input type="text" id="qualification" placeholder="Qualification" />
                    <small id="qualification-error" class="text-danger"></small>
                </div>

                <div class="row">
                    <div class="col-md-6 w-full">
                        <div class="single-form">
                            <input type="text" id="institution" placeholder="Institution" />
                            <small id="institution-error" class="text-danger"></small>
                        </div>
                    </div>

                    <div class="single-form w-full col-md-6">
                        <input type="date" class="form-control" id="date" placeholder="Year Acquired" />
                        <small id="date-error" class="text-danger"></small>
                    </div>
                </div>
            </div>

            <div class="mt-3">
                <button class="btn btn-primary" type="button" onclick="addItem()" >Add</button>
            </div>
        </div>

        <div class="single-form d-flex justify-content-between px-0">
            <button type="button" class="btn btn-primary" onclick="previous()">Previous</button>
            <button type="button" class="btn btn-primary" onclick="handleNext()">Next</button>
        </div>
    </div>
</div>
