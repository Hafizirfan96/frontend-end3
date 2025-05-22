import React from "react";

const GrowthSectorTitle = ({ icon, title, description1, description2 }) => {
  return (
    <>
      <div className="flex items-center pt-8">
        <div className=" ml-16 ">{icon}</div>
        <h2 className="text-[23px] font-semibold ml-3 text-white ">{title}</h2>
      </div>
      {description1 !="" && description2 !="" ? <div className="flex px-16  py-8">
        <div className="w-1/2 p-4">
          <h3
            className=" text-2xl text-white"
            style={{
              textAlign: "justify",
              textJustify: "inter-word",
            }}
          >
            {description1}
          </h3>
        </div>
        <div className="w-1/2 p-4">
          <h3
            className="text-2xl text-white"
            style={{
              textAlign: "justify",
              textJustify: "inter-word",
            }}
          >
            {description2}
          </h3>
        </div>
      </div>: null }
      <div className="flex px-16  py-8">
          <div className=" p-4">
            <h3
              className=" text-2xl text-white"
            >
             {description1}
            </h3>
          </div>
        </div>
      {/* <div className="flex px-16  py-8">
        <div className="w-1/2 p-4">
          <h3
            className=" text-2xl text-white"
            style={{
              textAlign: "justify",
              textJustify: "inter-word",
            }}
          >
            {description1}
          </h3>
        </div>
        <div className="w-1/2 p-4">
          <h3
            className="text-2xl text-white"
            style={{
              textAlign: "justify",
              textJustify: "inter-word",
            }}
          >
            {description2}
          </h3>
        </div>
      </div> */}
    </>
  );
};

export default GrowthSectorTitle;
