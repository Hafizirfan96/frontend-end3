import { useMemo } from "react";
import { SERVER_PATH_WITHOUT_API } from "../../../config";
import PdfPreview from "../PdfPreview";
import Modal from "./Modal";
import { FaCheckSquare, FaRegClock } from "react-icons/fa";

const CheckListModal = ({ modalToggle, setModalToggle }) => {


    return (
        <Modal
            title="Check Lit "
            isVisible={modalToggle}
            onClickFn={() => setModalToggle(false)}
        >
            <div className="flex flex-col justify-between h-full">

                <div className="grid grid-cols-2 md:grid-cols-3 gap-5">
                    {Array.isArray(modalToggle) &&
                        modalToggle.map((item) => {
                            return <div key={item?._id} className="flex items-center text-xl font-semibold capitalize gap-3">
                                {item?.complete
                                    ? <FaCheckSquare className={`${item?.complete ? "p-text" : "text-gray-400"} text-3xl`} />
                                    : <FaRegClock className={`${item?.complete ? "p-text" : "text-gray-400"} text-3xl`} />} {item?.title}
                            </div>

                        })}
                </div>
                
            </div>
        </Modal>
    );
};

export default CheckListModal;
