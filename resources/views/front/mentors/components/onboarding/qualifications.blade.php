<div class="row">

    <script>

        const formItems = []

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
            let qualification = document.querySelector('input[name="qualification"]').value
            let institution = document.querySelector('input[name="institution"]').value
            let date = document.querySelector('input[name="date"]').value

            const validation = new Validator({
                qualification: qualification,
                institution: institution,
                date: date
            }, __qualificationSchema.rules)

            validation.setAttributeNames(__qualificationSchema.attributes)

            if(validation.fails()){
                const errors = validation.errors.errors
                return parseErrors(errors)
            }

            formItems.push({
                qualification: qualification,
                institution: institution,
                date: date,
            })

            const experience = `<div class="d-flex justify-content-between my-2" id="experience-${formItems.length - 1}">
                    <div>
                        <h6 class="mb-0 mt-0">${qualification}  - <span class="mb-0">${date}</span> </h6>
                        <p class="mt-0">${institution}</p>
                    </div>

                    <div>
                        <button class="" onclick="deleteItem(${formItems.length - 1})" type="button">X</button>
                    </div>
                </div>`

            clear()

            document.getElementById('experience').insertAdjacentHTML('beforeend', experience)
        }

        function clear(){
            $('#qualification').val("")
            $('#institution').val("")
            $('#date').val("")

            $("#qualification-error").html("")
            $("#institution-error").html("")
            $("#date-error").html("")
        }

        function deleteItem(id){
            const element = document.getElementById(`experience-${id}`)
            element.remove()
        }


    </script>

    <div class="col-md-9 mx-auto px-0 row row-cols-1 gy-3">
        <div class="px-0">
            <h4>Your Qualifications</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente, nemo.</p>
        </div>

        <div class="border p-5 radius">
            <div>
                <h6 class="p-0">Skills</h6>
            </div>

            <div id="experience">

            </div>

            <div id="experienceItem">
                <div class="single-form">
                    <input type="text" name="qualification" id="qualification" placeholder="Qualification" />
                    <small id="qualification-error" class="text-danger"></small>
                </div>

                <div class="row">
                    <div class="col-6 w-full">
                        <div class="single-form">
                            <input type="text" name="institution" id="institution" placeholder="Institution" />
                            <small id="institution-error" class="text-danger"></small>
                        </div>
                    </div>

                    <div class="single-form w-full col-6">
                        <input type="date" name="date" class="form-control" id="date" placeholder="Year Acquired" />
                        <small id="date-error" class="text-danger"></small>
                    </div>
                </div>
            </div>

            <div class="mt-3">
                <button class="btn btn-primary" type="button" onclick="addItem()" >Add</button>
            </div>
        </div>




        <div class="single-form d-flex justify-content-end">
            <button type="button" class="btn btn-primary" onclick="next()">Next</button>
        </div>
    </div>
</div>
