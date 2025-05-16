import yup from "..";
import { emailOptMessage, mobileOptMessage } from "../../static/validationMessages";

const userVerifySchema = yup.object({
  otpNumber: yup
    .string()
    .required("Mobile OTP")
    .min(6, null, mobileOptMessage)
    .max(6, null, mobileOptMessage),

  otpEmail: yup
    .string()
    .required("Email OTP")
    .min(6, null, emailOptMessage)
    .max(6, null, emailOptMessage)
});

export default userVerifySchema;
