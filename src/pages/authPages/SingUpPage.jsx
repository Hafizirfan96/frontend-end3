import { Link } from "react-router-dom";
import AuthTitle from "@/components/templates/titles/AuthTitle";
import SingUpForm from "@/components/parallels/auth/SignUp/SingUpForm";

const SingUpPage = () => {
  return (

    <div className="w-[350px]">
      <div className="space-y-10">
        <AuthTitle
          heading="Sign Up"
          // slogan="Unleash your inner sloth 4.0 right now"
        />
        <AuthTitle>Registration</AuthTitle>
        <div className="space-y-3 ">
          <SingUpForm />
          <p className="text-xl font-semibold text-center text-cs-light dark:text-cs-white">
            Already have an account?{" "}
            <Link
              to={"/auth/sign-in"}
              className="text-cs-black dark:text-cs-white"
            >
              Sign In
            </Link>
          </p>
        </div>
      </div>
    </div>
  );
};

export default SingUpPage;
