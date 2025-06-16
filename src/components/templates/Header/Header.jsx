import { useSelector } from "react-redux";
import { useEffect, useRef, useState } from "react";
import { FaAngleDown, FaRegBell } from "react-icons/fa6";
import ToggleButton from "./ToggleButton";
import ProfileDropdown from "./ProfileDropdown";

const Header = () => {
  const { currentUser } = useSelector((state) => state.users);

  const [toggleDropdown, setToggleDropdown] = useState(false);


  const dropdownRef = useRef(null);

  const handleClickOutside = (event) => {
    if (dropdownRef.current && !dropdownRef.current.contains(event.target)) {
      setToggleDropdown(false);

    }
  };


  useEffect(() => {
    document.addEventListener("mousedown", handleClickOutside);
    return () => {
      document.removeEventListener("mousedown", handleClickOutside);
    };
  }, []);



 





  return (
    <div
      className={`  f-bg flex justify-between sm:items-center gap-3  shadow-[0_4px_12px_0_rgba(0,0,0,0.07),_0_2px_4px_rgba(0,0,0,0.05)]  px-3 w-full py-3
    `}
    >
      <ToggleButton className={`text-4xl`} />
      {/* Toggler */}
      <div className="flex items-center gap-3">
        {/* Notification */}
        <div
         
          className="relative rounded-full border-2 border-cs-light-gray p-3 cursor-pointer w-fit"
        >
          <span className="w-4 h-4 bg-red-500 top-0 right-0 absolute rounded-full "></span>
          <FaRegBell className="text-3xl" />
          
        </div>

        <div
          className="flex items-center gap-3 relative cursor-pointer"
          onClick={(e) => {
            e.stopPropagation();
            setToggleDropdown((prev) => !prev);
          }}
        >
          {/* Profile */}
          <div ref={dropdownRef}
            // onClick={toggleDropdownHandler}
          >
            <ProfileDropdown
              currentUser={currentUser}
              toggleDropdown={toggleDropdown}
            />
          </div>
          {/* <div
            className={`absolute  cursor-default right-0 -bottom-40 space-y-5 p-8 rounded-xl min-w-72 gap-3 text-xl font-semibold bg-cs-white dark:bg-cs-black transition-all duration-300 ${
              toggleDropdown
                ? "translate-y-0 opacity-100"
                : "translate-y-full opacity-0 hidden"
            }`}
            onClick={(e) => e.stopPropagation()}
          >
            <Link
              onClick={() => setToggleDropdown(() => false)}
              to="/user/profile"
            >
              Profile
            </Link>
            <div
              onClick={() => {
                logoutMutate({ id: currentUser?._id });
                setToggleDropdown(() => false);
              }}
              className="cursor-pointer"
            >
              Logout
            </div>
            <div
              onClick={() => setToggleDropdown(() => false)}
              className="cursor-pointer"
            >
              Support
            </div>
          </div> */}
          {currentUser?.profilePicture ?
            <img src={currentUser?.profilePicture} className="w-14 h-14 bg-gray-300 rounded-full" alt="profile_img" /> :
            <div className="w-14 h-14 bg-gray-300 rounded-full"></div>
          }
          <div>
            <div className="text-xl font-semibold text-nowrap flex items-center gap-x-5">
              {currentUser?.name}{" "}
              <span>
                <FaAngleDown />
              </span>{" "}
            </div>
            <div className="text-xl font-semibold text-cs-light">
              {currentUser?.SubRole?.title}
            </div>
          </div>
        </div>
      </div>
      {/* <ProfileDropdown /> */}
    </div>
  );
};

export default Header;
