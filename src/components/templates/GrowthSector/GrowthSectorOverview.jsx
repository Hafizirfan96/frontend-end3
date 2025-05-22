import React from "react";

const GrowthSectorOverview = ({}) => {
  return (
    <div className=" bg-white p-8 rounded shadow-[2px_4px_10px_rgba(0,0,0,0.15)] mr-4 ">
      <div className="text-3xl font-bold text-[#478e51]">Sector Overview</div>

      <div className="mt-6">
        <label className="block text-2xl font-semibold text-gray-700 mb-1 ">
          Annual Growth (%)
        </label>

        <label className="block text-2xl font-semibold text-gray-700 mb-1 ">
          6.25 %
        </label>
      </div>
      <div className=" border mt-4" />
      <div>
        <div className="mt-6">
          <label className="block text-2xl font-semibold text-gray-700 mb-1 ">
            Workforce Employed
          </label>

          <label className="block text-2xl font-semibold text-gray-700 mb-1 ">
            27.6m (38.5% of the total labor force(71.8m))
          </label>
        </div>
        <div className=" border mt-4" />
      </div>

      <div>
        <div className="mt-6">
          <label className="block text-2xl font-semibold text-gray-700 mb-1 ">
            Workforce Supply
          </label>

          <label className="block text-2xl font-semibold text-gray-700 mb-1 ">
            25,795,000
          </label>
        </div>
        <div className=" border mt-4" />
      </div>

      <div>
        <div className="mt-6">
          <label className="block text-2xl font-semibold text-gray-700 mb-1 ">
            Workforce Demand
          </label>

          <label className="block text-2xl font-semibold text-gray-700 mb-1 ">
            1.09m(6.25% - 2.27%)
          </label>
        </div>
      </div>
    </div>
  );
};

export default GrowthSectorOverview;
