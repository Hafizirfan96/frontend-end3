import { useEffect } from "react";
import { useForm } from "react-hook-form";
import { FaRegEnvelope } from "react-icons/fa6";
import Button from "@/components/templates/Button";
import { yupResolver } from "@hookform/resolvers/yup";
import Input from "@/components/templates/fields/Input";
import { useLocation, useNavigate } from "react-router-dom";
import { useForgetPasswordOTP } from "@/services/queries/auth/auth.queries";
import forgetPasswordOtpSchema from "@/validationSchema/auth/forgetPasswordOtpSchema";

const initialValue = {
  userName: "",
  otp: "",
  password: "",
};

const ForgetPasswordOtpForm = () => {
  /**
   * Api calls
   */
  const {
    data: forgetPasswordData,
    mutate: forgetPasswordMutate,
    isPending,
  } = useForgetPasswordOTP();

  /**
   * Route
   */
  const navigate = useNavigate();
  const userName = useLocation()?.state?.userName;

  /**
   * Form Instance
   */
  const form = useForm({
    defaultValues: initialValue,
    resolver: yupResolver(forgetPasswordOtpSchema),
  });

  /**
   * Submission Form
   */
  const onSubmit = (values) => {
    values.userName = userName;
    forgetPasswordMutate(values);
  };

  /**
   * Navigate After Success
   */
  useEffect(() => {
    if (forgetPasswordData?.isSuccess) {
      navigate("/auth/sign-in");
    }
  }, [forgetPasswordData, navigate, form.getValues]);

  /**
   * Component
   */
  return (
    <>
      <form
        className="flex flex-col space-y-8 mt-10"
        onSubmit={form.handleSubmit(onSubmit)}
      >
        <Input icon={<FaRegEnvelope />} name="otp" form={form} title="OTP" />

        <Input
          icon={<FaRegEnvelope />}
          name="password"
          type="password"
          form={form}
          title="Password"
        />

        <Input
          icon={<FaRegEnvelope />}
          name="conformPassword"
          type="password"
          form={form}
          title="Conform Password"
        />

        <div className="mt-8 flex justify-center">
          <Button
            isPending={isPending}
            type="submit"
            className="w-full  bg-cs-secondary"
          >
            Submit
          </Button>
        </div>
      </form>
    </>
  );
};

export default ForgetPasswordOtpForm;
