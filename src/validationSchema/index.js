import * as yup from "yup";


yup.addMethod(yup.string, "required", function (field, message) {
    return this.test("custom-required", message ? message : field ? `${field} is required.` : "This field is required.", (value) => {
        return value != null && value !== "";
    });
});

yup.addMethod(yup.string, "min", function (minLength, field, message) {
    return this.test("custom-min", message ? message : field ? `${field} be at least ${minLength} characters` : `Must be at least ${minLength} characters`, (value) => {
        if (!value) return true;
        return value.length >= minLength;
    });
});

yup.addMethod(yup.string, "max", function (maxLength, field, message) {
    return this.test("custom-max", message ? message : field ? `${field} can contain no more than ${maxLength} characters` : `Must can contain no more than ${maxLength} characters`, (value) => {
        if (!value) return true;
        return value.length <= maxLength;
    });
});

export default yup

