import React from "react";
import ArcLine from "@/assets/ArcLine.png"
import Arcdown from "@/assets/Arcdown.png"


const OrderProcess = ({ steps }) => {
  return (
    <div className="flex items-center justify-center py-10 mt-28 mb-32">
      <div className="flex w-full items-center justify-between gap-16 relative">
        {steps.map((step, index) => (
          <div key={index} className="flex flex-col items-center text-center w-1/4 relative">
            <div className="flex items-center justify-center w-16 h-16 bg-red-100 rounded-full mb-16 relative z-10">
              <img src={step.image} alt={step.title} width={50} height={50} className="object-contain" />
            </div>
            {index < steps.length - 1 && (
              <div>
                {index === 1 ? (
                  <div className="absolute rotate-360 left-[66%] w-full top-[35%] transform -translate-y-1/2 hidden md:block">

                    <img src={Arcdown} />
                  </div>
                ) : (
                  <div className="absolute rotate-360 left-[66%] w-full top-[10%] transform -translate-y-1/2 hidden md:block">

                    <img src={ArcLine} />
                  </div>
                )}
              </div>
            )}
            <h3 className="text-lg font-semibold text-red-700">{step.title}</h3>
            <p className="text-gray-600 text-sm mt-2">{step.description}</p>

          </div>
        ))}
      </div>
    </div>

  );
};
export default OrderProcess;
