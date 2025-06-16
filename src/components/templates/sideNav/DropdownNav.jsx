import { BiChevronRight } from "react-icons/bi";
import { motion } from "framer-motion";
import SingleNav from "./SingleNav";
import Tooltip from "../Tooltip";

const list = {
  visible: { opacity: 1, height: "auto" },
  hidden: { opacity: 0, height: 0, transition: { delay: 0.2 } }
};

const DropdownNav = ({ onClick, toggleNav, dropdownData, isOpen }) => {
  return (
    <li className="relative  ">
       <Tooltip
        message={dropdownData?.title}
        className={`left-28 top-2  ${
          !toggleNav ? "opacity-100 " : "opacity-0 pointer-events-none "
        } `}
        parentClass={"block"}
      >
      <div
        // to=""
        className={`${toggleNav ? "pl-6  gap-x-4 w-full  text-2xl" : "justify-center text-3xl "
          } py-5 flex cursor-pointer items-center text-center truncate rounded-xl w-full  px-6 font-semibold outline-none transition duration-300  hover:bg-slate-50 hover:text-cs-primary hover:outline-none focus:bg-slate-50 focus:text-inherit focus:outline-none motion-reduce:transition-none`}
        onClick={() => {
          onClick(dropdownData.id);
        }}
      >
        {/* <span className="mr-4 text-[0.8rem] ">{dropdownData?.logo}</span> */}
        <span className=" flex justify-between items-center w-full ">
          <span className=" flex  gap-x-6  items-cente w-full">
            <span className="w-fit  ">{dropdownData?.logo}</span>
            <span
            className={`inline-block  ${
              toggleNav
                ? "opacity-100 w-auto ml-2"
                : "opacity-1 w-0 ml-0 hidden"
            }`}
          >
            {dropdownData?.title}
          </span>
          </span>
          <span
            className={`duration-300 text-xl ${isOpen ? "rotate-90" : "rotate-0"
              }`}
          >
            <BiChevronRight />
          </span>
        </span>
      </div>
      </Tooltip>
      <motion.ul
        initial="hidden"
        animate={isOpen ? "visible" : "hidden"}
        variants={list}
      >
        {dropdownData?.dropdown?.map((x, i) => {
          return <SingleNav toggleNav={toggleNav} singleData={x} key={i} />;
        })}
      </motion.ul>
      
    </li>
  );
};

export default DropdownNav;
