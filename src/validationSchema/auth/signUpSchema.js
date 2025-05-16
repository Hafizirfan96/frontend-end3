import yup from "..";
import { passwordMatchMessage, passwordMessage, passwordReg } from "../../static/validationMessages";

const signUpSchema = yup.object({
  name: yup
    .string()
    .required("Full Name")
    .min(3, "Full Name"),
  email: yup
    .string()
    .required("Email")
    .email("Invalid email formate."),
    contactNumber: yup
    .string()
    .required("Mobile No"),
  password: yup
    .string()
    .required("Password")
    .matches(
      passwordReg,
      passwordMessage
    ),
    confirmPassword: yup
    .string()
    .required("Confirm Password")
    .oneOf([yup.ref("password"), null], passwordMatchMessage),
});

export default signUpSchema;
