import { Link } from "react-router-dom";

import Logo from "../Logo";
import { useDispatch, useSelector } from "react-redux";
import useSideNav from "../../../hooks/useSideNav";
import DropdownNav from "./DropdownNav";
import { useState } from "react";
import SingleNav from "./SingleNav";

import ThemeMode from "../ThemeMode";
import ToggleButton from "../Header/ToggleButton";
import Overlay from "../Overlay";
import { toggleNavFn } from "../../../store/slices/templateSlice";

const SideNav = () => {
  const navList = useSideNav();
  console.log("nav----",navList)

  // const dispatch = useDispatch();

  const { toggleNav } = useSelector((state) => state.templates);
  const [dropdownId, setDropdownId] = useState("");
  const dropdownHandler = (id) => {
    if (id === dropdownId) setDropdownId("");
    else setDropdownId(id);
  };
  const dispatch = useDispatch();
  return (
    <>
      <Overlay
        toggleNav={toggleNav}
        toggleFn={() => dispatch(toggleNavFn(false))}
        className="lg:hidden visible"
      />
      <nav
        className={` top-0 left-0 transition-all duration-300    z-30  h-full f-bg  ${
          !toggleNav ? "w-28 " : "fixed w-[27rem]"
        } fixed  flex flex-col justify-between  shadow-[0_4px_12px_0_rgba(0,0,0,0.07),_0_2px_4px_rgba(0,0,0,0.05)] `}
      >
        <div className="w-full">
          <div
            className={` flex items-center justify-center  py-4 outline-none rounded-br-[50px]  ${
              toggleNav ? "" : "flex-col gap-4"
            }`}
          >
            {toggleNav && (
              <ToggleButton
                isIconClose={true}
                className={`text-4xl absolute visible lg:hidden  top-10 right-10 duration-300`}
              />
            )}
            <Link to="/">
              <div className={`px-2 ${!toggleNav ? "pt-0" : "pt-0"} `}>
                <Logo withSlogan={true} />
              </div>
              {/* <h2 className={`text-lg font-bold ${text1}`}>Wrike Board</h2> */}
            </Link>
          </div>

          <ul className={`mt-5 px-3 ${toggleNav ? " space-y-2" : ""}`}>
            {navList.map((n, i) => {
              return n && Object?.hasOwnProperty.call(n, "dropdown") ? (
                <DropdownNav
                  dropdownData={n}
                  isOpen={n.id === dropdownId}
                  onClick={dropdownHandler}
                  key={i}
                  toggleNav={toggleNav}
                />
              ) : (
                <SingleNav toggleNav={toggleNav} singleData={n} key={i} />
              );
            })}
          </ul>
        </div>
        <ThemeMode />
      </nav>
    </>
  );
};

export default SideNav;
