import React from "react";

const GrowthSectorTitle = ({ icon, title }) => {
  return (
    <div className="flex items-center pt-8">
      <div className=" ml-16 ">{icon}</div>
      <h2 className="text-[23px] font-semibold ml-3 text-white ">{title}</h2>
    </div>
  );
};

export default GrowthSectorTitle;
