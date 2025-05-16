import { Link } from "react-router-dom";
import NotificationRow from "./NotificationRow";
import {  useFetchNotificationDropdown } from "../../../services/queries/protected/notification.queries";
import NotificationSkeleton from "../skeleton/NotificationSkeleton";

const NotificationDropdown = ({ isDropdownOpen }) => {
  const { data: notificationData, isPending: isNotificationPending } =
  useFetchNotificationDropdown({ currentPage: 1, perPage: 5 });
  const notificationList =
    (Array.isArray(notificationData?.data?.notifications?.data) &&
      notificationData?.data?.notifications?.data) ||
    [];
  return (
    <div
      id="dropdownNotification"
      className={`absolute min-w-96 right-0 top-16  z-20 shadow-basic ${
        isDropdownOpen
          ? "opacity-100 max-h-fit visible"
          : "opacity-0 max-h-0 invisible "
      } duration-500 overflow-hidden  max-w-sm bg-white divide-y divide-gray-100 rounded-lg  dark:bg-gray-800 dark:divide-gray-700`}
      aria-labelledby="dropdownNotificationButton"
    >
      <div className="block px-4 py-2 font-medium text-2xl text-center text-gray-700 rounded-t-lg bg-gray-50 dark:bg-gray-800 dark:text-white">
        Notifications
      </div>
      <ul className="divide-y divide-gray-100 dark:divide-gray-700 max-h-96 overflow-y-auto">
        {isNotificationPending?<NotificationSkeleton/>: notificationList.length > 0
          ? notificationList.map((notification) => (
              <NotificationRow
                key={notification._id}
                notification={notification}
              />
            ))
          : null}
      </ul>
      <Link
        to="/notifications"
        className="block py-2 text-sm font-medium text-center text-gray-900 rounded-b-lg bg-gray-50 hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-white"
      >
        <div className="inline-flex items-center ">
          <svg
            className="w-4 h-4 me-2 text-gray-500 dark:text-gray-400"
            aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg"
            fill="currentColor"
            viewBox="0 0 20 14"
          >
            <path d="M10 0C4.612 0 0 5.336 0 7c0 1.742 3.546 7 10 7 6.454 0 10-5.258 10-7 0-1.664-4.612-7-10-7Zm0 10a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z" />
          </svg>
          View all
        </div>
      </Link>
    </div>
  );
};

export default NotificationDropdown;
