import { useState } from "react";
import NotificationCard from "./NotificationCard";
import PlusButton from "../PlusButton/PlusButton";
import Filter from "../Filter/Filter";

const NotificationModal = ({ isModalOpen }) => {
  const [notifications, setNotifications] = useState([
    {
      id: 1,
      title: "RIDER NEAR YOU",
      time: "3 MIN AGO",
      severity: "Incident - High severity",
      message:
        "Do ullamco ex velit anim do proident exercitation et anim tempor. Lorem sunt deserunt labore non excepteur...",
      iconColor: "blue-500",
      titleColor: "blue-600",
    },
    {
      id: 2,
      title: "DELIVERY DELAYED",
      time: "10 MIN AGO",
      severity: "Delivery Issue",
      message:
        "Your order is delayed due to heavy traffic. We apologize for the inconvenience.",
      iconColor: "red-500",
      titleColor: "red-600",
    },
    {
      id: 3,
      title: "NEW PROMOTION",
      time: "15 MIN AGO",
      severity: "Limited Offer",
      message:
        "Get 20% off on your next ride! Offer valid until midnight. Don't miss out on this exclusive deal!",
      iconColor: "green-500",
      titleColor: "green-600",
    },
  ]);

  const handleRemoveNotification = (id) => {
    setNotifications((prev) =>
      prev.filter((notification) => notification.id !== id)
    );
  };
  return (
    <div className="max-w-2xl mx-auto p-6 bg-white rounded-lg h-[80vh] flex flex-col">
      <h2 className="text-2xl font-semibold text-gray-800">Notifications</h2>

      <div className="flex-1 space-y-4 mt-4">
        {notifications.map((notification) => (
          <NotificationCard
            key={notification.id}
            title={notification.title}
            time={notification.time}
            severity={notification.severity}
            message={notification.message}
            iconColor={notification.iconColor}
            titleColor={notification.titleColor}
            onClose={() => handleRemoveNotification(notification.id)}
          />
        ))}
      </div>

      <div className="mt-4 flex justify-between">
        <button
          onClick={isModalOpen}
          className="bg-gray-800 text-white py-4 px-28 rounded-lg hover:bg-gray-700"
        >
          Clear All
        </button>
        <button className="bg-gray-800 text-white py-2 px-28 rounded-lg hover:bg-gray-700">
          See All
        </button>
      </div>
    </div>
  );
};

export default NotificationModal;
