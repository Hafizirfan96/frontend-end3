import { useForm } from "react-hook-form";
import Modal from "./Modal";
import Button from "../Button";
import ComboBox from "../fields/ComboBox";
import useOptions from "../../../hooks/useOptions";
import { memo, useCallback, useEffect } from "react";
import { useFetchRoleDropdown } from "../../../services/queries/protected/role.queries";

const initialValue = {
    role: "",

}

const SubRoleFilterModal =({ isToggle, setToggle, onConfirm }) => {

    const { data: roles } = useFetchRoleDropdown();
    const roleList = roles?.data?.roles || [];
    const rolesOptions = useOptions(roleList, { value: "_id", title: "title" });

    const form = useForm({ defaultValues: initialValue })

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

                        <div className="grid grid-cols-1 md:grid-cols-1 xl:grid-cols-1 gap-x-5 gap-y-10 ">

                            <ComboBox
                                form={form}
                                name="role"
                                title="Role"
                                options={rolesOptions}
                                placeholder="Search"
                            />


                        </div>
                        <Button type="submit">Filter</Button>
                    </div>
                </form>
            </Modal>
        </>
    );
};

export default memo(SubRoleFilterModal);
