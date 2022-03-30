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
            current : document.querySelector('#current').checked
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

        id ? experienceArray[id] = data : experienceArray.push(data)

        experienceArray.map(experience => appendExperienceHtml(experience))
        $('#experience-input').val(JSON.stringify(experienceArray))

        clearExperienceFormValues()

        $('#experience-error').text('');
    }

    function appendExperienceHtml(data){
        $('#experience-container').html('')

        const markup = `<div class="d-flex justify-content-between my-2" id="experience-${experienceArray.length - 1}">
                            <div>
                                <h6 class="mb-0 mt-0">${data.company}</h6>
                                <p class="mt-0">${data.role} - <span class="mb-0">${data.startdate} ${data.enddate && '- '+data.enddate}</span></p>
                            </div>

                            <div>
                                <button class="" onclick="deleteExperienceItem(${experienceArray.length - 1})" type="button">X</button>
                                <button class="" onclick="editExperience(${experienceArray.length - 1})" type="button">Edit</button>
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
        $('#current').checked = false
    }

    function deleteExperienceItem(id){
        experienceArray.splice(id, 1)
        const element = document.getElementById(`experience-${id}`)
        $('#experience-input').val(JSON.stringify(experienceArray))
        element.remove()
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
