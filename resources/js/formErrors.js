import {ref} from "vue";


export const useFormErrors = () => {
    const errors = ref(null);

    const getError = (column) => {
        if (!errors.value) {
            return null
        }
        if (column in errors.value) {
            return errors.value[column][0];
        }
    }

    const clearErrors = () => {
        errors.value = null
    }

    const setErrors = (errsArr) => {
        errors.value = errsArr
    }

    return {
        getError,
        clearErrors,
        setErrors,
    }
}
