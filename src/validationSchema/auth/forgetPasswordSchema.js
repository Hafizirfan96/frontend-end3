import yup from "..";

const forgetPasswordSchema = yup.object({
  userName: yup
    .string()
    .required("Username or email")
    .min(3, "Username or email"),
});

export default forgetPasswordSchema;
