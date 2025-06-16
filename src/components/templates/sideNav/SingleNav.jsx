import { NavLink } from "react-router-dom";
import Tooltip from "../Tooltip";
import { useDispatch } from "react-redux";
import { toggleNavFn } from "../../../store/slices/templateSlice";

const SingleNav = ({ singleData, toggleNav }) => {
  const linkStyle = `${
    toggleNav ? "pl-6  gap-x-4 w-full  text-2xl" : "justify-center text-3xl "
  } py-5 flex cursor-pointer items-center text-center truncate rounded-xl  px-6 font-semibold outline-none transition duration-300  hover:bg-slate-50 hover:text-cs-primary hover:outline-none focus:bg-slate-50 focus:text-inherit focus:outline-none motion-reduce:transition-none`;
  const linkActiveStyle = `${
    toggleNav ? "pl-6  gap-x-4 w-full text-2xl" : "justify-center text-3xl"
  } py-5 p-bg  text-center outline-none flex cursor-pointer font-semibold  items-center truncate rounded-xl  px-6  transition duration-300  motion-reduce:transition-none`;
  const dispatch = useDispatch();
  return (
    <li className="relative">
      <Tooltip
        message={singleData?.title}
        className={`left-28 top-2  ${
          !toggleNav ? "opacity-100 " : "opacity-0 pointer-events-none "
        } `}
      >
        <NavLink
          to={singleData?.url}
          style={{ overflow: "unset" }}
          className={({ isActive }) => (isActive ? linkActiveStyle : linkStyle)}
          onClick={() =>
            window.innerWidth < 1024 && dispatch(toggleNavFn(false))
          }
        >
          <span className="w-fit  ">{singleData?.logo}</span>
          <span
            className={`inline-block  ${
              toggleNav
                ? "opacity-100 w-auto ml-2"
                : "opacity-1 w-0 ml-0 hidden"
            }`}
          >
            {singleData?.title}
          </span>
        </NavLink>
      </Tooltip>
    </li>
  );
};

export default SingleNav;
