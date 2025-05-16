import yup from "..";

const loginSchema = yup.object({
  userName: yup
    .string()
    .required("Username or email")
    .min(3, "Username or email"),
  password: yup.string().required("Password")
});

export default loginSchema;
