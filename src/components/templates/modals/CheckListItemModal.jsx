import Modal from "./Modal";
import Button from "../Button";
import { useCallback, useEffect, useState } from "react";

const CheckBox = ({ title, onChange, check }) => (
  <div className="flex items-center gap-3 ">
    <input
      type="checkbox"
      name={title}
      id={title}
      value={title}
      checked={check}
      onChange={onChange}
    />
    <label id={title} className="capitalize text-xl">
      {title}
    </label>
  </div>
);

const CheckListItemModal = ({
  modalToggle,
  setModalToggle,
  onSetCheckListItems,
  checkList,
  checkListItemss
}) => {
  const [checkListItems, setCheckListItems] = useState([]);

  const checkListHandler = (e) => {
    let oldCheckListItems = [...checkListItems];
    const id = e.target.name?.toString();
    const check = e.target.checked;
    const find = oldCheckListItems.find((x) => x == id);
    if (find && check == false)
      oldCheckListItems = oldCheckListItems.filter((x) => x != id);
    else oldCheckListItems = [...oldCheckListItems, id];
    setCheckListItems([...oldCheckListItems]);
  };
  const updateCheckList = useCallback(() => {
    if (Array.isArray(checkListItemss)) {
      setCheckListItems([...checkListItemss]);
    }
  }, [checkListItemss]);
  useEffect(() => {
    updateCheckList();
  }, [updateCheckList]);


  return (
    <Modal
      title="Check List Item "
      isVisible={modalToggle}
      isOverlayStatic={false}
      onClickFn={() => {
        setCheckListItems(checkListItemss)  
        setModalToggle(false)
      }}
    >
      <div className="py-5 space-y-10">
        <div className="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-5 ">
          {Array.isArray(checkList) &&
            checkList.map((x) => {
              const check = checkListItems?.find((y) => {
                return x.title == y;
              })
                ? true
                : false;
              return (
                <CheckBox
                  key={x?._id}
                  title={x?.title}
                  check={check}
                  onChange={checkListHandler}
                />
              );
            })}
        </div>
        <div className="flex justify-end">
          <Button
            onClick={() => {
              onSetCheckListItems(checkListItems);
              setModalToggle(null);
            }}
            className="!py-4"
          >
            Confirm
          </Button>
        </div>
      </div>
    </Modal>
  );
};

export default CheckListItemModal;
