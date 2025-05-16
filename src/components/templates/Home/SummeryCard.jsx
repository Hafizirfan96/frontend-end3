import React from "react";

const SummeryCard = ({
  title,
  number,
  subtitle,
  bgColor = "bg-green-50",
  icon,
}) => {
  return (
    <div
      className={`${bgColor} justify-between shadow p-6 flex flex-col items-center text-center min-h-[350px]`}
    >
      <div className="flex flex-col justify-center items-center mt-8 ">
        <div className="w-28">{icon}</div>
        <h3 className="text-[20px] text-[#4e545a] font-semibold mt-4">
          {title}
        </h3>
      </div>

      <div>
        <p className="text-green-700 text-[36px] font-bold">{number}</p>
        <p className="text-[20px] text-[#4e545a] font-semibold">{subtitle}</p>
      </div>
    </div>
  );
};

export default SummeryCard;
