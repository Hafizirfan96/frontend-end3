import { toast } from "react-toastify";
import { LuLock } from "react-icons/lu";
import { Link, useLocation, useNavigate } from "react-router-dom";
import { useForm } from "react-hook-form";
import { useEffect, useState } from "react";
import { FaRegEnvelope } from "react-icons/fa6";
import Button from "@/components/templates/Button";
import { yupResolver } from "@hookform/resolvers/yup";
import Input from "@/components/templates/fields/Input";
import loginSchema from "@/validationSchema/auth/loginSchema";
import { useLogin } from "@/services/queries/auth/auth.queries";
import VerifyUserModal from "@/components/templates/modals/VerifyUserModal";

const initialValue = {
  userName: "",
  password: "",
};

const LoginForm = () => {
  /**
   * States
   */
  const [isVerifyModalToggle, setIsVerifyModalToggle] = useState(null);
  const location = useLocation();
  const navigate = useNavigate();

  const from = location.state?.from;

  console.log("value----", from);

  /**
   * Api calls
   */
  const { mutate, isPending } = useLogin();

  /**
   * Form Instance
   */
  const form = useForm({
    defaultValues: initialValue,
    resolver: yupResolver(loginSchema),
  });

  //   register,
  //   handleSubmit,
  //   formState: { errors }
  // } = useForm({
  //   defaultValues: initialValue,
  //   resolver: yupResolver(loginSchema)
  // });

  /**
   * Submission Form
   */
  // const onSubmit = (values) => {
  //   mutate(values, {
  //     onSuccess: (response) => {
  //       if (response?.data?.code == 428) {
  //         setIsVerifyModalToggle({
  //           userName: values?.userName,
  //           password: values.password,
  //         });
  //       }
  //     },
  //   });
  // };

  const onSubmit = (values) => {
    mutate(values, {
      onSuccess: (response) => {
      

        if (response?.data?.code == 428) {
          console.log("if----");
          // setIsVerifyModalToggle({
          //   userName: values?.userName,
          //   password: values.password,
          // });
          navigate("/mainMenu")
        }
      },
      onError: (err) => {
        toast.error("Login failed. Please try again.");
      },
    });
  };

  /**
   * Navigate After Success
   */
  // useEffect(() => {
  //   onMessageListener((payload) => {
  //     console.log("payload----",payload);

  //     toast.success(payload?.notification?.body);
  //   });
  // }, []);

  /**
   * Component
   */
  return (
    <>
      <VerifyUserModal
        modalToggle={isVerifyModalToggle}
        setModalToggle={setIsVerifyModalToggle}
      />
      <form
        className="flex flex-col space-y-8 mt-10"
        onSubmit={form.handleSubmit(onSubmit)}
      >
        <Input
          icon={<FaRegEnvelope />}
          form={form}
          name="userName"
          title="Email Address"
        />
        <Input
          form={form}
          icon={<LuLock />}
          type="password"
          name="password"
          title="Password"
        />
        <div className="flex justify-between items-center text-xl font-bold">
          <div className="flex items-center gap-3 ">
            <input type="checkbox" name="" id="" /> Remember
          </div>
          <Link to="/auth/forget-password">Forget Password?</Link>
        </div>
        <div className="mt-8 flex justify-center">
          <Button
            isPending={isPending}
            type="submit"
            className="w-full bg-cs-secondary"
          >
            Sign In
          </Button>
        </div>
      </form>
    </>
  );
};

export default LoginForm;
