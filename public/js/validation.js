const validator = {
    init : (data, schema) => {
        const validator = new Validator(data, schema.rules)
        validator.setAttributeNames(schema.attributes)
        return validator
    },

    mapErrors : (errors) => {
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
