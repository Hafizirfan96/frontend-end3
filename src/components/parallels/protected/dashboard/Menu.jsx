import { bg } from "../../../../utils/themeColors";
import { FaEye, FaTrash } from "react-icons/fa6";
import { FaEdit } from "react-icons/fa";
import { useDispatch } from "react-redux";
import {
  toggleTaskDetailModalFn,
  toggleTaskDeleteModalFn,
  toggleTaskAddModalFn
} from "../../../../store/slices/templateSlice";
import { setTaskFn } from "../../../../store/slices/taskSlice";

const Menu = ({ isMenuOpen, task, history = false }) => {
  const dispatch = useDispatch();
  return (
    <>
      <div
        className={`${
          isMenuOpen ? "visible" : "hidden"
        } absolute -top-2 -right-32 ${bg} shadow-[0px_0px_15px_0px_rgba(0,0,0,.3)] rounded-md p-3 z-10
         before:content top-0 before:absolute before:border-t-[10px] 
         before:border-t-transparent before:border-b-[10px] before:border-b-transparent
          before:border-r-[10px] before:border-r-white  before:z-20 before:-left-2.5 `}
      >
        <ul>
          <li
            role="link"
            data-modal-target="default-modal"
            data-modal-toggle="default-modal"
            onClick={() => {
              dispatch(setTaskFn(task));
              dispatch(toggleTaskDetailModalFn(true));
            }}
            className={`cursor-pointer whitespace-nowrap py-1.5 border-b border-gray-200 font-semibold text-sm flex gap-2 items-center`}
          >
            <span>
              <FaEye />
            </span>
            View Detail
          </li>
          <li
            role="link"
            onClick={() => {
              if (!history) {
                dispatch(setTaskFn(task));
                dispatch(toggleTaskAddModalFn(true));
              }
            }}
            className={`${
              history ? "cursor-default" : "cursor-pointer"
            }   cursor-pointer whitespace-nowrap py-1.5 border-b border-gray-200 font-semibold text-sm flex gap-2 items-center`}
          >
            {history ? (
              <del className="flex gap-2 items-center ">
                <span>
                  <FaEdit />
                </span>{" "}
                Edit
              </del>
            ) : (
              <>
                <span>
                  <FaEdit />
                </span>{" "}
                Edit
              </>
            )}
          </li>
          <li
            role="link"
            onClick={() => {
              if (!history) {
                dispatch(setTaskFn(task));
                dispatch(toggleTaskDeleteModalFn(true));
              }
            }}
            className={`${
              history
                ? "cursor-default"
                : "cursor-pointer flex gap-2 items-center"
            }  cursor-pointer whitespace-nowrap py-1.5 border-b border-gray-200 font-semibold text-sm `}
          >
            {history ? (
              <del className="flex gap-2 items-center ">
                <span>
                  <FaTrash />
                </span>{" "}
                Delete
              </del>
            ) : (
              <>
                <span>
                  <FaTrash />
                </span>{" "}
                Delete
              </>
            )}
          </li>
        </ul>
      </div>
    </>
  );
};

export default Menu;
