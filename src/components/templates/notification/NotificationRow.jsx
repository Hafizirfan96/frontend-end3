import { Link } from "react-router-dom";
import { truncateText } from "../../../utils/helper";
// import TimeAgoConvert from "../TimeAgoConvert";

const NotificationRow = ({ notification }) => {
  return (
    <li className="flex px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-700">
      {/* <div className="flex-shrink-0">
        <img
          className="rounded-full w-11 h-11"
          src="/docs/images/people/profile-picture-1.jpg"
          alt="Jese image"
        />
      </div> */}
       <Link className="w-full space-y-2 ps-3" to={`/jobs/single`} state={notification.data}>
        <h4 className="text-lg font-semibold">{notification.subject}</h4>
        <div className="text-gray-500 text-lg mb-1.5 dark:text-gray-400  ">
          {truncateText(notification.message, 50)}
        </div>
        <div className="text-base text-nowrap text-blue-600 dark:text-blue-500">
          {/* <TimeAgoConvert convertedDate={"2/2/2000"} /> a few moments ago */}
        </div>
      </Link>
    </li>
  );
};

export default NotificationRow;
