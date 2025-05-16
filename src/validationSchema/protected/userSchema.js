import yup from "..";

const userSchema = yup.object({
    email: yup
        .string()
        .required("Email")
        .email(3, "Invalid email format."),
    name: yup
        .string()
        .required("Name")
        .min(3, "Name"),
    contactNumber: yup.string().required("Ph Number"),
    SubRole: yup.string().required("Sub role"),
    Role: yup.string().required(" Role"),
    idCard: yup.string().required("Identity Card"),
    country: yup.string().required("Country"),
    province: yup.string().required("Province"),
    city: yup.string().required("City"),
    address: yup.string().required("Address"),
    latitude: yup.string(),
    longitude: yup.string()
});

export default userSchema;