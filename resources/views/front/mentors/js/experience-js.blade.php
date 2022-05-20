<script>

    const experienceArray = []

    const __experienceSchema = {
        rules: {
            company: "required|string",
            role: "required|string",
            startdate: "required|date",
            enddate: "date",
            current: "boolean",
        },

        attributes: {
            company: "Qualification",
            role: "Institution",
            startdate: "Start Date",
            enddate: "End Date",
            current: "Current Position"
        }
    }


    function addExperience(){
        const values = ['company', 'role', 'startdate', 'enddate', 'current']

        clearErrors(values)

        let id = $('#experience_id').val()

        const data = {
            company: document.querySelector('#company').value,
            role: document.querySelector('#role').value,
            startdate: document.querySelector('#startdate').value,
            enddate: document.querySelector('#enddate').value,
            current : document.querySelector('#current').checked,
            // description : document.querySelector('#description').value
        }

        const validation = new Validator(data, __experienceSchema.rules)
        validation.setAttributeNames(__experienceSchema.attributes)

        if(validation.fails()){
            const errors = validation.errors.errors
            return parseErrors(errors)
        }

        if(moment(data.startdate).isAfter(new Date()) || moment(data.enddate).isAfter(new Date()))
                return $(`#startdate-error`).text("Your dates cannot fall after today")

        if(moment(data.startdate).isAfter(data.enddate)) return $(`#startdate-error`).text("Your work Start date should not fall after your work end date")

        data.startdate = moment(data.startdate).format("Do MMM, YYYY")
        data.enddate = moment(data.enddate).format("Do MMM, YYYY")
        id ? experienceArray[id] = data : experienceArray.push(data)

        displayExperienceItems()

        $('#experience-input').val(JSON.stringify(experienceArray))

        clearExperienceFormValues()
        $('#experience-error').text('');
    }

    function appendExperienceHtml(data, index){
        const markup = `<div class="d-flex justify-content-between align-items-center mb-2 border bg-white border-primary radius p-3" id="experience-${index}">
                                <div>
                                    <h6 class="mb-0 mt-0">${data.role}</h6>
                                    <p class="mt-0 mb-0">${data.company}</p>
                                    <small class="mt-0">${data.startdate} - ${data.current ? 'Present' : data.enddate}</small>
                                </div>

                                <div class="d-flex align-items-center">
                                    <button onclick="deleteExperienceItem(${index})" type="button" class="btn btn-danger btn-hover-dark h-auto btn-custom d-flex align-items-center justify-content-center py-2 px-2 mx-1" >
                                        <i class="icofont-trash ms-0"></i>
                                    </button>
                                    <button onclick="editExperience(${index})" type="button" class="mx-1 btn btn-primary btn-hover-dark btn-hover-dark h-auto btn-custom d-flex align-items-center justify-content-center py-2 px-2" >
                                        <i class="icofont-edit-alt ms-0"></i>
                                    </button>
                                </div>
                            </div>`
        $('#experience-container').append(markup)
    }

    function experienceNext(){
        const check = experienceArray.length > 0
        const element = $('#experience-error')
        check ? element.text("") : element.text("Please add atleast one Experience Information")
        return check
    }

    function clearExperienceFormValues(){
        $('#company').val("")
        $('#role').val("")
        $('#startdate').val("")
        $('#enddate').val("")
        document.querySelector('#current').checked = false
    }

    function deleteExperienceItem(id){
        experienceArray.splice(id, 1)
        const element = document.getElementById(`experience-${id}`)
        $('#experience-input').val(JSON.stringify(experienceArray))
        element.remove()
        displayExperienceItems()
    }

    function displayExperienceItems(){
        $('#experience-container').html('')

        if(experienceArray.length < 1){
            return $('#experience-container').html(`<div id="experienceDefault">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <div class="mb-2 p-5 text-center">
                                            <div class="col-6 mx-auto mb-3">
                                                <img src="{{asset('images/icon/resume.svg')}}" alt="">
                                            </div>

                                            <h5 class="my-2" >Add Your Work Experience</h5>
                                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsam totam commodi odio voluptatibus minus ducimus culpa sed, fugiat.</p>
                                        </div>
                                    </div>
                                </div>`)
        }
        experienceArray.map((experience, index) => appendExperienceHtml(experience, index))
    }

    function editExperience(id) {
        const experience = experienceArray[id];
        $('#experience_id').val(id)
        $('#company').val(experience.company)
        $('#role').val(experience.role)
        $('#startdate').val(experience.startdate)
        $('#enddate').val(experience.enddate)
        $('#current').checked = experience.current
    }

</script>
