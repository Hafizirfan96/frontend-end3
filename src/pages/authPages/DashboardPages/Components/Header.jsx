import logo from "@/assets/logo.png";
import CmSb from "@/assets/Maryam_Nawaz_CM .png";
import { NavLink, useNavigate } from "react-router-dom";

const Header = () => {
  const navigate = useNavigate();

  const navigateToHomeScreen = () => {
    navigate("/");
  };

  return (
    <>
      <div className="w-full py-2 bg-[#004614]">
        {/* Center title for all screen sizes */}
        <div className="flex justify-center items-center mt-4 text-center px-4">
          <h3 className="text-white text-xl md:text-2xl lg:text-[25px]">
            Punjab Skills Information System (PSIS)
          </h3>
        </div>

        {/* Responsive layout container */}
        <div className="flex flex-col md:flex-row justify-between items-center w-full px-4 md:px-20">
          {/* Left Logo and Title */}
          <div
            className="flex flex-col md:flex-row items-center cursor-pointer mt-4 md:mt-0"
            onClick={navigateToHomeScreen}
          >
            <img src={logo} className="h-32 object-contain" alt="Logo" />

            <div>
              <h3 className="text-[12px] text-white ml-4">
                <h3 className="text-[30px]">Skills Punjab</h3>
                Skill Development & Entrepreneurship Department
              </h3>
            </div>
          </div>

          {/* Right Side Logo */}
          <div className="mt-4 md:mt-0">
            <img
              src={CmSb}
              // className="h-16 md:h-20 object-contain"
              className="img-fluid img-logo h-[80px] object-contain"
              alt="Logo"
            />
          </div>
        </div>
      </div>

      <nav className="bg-white mt-4 py-6">
        <div className="flex justify-evenly">
          {/* Home */}
          <NavLink
            to="/"
            className="w-40 h-32 flex flex-col items-center justify-center p-3 rounded-xl cursor-pointer transition hover:bg-gray-100"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="30"
              height="30"
              viewBox="0 0 24 24"
              fill="none"
              stroke="#038837"
              strokeWidth="2"
              strokeLinecap="round"
              strokeLinejoin="round"
              className="mb-1"
            >
              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
              <path d="M5 12l-2 0l9 -9l9 9l-2 0"></path>
              <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
              <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
            </svg>
            <h3 className="text-[13px] text-[#038837]">Home</h3>
          </NavLink>

          <div className="relative group w-40 h-32">
            <NavLink
              to="/about-us"
              className="w-full h-full flex flex-col items-center justify-center p-3 rounded-xl cursor-pointer transition hover:bg-gray-100"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="30"
                height="30"
                viewBox="0 0 24 24"
                fill="none"
                stroke="#038837"
                strokeWidth="2"
                strokeLinecap="round"
                strokeLinejoin="round"
                className="mb-1"
              >
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
              </svg>
              <h3 className="text-[13px] text-[#038837]">About Us</h3>
            </NavLink>

            {/* Submenu */}
            <div className="absolute left-0 top-full w-40 bg-white border rounded shadow-md opacity-0 invisible group-hover:visible group-hover:opacity-100 transition-all z-10">
              <NavLink
                to="/about-us/formation"
                className="block px-4 py-2 text-xl text-gray-700 hover:bg-gray-100"
              >
                Formation
              </NavLink>
              <NavLink
                to="/about-us/psid"
                className="block px-4 py-2 text-xl text-gray-700 hover:bg-gray-100"
              >
                PSID
              </NavLink>
            </div>
          </div>

          <div className="relative group w-40 h-32">
            <NavLink
              to="/tevta-page"
              className="w-full h-full flex flex-col items-center justify-center  rounded-xl cursor-pointer transition hover:bg-gray-100"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="30"
                height="30"
                viewBox="0 0 24 24"
                fill="none"
                stroke="#038837"
                strokeWidth="2"
                strokeLinecap="round"
                strokeLinejoin="round"
                className="mb-1"
              >
                <path d="M5 8h14v2H5z" />
                <path d="M5 12h14v2H5z" />
                <path d="M5 16h14v2H5z" />
              </svg>
              <h3 className="text-[13px] text-[#038837]">TVET Bodies</h3>
            </NavLink>

            {/* Submenu */}
            <div className="absolute left-0 top-full w-40 bg-white border rounded shadow-md opacity-0 invisible group-hover:visible group-hover:opacity-100 transition-all z-10">
              <NavLink
                to="/tevta-page"
                className="block px-4 py-2 text-xl text-gray-700 hover:bg-gray-100"
              >
                TEVTA
              </NavLink>
              <NavLink
                to="/TVET-bodies/PVTC"
                className="block px-4 py-2 text-xl text-gray-700 hover:bg-gray-100"
              >
                PVTC
              </NavLink>
              <NavLink
                to="/TVET-bodies/PSDA"
                className="block px-4 py-2 text-xl text-gray-700 hover:bg-gray-100"
              >
                PSDA
              </NavLink>
              <NavLink
                to="/TVET-bodies/PSDF"
                className="block px-4 py-2 text-xl text-gray-700 hover:bg-gray-100"
              >
                PSDF
              </NavLink>
              <NavLink
                to="/TVET-bodies/PBTE"
                className="block px-4 py-2 text-xl text-gray-700 hover:bg-gray-100"
              >
                PBTE
              </NavLink>
            </div>
          </div>

          <NavLink
            to="/institutes"
            className="w-40 h-32 flex flex-col items-center justify-center p-3 rounded-xl cursor-pointer transition hover:bg-gray-100"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="30"
              height="30"
              viewBox="0 0 24 24"
              fill="none"
              stroke="#038837"
              strokeWidth="2"
              strokeLinecap="round"
              strokeLinejoin="round"
              className="mb-1"
            >
              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
              <path d="M3 21l18 0"></path>
              <path d="M3 10l18 0"></path>
              <path d="M5 6l7 -3l7 3"></path>
              <path d="M4 10l0 11"></path>
              <path d="M20 10l0 11"></path>
              <path d="M8 14l0 3"></path>
              <path d="M12 14l0 3"></path>
              <path d="M16 14l0 3"></path>
            </svg>
            <h3 className="text-[13px] text-[#038837]">Institutes</h3>
          </NavLink>

          {/* Jobs */}
          <NavLink
            to="/jobs"
            className="w-40 h-32 flex flex-col items-center justify-center p-3 rounded-xl cursor-pointer transition hover:bg-gray-100"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="28"
              height="28"
              fill="none"
              stroke="#038837"
              strokeWidth="2"
              strokeLinecap="round"
              strokeLinejoin="round"
              className="mb-1"
            >
              <rect x="2" y="7" width="20" height="14" rx="2" ry="2" />
              <path d="M16 3h-8v4h8V3z" />
            </svg>
            <h3 className="text-[13px] text-[#038837]">Jobs</h3>
          </NavLink>

          {/* <NavLink
            to="/jobs"
            className="w-40 h-32 flex flex-col items-center justify-center p-3 rounded-xl cursor-pointer transition hover:bg-gray-100"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="28"
              height="28"
              fill="none"
              stroke="#038837"
              strokeWidth="2"
              strokeLinecap="round"
              strokeLinejoin="round"
              className="mb-1"
            >
              <rect x="2" y="7" width="20" height="14" rx="2" ry="2" />
              <path d="M16 3h-8v4h8V3z" />
            </svg>
            <h3 className="text-[13px] text-[#038837]">Placements</h3>
          </NavLink> */}

            <div className="relative group w-40 h-32">
            <NavLink
              to="/about-us"
              className="w-full h-full flex flex-col items-center justify-center p-3 rounded-xl cursor-pointer transition hover:bg-gray-100"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="30"
                height="30"
                viewBox="0 0 24 24"
                fill="none"
                stroke="#038837"
                strokeWidth="2"
                strokeLinecap="round"
                strokeLinejoin="round"
                className="mb-1"
              >
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
              </svg>
              <h3 className="text-[13px] text-[#038837]">Opportunities</h3>
            </NavLink>

            {/* Submenu */}
            <div className="absolute left-0 top-full w-40 bg-white border rounded shadow-md opacity-0 invisible group-hover:visible group-hover:opacity-100 transition-all z-10">
              <NavLink
                to="/about-us/formation"
                className="block px-4 py-2 text-xl text-gray-700 hover:bg-gray-100"
              >
                For Employers
              </NavLink>
              <NavLink
                to="/about-us/psid"
                className="block px-4 py-2 text-xl text-gray-700 hover:bg-gray-100"
              >
                For Graduates
              </NavLink>
            </div>
          </div>
          

          <NavLink
            to="/contact-us"
            className="w-40 h-32 flex flex-col items-center justify-center p-3 rounded-xl cursor-pointer transition hover:bg-gray-100"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              viewBox="0 0 24 24"
              fill="none"
              stroke="#038837"
              strokeWidth="2"
              strokeLinecap="round"
              strokeLinejoin="round"
              className="mb-1"
            >
              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
              <path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2"></path>
              <path d="M15 7a2 2 0 0 1 2 2"></path>
              <path d="M15 3a6 6 0 0 1 6 6"></path>
            </svg>
            <h3 className="text-[13px] text-[#038837]">Contact Us</h3>
          </NavLink>
        </div>
      </nav>
    </>
  );
};

export default Header;
