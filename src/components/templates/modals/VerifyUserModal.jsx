import { useForm } from "react-hook-form";
import Button from "../Button";
import Input from "../fields/Input";
import Modal from "./Modal";
import {
  useVerifyUser
} from "../../../services/queries/auth/auth.queries";
import { yupResolver } from "@hookform/resolvers/yup";
import userVerifySchema from "../../../validationSchema/auth/userVerifySchema";

const initialValues = {
  otpNumber: "",
  otpEmail: ""
};

const VerifyUserModal = ({ modalToggle, setModalToggle }) => {
  const { mutate: verifyUserMutate, isPending: verifyUserIsPending } =
    useVerifyUser();
  const form
    // {
    //   formState: { errors },
    //   register,
    //   handleSubmit
    // }
    = useForm({
      defaultValues: initialValues,
      resolver: yupResolver(userVerifySchema)
    });

  const submitHandler = (values) => {
    values.email = modalToggle?.email;

    verifyUserMutate(values, {
      onSuccess: (response) => {


        if (response.isSuccess) {
          //   loginMutate(modalToggle);
        }
      }
    });
  };

  return (
    <Modal
      title="Verify User"
      isVisible={modalToggle}
      isOverlayStatic={false}
      onClickFn={() => {
        setModalToggle(false);
      }}
    >
      <form
        className="flex flex-col space-y-8 mt-10 px-10 pb-10"
        onSubmit={form.handleSubmit(submitHandler)}
      >
        <Input
          type="number"
          form={form}
          name="otpNumber"

          title="Mobile OTP"
        />
        <Input
          type="number"
          form={form}
          name="otpEmail"
          title="Email OTP"
        />

        <div className="pt-6 flex justify-center">
          <Button
            isPending={verifyUserIsPending}
            type="submit"
            className="w-full !rounded-full"
          >
            Verify
          </Button>
        </div>
      </form>
    </Modal>
  );
};

export default VerifyUserModal;
