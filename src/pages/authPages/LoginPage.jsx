// import { GoogleLogin } from "@react-oauth/google";
import { Link } from "react-router-dom";
import AuthTitle from "@/components/templates/titles/AuthTitle";
import LoginForm from "@/components/parallels/auth/Login/LoginForm";
// import Button from "../../components/templates/Button";
// import google from "../../assets/google.png";
// import DivideLine from "../../components/templates/DivideLine";

const LoginPage = () => {
  /**
   * Google Auth
   */

  // const responseMessage = (response) => {
  //   console.log(response);

  //   // console.log(decodeToken(response.credential));
  // };
  // const errorMessage = (error) => {
  //   console.log(error);
  // };

  return (
    <LoginForm />
  );
};

export default LoginPage;
