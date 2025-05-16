import yup from "..";
import { passwordMatchMessage, passwordMessage, passwordReg } from "../../static/validationMessages";

const changePasswordSchema = yup.object({
  oldPassword: yup.string().required("Old password"),
  newPassword: yup
    .string()
    .required("New password")
    .matches(
      passwordReg,
      passwordMessage
    ),
  confirmPassword: yup
    .string()
    .required("Confirm Password")
    .oneOf([yup.ref("newPassword"), null], passwordMatchMessage)
});

export default changePasswordSchema;
