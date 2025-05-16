import { Link } from "react-router-dom";
import AuthTitle from "@/components/templates/titles/AuthTitle";
import ForgetPasswordForm from "@/components/parallels/auth/ForgetPassword/ForgetPasswordForm";

const ForgetPasswordPage = () => {
  return (
    <div className="w-[350px]">
      <div className="space-y-20">
        <AuthTitle
          heading="Forget Password"
          // slogan="Unleash your inner sloth 4.0 right now"
        />
        <div className="space-y-10">
          <ForgetPasswordForm />
          <p className="text-xl font-semibold text-center h-text ">
            <Link to={"/auth/sign-in"} className="n-text">
              Back to Sign-In?
            </Link>
          </p>
        </div>
      </div>
    </div>
  );
};

export default ForgetPasswordPage;
