import { Link } from "react-router-dom";
import AuthTitle from "@/components/templates/titles/AuthTitle";
import ForgetPasswordOtpForm from "@/components/parallels/auth/ForgetPasswordOtp/ForgetPasswordOtpForm";

const ForgetPasswordOTPPage = () => {
  return (
    <div className="min-w-[50rem] w-auto">
      <div className="space-y-20">
       
        <AuthTitle
          heading="Forget Password"
          // slogan="Unleash your inner sloth 4.0 right now"
        />
        <div className="space-y-10">
          <ForgetPasswordOtpForm />
          <p className="text-xl font-semibold text-center h-text ">
            <Link to={"/auth/sign-in"} className="n-text ">
              Back to Sign-In?
            </Link>
          </p>
        </div>
      </div>
    </div>
  );
};

export default ForgetPasswordOTPPage;
