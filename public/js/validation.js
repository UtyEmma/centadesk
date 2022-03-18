const validator = {
    init(values, schema) {
        console.log("E don reach here")
        const validation = new Validator(values, schema.rules, schema?.messages)
        validation.setAttributeNames(schema?.attributes)

        if(validation.fails()){
            const errors = validation.errors
            validation.errors = validator.mapErrors(errors.errors)
        }else{
            validation.errors = null
        }
        return validation
    },

    mapErrors(errors){
        let object = {}
        if (errors) {
            for (const [key, value] of Object.entries(errors)) {
                object = {
                    ...object,
                    [key]: value[0]
                }
            }
        }
        return object;
    }
}
