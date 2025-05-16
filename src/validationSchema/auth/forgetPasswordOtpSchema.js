// import * as yup from "yup";
import yup from "..";
import { passwordMessage, passwordReg } from "../../static/validationMessages";
const forgetPasswordOtpSchema = yup.object({
  otp: yup.string().required("OTP"),
  password: yup
    .string()
    .required("Password")
    .matches(
      passwordReg,
      passwordMessage
    ),
  conformPassword: yup
    .string()
    .oneOf([yup.ref("password", undefined)], "Password must match")
    .required("Confirm Password")
});

export default forgetPasswordOtpSchema;
