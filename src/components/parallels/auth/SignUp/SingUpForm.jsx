import {  useState } from "react";
import { useForm } from "react-hook-form";
import { useDispatch } from "react-redux";
import Button from "@/components/templates/Button";
import { yupResolver } from "@hookform/resolvers/yup";
import Input from "@/components/templates/fields/Input";
import signUpSchema from "@/validationSchema/auth/signUpSchema";
import DropDown from "@/components/templates/DropDown/DropDown";
import { useSignUp, } from "@/services/queries/auth/auth.queries";
import { useFetchCountries } from "@/services/queries/protected/province.queries";
// import VerifyUserModal from "@/templates/modals/VerifyUserModal";

const SingUpForm = () => {
  /**
   * States
   */
  const [isVerifyModalToggle, setIsVerifyModalToggle] = useState(null);


  const dispatch = useDispatch();
  /**
   * Api calls
   */
  const { mutate, isPending } = useSignUp();

  const { data, isPending:loader, } = useFetchCountries();

  const cities= data?.data



  /**
   * Form Instance
   */
  /*  const {
     register,
     handleSubmit,
     formState: { errors }
   }  */
  const form = useForm({
    // defaultValues: initialValue,
    resolver: yupResolver(signUpSchema),
  });

  /**
   * Submission Form
   */

  const onSubmit = (values) => {
    mutate(values, {
      onSuccess: (response) => {
        if (response.isSuccess) {
          setIsVerifyModalToggle({
            email: response?.data?.result?.email,
            password: response?.data?.result?.password,
          });
        }
      },
    });
  };

  return (
    <>
      {/* <VerifyUserModal
        modalToggle={isVerifyModalToggle}
        setModalToggle={setIsVerifyModalToggle}
      /> */}
      <form
        className="flex flex-col space-y-8 mt-10"
        onSubmit={form.handleSubmit(onSubmit)}
      >
        <Input form={form} name="name" title="Full Name" />
        <Input form={form} name="email" title="Email Address" />
        <Input form={form} name="contactNumber" title="Mobile No" />
       
       
        <DropDown
        form={form} 
        name="country"
        title="Country"
        cities={cities?.country} label="Select Country " className="w-[349px]"
        />
        
        <DropDown
        form={form} 
        title="Province"
        name="province"
        cities={cities?.province}
        label="Select Province / Region"
        className="w-[349px]"
         /> 
        <Input form={form} name="address" title="Address" />
        <Input type="password" form={form} name="password" title="Password" />
        <Input
          type="password"
          form={form}
          name="confirmPassword"
          title="Confirm Password"
        />

        <div className="pt-6 flex justify-center">
          <Button isPending={isPending} type="submit" className="w-full bg-cs-secondary">
            Sign Up
          </Button>
        </div>
      </form>


     
    </>
  );
};

export default SingUpForm;
