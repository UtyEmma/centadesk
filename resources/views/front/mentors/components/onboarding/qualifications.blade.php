<div class="row">

    <script>

        const formItems = []

        function addItem(){
            let qualification = document.querySelector('input[name="qualification"]')
            let institution = document.querySelector('input[name="institution"]')
            let date = document.querySelector('input[name="date"]')

            formItems.push({
                qualification: qualification.value,
                institution: institution.value,
                date: date,
            })

            const experience = `<div class="d-flex justify-content-between my-2" id="experience-${formItems.length - 1}">
                    <div>
                        <h6 class="mb-0 mt-0">${qualification.value}  - <span class="mb-0">${date.value}</span> </h6>
                        <p class="mt-0">${institution.value}</p>
                    </div>

                    <div>
                        <button class="" onclick="deleteItem(${formItems.length - 1})" type="button">X</button>
                    </div>
                </div>`

            qualification.value = ""
            institution.value  = ""
            date.value  = ""
            document.getElementById('experience').insertAdjacentHTML('beforeend', experience)
        }

        function deleteItem(id){
            const element = document.getElementById(`experience-${id}`)
            console.log(element)
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
                </div>

                <div class="row">
                    <div class="col-6 w-full">
                        <div class="single-form">
                            <input type="text" name="institution" id="institution" placeholder="Institution" />
                        </div>
                    </div>

                    <div class="single-form w-full col-6">
                        <input type="date" name="date" class="form-control" id="date" placeholder="Year Acquired" />
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
