import { useDispatch, useSelector } from "react-redux";
import { FaBars, FaX } from "react-icons/fa6";
import { toggleNavFn } from "../../../store/slices/templateSlice";

const ToggleButton = ({ className, isIconClose }) => {
  const dispatch = useDispatch();
  const { toggleNav } = useSelector((state) => state.templates);
  return (
    <button
      className={` inline-block  font-medium uppercase leading-tight h-text transition duration-300  focus:outline-none focus:ring-0 ${className}`}
      onClick={() => dispatch(toggleNavFn(!toggleNav))}
    >
      {isIconClose ? <FaX /> : <FaBars />}
    </button>
  );
};

export default ToggleButton;
