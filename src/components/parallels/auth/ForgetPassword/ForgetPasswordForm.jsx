import { useEffect } from "react";
import { useForm } from "react-hook-form";
import { useNavigate } from "react-router-dom";
import { FaRegEnvelope } from "react-icons/fa6";
import Button from "@/components/templates/Button";
import { yupResolver } from "@hookform/resolvers/yup";
import Input from "@/components/templates/fields/Input";
import { useForgetPassword } from "@/services/queries/auth/auth.queries";
import forgetPasswordSchema from "@/validationSchema/auth/forgetPasswordSchema";

const initialValue = {
  userName: "",
};

const ForgetPasswordForm = () => {
  /**
   * Api calls
   */
  const {
    data: forgetPasswordData,
    mutate: forgetPasswordMutate,
    isPending,
  } = useForgetPassword();

  /**
   * Route
   */
  const navigate = useNavigate();

  /**
   * Form Instance
   */
  const form = useForm({
    defaultValues: initialValue,
    resolver: yupResolver(forgetPasswordSchema),
  });

  /**
   * Submission Form
   */
  const onSubmit = (e) => {
    forgetPasswordMutate(e);
  };

  /**
   * Navigate After Success
   */
  useEffect(() => {
    if (forgetPasswordData?.isSuccess) {
      navigate("/auth/forget-password-otp", {
        state: { userName: form.getValues("userName") },
      });
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
        <Input
          icon={<FaRegEnvelope />}
          form={form}
          name="userName"
          title="Email Address"
        />

        <div className="mt-8 flex justify-center">
          <Button isPending={isPending} type="submit" className="w-full bg-cs-secondary ">
            Confirm
          </Button>
        </div>
      </form>
    </>
  );
};

export default ForgetPasswordForm;
