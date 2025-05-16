
import UserForm from "../../parallels/protected/user/UserForm";
import Modal from "./Modal";

const EditProfileModal = ({ modalToggle, setModalToggle }) => {
    return (
        <Modal
            mainClass="xl:min-w-[900px] "
            title="Edit Profile"
            isVisible={modalToggle}
            onClickFn={() => setModalToggle(false)}
        >
            <UserForm data={modalToggle} setModalToggle={setModalToggle} />
        </Modal>
    );
};

export default EditProfileModal;
