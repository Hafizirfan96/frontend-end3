import React from "react";

const IndustoryInfoCard = ({title, icon,onClick}) => {


  return (
    <div  onClick={onClick} className="bg-white cursor-pointer shadow-md rounded-2xl p-16 hover:shadow-xl transition duration-300 text-center">
      <div className="flex flex-col items-center">
       {icon}
        <h3 className="text-3xl font-bold text-gray-800 mt-4">
          {title}
          </h3>
      </div>
    </div>
  );
};

export default IndustoryInfoCard;
