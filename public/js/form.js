const form = {
    values : (names) => {
        object = {}
        names.map((name) => {
            object[name] = $(`[name='${name}']`).val()
        })

        return object
    },
}
