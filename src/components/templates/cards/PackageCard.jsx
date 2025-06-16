import { PiPackageThin } from "react-icons/pi";
import Button from "../Button";
import { useNavigate } from "react-router-dom";
import { statusColor, statusColorBorder } from "../../../utils/statusColor";
const PackageCard = ({ data }) => {
  const { _id, orderNumber,
    jobStatus,
    rideFare,
    title } = data


    const navigate =useNavigate()
  return (

    <div
      className={`f-bg flex justify-between items-center gap-4 bg-card mt-6 rounded-xl border-l-[1rem]  ${statusColorBorder(jobStatus)} p-4`}
    >
      <div className="flex items-center gap-x-4">
        <i>
          <PiPackageThin fontSize={"6rem"} />
        </i>
        <div className="flex flex-col gap-y-1">
          <h3 className="text-xl">Order #{orderNumber}</h3>
          <div className="flex items-center gap-4">
            <h3 className="font-semibold text-nowrap text-2xl capitalize">{title}</h3>
            {/* <p className="text-[1rem] font-medium text-nowrap">{date}</p> */}
          </div>
          <div className="flex flex-col sm:flex-row gap-2 gap-x-4">
            {/* <h4 className="border-2 rounded-full px-3 py-0.5">{attempt}</h4> */}
            {/* <h4 className="border-2 rounded-full px-3 py-0.5">{time}</h4> */}
            <h4
              className={`border-2 rounded-full px-3 py-0.5 ${statusColor(jobStatus)}`}
            >
              {jobStatus}
            </h4>
          </div>
        </div>
      </div>

      <div className="flex items-center gap-4 sm:gap-8 flex-row xs:flex-col">
        <h2 className="font-semibold">${rideFare}</h2>
        <Button className="!rounded-full !py-3" onClick={()=>{navigate("/job/single",{state:_id})}}>Track</Button>
      </div>
    </div>
  );
};

export default PackageCard;
