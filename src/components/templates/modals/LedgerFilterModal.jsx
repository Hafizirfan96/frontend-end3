import { useForm } from "react-hook-form";
import Modal from "./Modal";
import Button from "../Button";
import FormInput from "../fields/FormInput";




const LedgerFilterModal = ({ isToggle, setToggle, onConfirm }) => {


    const form = useForm()


    const filterHandler = (values) => {
        onConfirm(values)
        setToggle(null)
    }
    const onCloseHandler = () => {
        setToggle(null)
    }

    return (
        <>
            <Modal
                title={"Job Filters"}
                isVisible={isToggle}
                onClickFn={onCloseHandler}
                mainClass="!z-50 min-w-full sm:min-w-0 sm:w-[80rem] xl:w-[100rem]"
                overlayClass="!z-[41]"
            >

                <form onSubmit={form.handleSubmit(filterHandler)}>
                    <div className="p-4 md:p-5 text-end space-y-10 ">

                        <div className="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-2 gap-x-5 gap-y-10 ">
                            <FormInput form={form} name="orderNumber" title="Order number" type="number" />
                        </div>
                        <Button type="submit">Filter</Button>
                    </div>
                </form>
            </Modal>
        </>
    );
};

export default LedgerFilterModal;
