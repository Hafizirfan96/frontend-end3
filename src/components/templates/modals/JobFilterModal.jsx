import { useForm } from "react-hook-form";
import FormSelect from "../fields/FormSelect";
import Modal from "./Modal";
import Button from "../Button";
import { useFetchJobDropdowns } from "../../../services/queries/protected/job.queries";
import ComboBox from "../fields/ComboBox";
import useOptions from "../../../hooks/useOptions";
import { useCallback, useEffect } from "react";
import { useFetchAddressDropdown } from "../../../services/queries/protected/province.queries";

const initialValue = {
    Lawyer: "",
    Client: "",
    documentType: "",
    deliveryType: "",
    paperType: "",
    statue: "",

}

const JobFilterModal = ({ isToggle, setToggle, onConfirm }) => {

    const { data: jobDropdowns, refetch: jobDropdownsRefech } = useFetchJobDropdowns();
    const { data: addressDropdowns, refetch: addressDropdownsRefech } = useFetchAddressDropdown();
    const dropdowns = jobDropdowns?.data?.details;
const cityList = addressDropdowns?.data?.city
    const clientOptions = useOptions(dropdowns?.clients, {
        value: "_id",
        title: "name"
    });
    const lawyerOptions = useOptions(dropdowns?.lawyers, {
        value: "_id",
        title: "name"
    });
    const documentTypeOptions = useOptions(dropdowns?.documentType);
    // const deliveryTypeOptions = useOptions(dropdowns?.deliveryType);
    const paperTypeOptions = useOptions(dropdowns?.paperType);
    const cityListptions = useOptions(cityList,{value:"title",title:"title"});


    const form = useForm({ defaultValues: initialValue })

    const filterHandler = (values) => {
        onConfirm(values)
        setToggle(null)
    }
    const onCloseHandler = () => {
        setToggle(null)
    }

    

    const apijobDropdownsRefetch = useCallback(() => {
        jobDropdownsRefech();
    }, [jobDropdownsRefech]);
    useEffect(() => {
        addressDropdownsRefech()
        apijobDropdownsRefetch();
    }, [apijobDropdownsRefetch]);

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

                            <ComboBox
                                form={form}
                                name="Lawyer"
                                title="Lawyer"
                                options={lawyerOptions}
                                placeholder="Search"
                            />

                            <ComboBox
                                form={form}
                                name="Client"
                                title="Client"
                                options={clientOptions}
                                placeholder="Search"
                            />

                            <ComboBox
                                title="Document Type"
                                form={form}
                                name="documentType"
                                options={documentTypeOptions}
                                placeholder="Search"
                            />
                            <ComboBox
                                title="City"
                                form={form}
                                name="city"
                                options={cityListptions}
                                placeholder="Search"
                            />

                            {/* <ComboBox
                                form={form}
                                name="deliveryType"
                                title="Delivery Type"
                                options={deliveryTypeOptions}
                                placeholder="Search"
                            /> */}
                             {/* <ComboBox
                                form={form}
                                name="status"
                                title="Paper Type"
                                options={paperTypeOptions}
                                placeholder="Search"
                            /> */}
                           {/* <ComboBox
                                form={form}
                                name="paperType"
                                title="Paper Type"
                                options={paperTypeOptions}
                                placeholder="Search"
                            /> */}
                        </div>
                        <Button type="submit">Filter</Button>
                    </div>
                </form>
            </Modal>
        </>
    );
};

export default JobFilterModal;
