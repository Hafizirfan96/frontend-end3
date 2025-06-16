import { useEffect } from "react";
import { Link, useNavigate } from "react-router-dom";
import { useLogout } from "../../../services/queries/auth/auth.queries";
import { CURRENT_USER_STORAGE_KEY } from "../../../config";

const ProfileDropdown = ({ toggleDropdown, currentUser }) => {
  const { mutate: logoutMutate, data: logoutData } = useLogout();
  const navigate = useNavigate();

  useEffect(() => {
    if (logoutData?.isSuccess) {
      localStorage.removeItem(CURRENT_USER_STORAGE_KEY);
      navigate("/auth/sign-in");
    }
  }, [logoutData, navigate]);
  return (
    <>
      {/* Dropdown menu */}
      <div
        // onClick={(e) => e.stopPropagation()}
        className={`z-50 right-0 top-14 absolute  my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600 
            ${
              toggleDropdown
                ? "opacity-100 max-h-fit visible"
                : "opacity-0 max-h-0 invisible "
            }`}
        id="user-dropdown"
      >
        <Link
              to="/user/profile"
        className="px-4 py-3 block">
          <span className="block text-xl font-semibold text-gray-900 dark:text-white">
            {currentUser?.name}
          </span>
          <span className="block text-xl  text-gray-500 truncate dark:text-gray-400">
            {currentUser?.email}
          </span>
        </Link>
        <ul className="py-2" aria-labelledby="user-menu-button">
          <li>
            <Link
              to="/"
              className="block px-4 py-2 text-xl text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
            >
              Dashboard
            </Link>
          </li>
          <li>
            <Link
              to="/user/profile"
              className="block px-4 py-2 text-xl text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
            >
              Profile
            </Link>
          </li>
          <li>
            <Link
              to="/vault"
              className="block px-4 py-2 text-xl text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
            >
              Account
            </Link>
          </li>
          <li>
            <div
              onClick={() => logoutMutate({ id: currentUser?._id })}
              className="block px-4 py-2 text-xl text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
            >
              Sign out
            </div>
          </li>
        </ul>
      </div>
      <button
        data-collapse-toggle="navbar-user"
        type="button"
        className="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
        aria-controls="navbar-user"
        aria-expanded="false"
      >
        <span className="sr-only">Open main menu</span>
        <svg
          className="w-5 h-5"
          aria-hidden="true"
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 17 14"
        >
          <path
            stroke="currentColor"
            strokeLinecap="round"
            strokeLinejoin="round"
            strokeWidth={2}
            d="M1 1h15M1 7h15M1 13h15"
          />
        </svg>
      </button>
    </>
  );
};

export default ProfileDropdown;
