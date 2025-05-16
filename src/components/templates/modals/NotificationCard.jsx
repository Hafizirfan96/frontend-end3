import React from "react";

const NotificationCard = ({
  title,
  time,
  severity,
  message,
  onClose,
  iconColor,
  titleColor,
}) => {
  return (
    <div
      className={`relative flex items-start bg-white shadow-md z-[999] rounded-lg p-4 border-l-4 border-${iconColor}`}
    >
      <div className={`text-${iconColor} text-xl`}>ⓘ</div>
      <div className="ml-3 flex-1">
        <div className="flex justify-between">
          <div>
            <span className={`text-${titleColor}`}>{title}</span>
            <span className="text-gray-600 ml-4">• {time}</span>
          </div>
          <button
            onClick={onClose}
            className="text-gray-400 hover:text-gray-600"
          >
            ✕
          </button>
        </div>
        <div className="flex">
          <p className="font-bold text-gray-800 mt-1">{severity}</p>
        </div>
        <p className="text-gray-600 text-sm mt-3">{message}</p>
      </div>
    </div>
  );
};

export default NotificationCard;
