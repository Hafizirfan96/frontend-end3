import Input from "@/components/templates/fields/Input";
import { toast } from "react-toastify";
import { LuLock } from "react-icons/lu";
import { Link, useLocation, useNavigate } from "react-router-dom";
import { useForm } from "react-hook-form";
import { useEffect, useState } from "react";
import { FaRegEnvelope } from "react-icons/fa6";
import Button from "@/components/templates/Button";
import { yupResolver } from "@hookform/resolvers/yup";
import loginSchema from "@/validationSchema/auth/loginSchema";
import { useLogin } from "@/services/queries/auth/auth.queries";
// import VerifyUserModal from "@/components/templates/modals/VerifyUserModal";

const AdminLogin = () => {
      const navigate = useNavigate();
const initialValue = {
  userName: "",
  password: "",
};
    const form = useForm({
    defaultValues: initialValue,
    resolver: yupResolver(loginSchema),
  });
    const onSubmit = (values) => {
  navigate("/admin/dashboard")
  };
  return(
   <div className="flex items-center justify-center min-h-screen px-4">
  <form
       className="w-full max-w-[400px] flex flex-col space-y-8 mt-10"

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
      <div className="flex items-center gap-3">
        <input type="checkbox" /> Remember
      </div>
      <Link to="/auth/forget-password">Forget Password?</Link>
    </div>
    <div className="mt-8 flex justify-center">
      <Button
        // isPending={isPending}
        type="submit"
        className="w-full bg-cs-secondary"
      >
        Sign In
      </Button>
    </div>
  </form>
</div>


  );
};

export default AdminLogin;
