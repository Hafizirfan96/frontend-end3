import React from "react";

const Heading = ({ title, description }) => {

  const onNavigate = () => {
    onClick()
  }

  return (
    <blockquote className="border-l-4 pl-4 border-[#e2e028ed] mt-16">
          <div className=" flex">
            <h2 className="text-[28px] text-[#267d37de] font-bold ">
              {/* Key facts - National   */}
              {title}
              {" "} 
            </h2>{
              description &&  <h2 className="text-[25px] text-[#267d37de] ml-4">
              {/* (Source: Employer Skill Survey, Qualification Awarding Bodies -
              2023/2024) */}
              ({description})
            </h2>
            }
           
          </div>
        </blockquote>
  );
};

export default Heading;
